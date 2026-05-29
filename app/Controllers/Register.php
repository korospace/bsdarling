<?php

namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\RegisterModel;

class Register extends BaseController
{
    public $registerModel;

	public function __construct()
    {
        $this->registerModel = new RegisterModel;
    }

    /**
     * Regsiter Page for Nasabah
     */
    public function registerNasabahView()
    {
        $data = [
            'title' => 'Nasabah | register'
        ];

        $token     = (isset($_COOKIE['token'])) ? $_COOKIE['token'] : null;
        $result    = $this->checkToken($token, false);
        $privilege = (isset($result['privilege'])) ? $result['privilege'] : null;
        
        if ($token == null) {
            return view('RegisterNasabah/index',$data);
        } 
        else {
            if ($privilege == 'nasabah') {
                return redirect()->to(base_url().'/nasabah');
            } 
            else {
                return redirect()->to(base_url().'/admin');
            }
        }
    }

    /**
     * Nasabah Regsiter
     *   url    : domain.com/register/nasabah
     *   method : POST
     */
    public function nasabahRegister(): object
    {
        $result = '';
        if ($this->request->getHeader('token')) {
            $result = $this->checkToken();
        }

		$data = $this->request->getPost();
        
        if (!$this->request->getHeader('token')) {
            $this->validation->run($data,'nasabahRegisterValidate');
        }
        else{
            if (!in_array($result['data']['privilege'],['admin','superadmin'])) {
                $this->validation->run($data,'nasabahRegisterValidate');
            }
            else {
                $this->validation->run($data,'nasabahRegisterValidateByAdmin');

                if (isset($data['tgl_lahir']) && $data['tgl_lahir'] != "") {
                    $this->validation->run($data,'tglLahirValidate');
                }
            }
        }

        $errors = $this->validation->getErrors();
        
        if($errors) {
            $response = [
                'status'   => 400,
                'error'    => true,
                'messages' => $errors,
            ];
    
            return $this->respond($response,400);
        } 
        else {
            // create id nasabah
            $idNasabah  = '';
            $rwrt       = $this->request->getPost("rw").$this->request->getPost("rt");
            $dbrespond  = $this->registerModel->getLastNasabah($rwrt);

            if ($dbrespond['status'] == 200) {
                $lastID = $dbrespond['data']['id'];
                $lastID = (int)substr($lastID,4)+1;
                $lastID = sprintf('%03d',$lastID);

                $idNasabah = $rwrt.$lastID;
            }
            else if ($dbrespond['status'] == 404) {
                $idNasabah = $rwrt.'001';
            } 
            else {
                return $this->respond($dbrespond,$dbrespond['status']);
            }
            
            $email = '';
            $otp   = $this->generateOTP(6);
            $data  = [
                "id"           => $idNasabah,
                "nama_lengkap" => strtolower(trim($data['nama_lengkap'])),
                "nik"          => $data['nik'] ? trim($data['nik']) : null,
                "notelp"       => $data['notelp'] ? trim($data['notelp']) : null,
                "alamat"       => $data['alamat'] ? trim($data['alamat']) : null,
                "tgl_lahir"    => isset($data['tgl_lahir']) && $data['tgl_lahir'] != "" ? trim($data['tgl_lahir']) : "",
                "kelamin"      => $data['kelamin'],
                "is_active"    => true,
                "last_active"  => (int)time(),
                "created_at"   => (int)time(),
                "privilege"    => 'nasabah',
                "otp"          => $otp,
                "uang"         => isset($data['uang']) && $data['uang'] != "" ? $data['uang'] : 0,
                "wilayah"      => [
                    'id_user'   => $idNasabah,
                    'kodepos'   => trim($data['kodepos']),
                    "kelurahan" => strtolower(trim($data['kelurahan'])),
                    "kecamatan" => strtolower(trim($data['kecamatan'])),
                    "kota"      => strtolower(trim($data['kota'])),
                    "provinsi"  => strtolower(trim($data['provinsi'])),
                ],
            ];

            if ($this->request->getHeader('token')) {
                if (in_array($result['data']['privilege'],['admin','superadmin'])) {
                    $data['email']     = null;
                    $data['is_verify'] = true;
                    $data["username"] = trim($idNasabah);
                    $data["password"] = $this->encrypt($idNasabah);
                }
            }
            else {
                $email         = $this->request->getPost('email');
                $data['email'] = $email;
                $data["username"] = trim($this->request->getPost('username'));
                $data["password"] = $this->encrypt($this->request->getPost('password'));
            }

            $dbrespond = $this->registerModel->addNasabah($data);

            if ($dbrespond['error'] == false) {
                if ($email !== '') {
                    $sendEmail = $this->sendOtpToEmail($email,$otp);
    
                    if ($sendEmail == true) {
                        $this->registerModel->transCommit();
                    } 
                    else {
                        $this->registerModel->transRollback();
    
                        $response = [
                            'status'   => 500,
                            'error'    => true,
                            'messages' => $sendEmail,
                        ];
                
                        return $this->respond($response,500);
                    }
                }
                else {
                    $this->registerModel->transCommit();
                }
            } 
    
            return $this->respond($dbrespond,$dbrespond['status']);
        }
    }

    /**
     * Add admin
     *   url    : domain.com/register/admin
     *   method : POST
     */
    public function adminRegister(): object
    {
        $result = $this->checkToken();
        $this->checkPrivilege($result['data']['privilege'],'superadmin');

        $data   = $this->request->getPost();
        $this->validation->run($data,'adminRegisterValidate');
        $errors = $this->validation->getErrors();

        if($errors) {
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => $errors,
            ];
    
            return $this->respond($response,400);
        } 
        else {
            // create id admin
            $idAdmin    = '';
            $lastAdmin  = $this->registerModel->getLastAdmin();

            if ($lastAdmin['status'] == 200) {
                $lastID  = $lastAdmin['data']['id'];
                $lastID  = (int)substr($lastID,1)+1;
                $lastID  = sprintf('%03d',$lastID);
                $idAdmin = 'A'.$lastID;
            } 
            else {
                return $this->respond($lastAdmin,$lastAdmin['status']);
            }
            
            $data = [
                "id"           => $idAdmin,
                "email"        => null,
                "username"     => trim($data['username']),
                "password"     => password_hash(trim($data['password']), PASSWORD_DEFAULT),
                "nama_lengkap" => strtolower(trim($data['nama_lengkap'])),
                "nik"          => null,
                "notelp"       => $data['notelp'] ? trim($data['notelp']) : null,
                "alamat"       => $data['alamat'] ? trim($data['alamat']) : null,
                "tgl_lahir"    => trim($data['tgl_lahir']),
                "kelamin"      => strtolower(trim($data['kelamin'])),
                "is_active"    => true,
                "last_active"  => (int)time(),
                "created_at"   => (int)time(),
                "privilege"    => strtolower(trim($data['privilege'])),
                "is_verify"    => true,
            ];

            $dbrespond = $this->registerModel->addAdmin($data);
    
            return $this->respond($dbrespond,$dbrespond['status']);
        }
    }

    public $bulkData = [
        [
            "rw" => "05",
            "rt" => "01",
            "nama_lengkap" => "Ibu Nanang",
            "notelp" => "081617217156",
            "alamat" => "Jl. Perkutut",
            "kelamin" => "perempuan", //laki-laki
        ],
        [
            "rw" => "05",
            "rt" => "01",
            "nama_lengkap" => "Ibu Supardi",
            "notelp" => null,
            "alamat" => null,
            "kelamin" => "perempuan",
        ],
        [
            "rw" => "05",
            "rt" => "01",
            "nama_lengkap" => "Ibu Istiajid",
            "notelp" => null,
            "alamat" => null,
            "kelamin" => "perempuan",
        ],
        [
            "rw" => "05",
            "rt" => "01",
            "nama_lengkap" => "Ibu Saino",
            "notelp" => null,
            "alamat" => null,
            "kelamin" => "perempuan",
        ],
    ];

    public function bulkRegister()
    {
        // var_dump($this->bulkData);die;
        foreach ($this->bulkData as $value) {
            $idNasabah  = '';
            $rwrt       = $value["rw"].$value["rt"];
            $dbrespond1  = $this->registerModel->getLastNasabah($rwrt);
            
            if ($dbrespond1['status'] == 200) {
                $lastID = $dbrespond1['data']['id'];
                $lastID = (int)substr($lastID,4)+1;
                $lastID = sprintf('%03d',$lastID);
    
                $idNasabah = $rwrt.$lastID;
            }
            else if ($dbrespond1['status'] == 404) {
                $idNasabah = $rwrt.'001';
            }
            
            $data  = [
                "id"           => $idNasabah,
                "username"     => $idNasabah,
                "password"     => $this->encrypt($idNasabah),
                "nama_lengkap" => strtolower(trim($value['nama_lengkap'])),
                'email'        => null,
                "nik"          => null,
                "notelp"       => $value['notelp'] ? trim($value['notelp']) : null,
                "alamat"       => $value['alamat'] ? trim($value['alamat']) : null,
                "tgl_lahir"    => trim('00-00-000'),
                "kelamin"      => $value['kelamin'],
                "is_active"    => true,
                "is_verify"    => true,
                "last_active"  => (int)time(),
                "created_at"   => (int)time(),
                "privilege"    => 'nasabah',
                "wilayah"      => [
                    'id_user'   => $idNasabah,
                    'kodepos'   => '15148',
                    "kelurahan" => 'cipondoh',
                    "kecamatan" => 'cipondoh',
                    "kota"      => 'tangerang selatan',
                    "provinsi"  => 'banten',
                ],
            ];

            $dbrespond2 = $this->registerModel->addNasabah($data);

            if ($dbrespond2['error'] == true) {
                var_dump($data);
                echo "<br>===========================<br>";
                var_dump($dbrespond1);
                echo "<br>===========================<br>";
                var_dump($dbrespond2);die;
            }
            else{
                $this->registerModel->transCommit();
            }
        }

        echo "selesai";
    }
}
