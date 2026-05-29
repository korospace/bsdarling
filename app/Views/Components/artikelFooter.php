<?= $this->extend('Layout/template') ?>

<?= $this->section('contentCss'); ?>
	<style>
        .text-white{
            color: #253A4B !important;
        }
        .widegt_about p {
            color: #FFF !important;
            margin-bottom: 20px !important;
        }
        .widegt_about .social li {
            display: inline-block !important;
            margin-right: 10px !important;
        }
        .widegt_about .social li a {
            display: block !important;
            width: 30px !important;
            height: 30px !important;
            line-height: 30px !important;
            text-align: center !important;
            border-radius: 50% !important;
            background-color: #f9e6d4 !important;
            color: #253A4B !important;
            font-size: 14px !important;
            -webkit-transition: all all 0.5s ease-out 0s !important;
            -moz-transition: all all 0.5s ease-out 0s !important;
            -ms-transition: all all 0.5s ease-out 0s !important;
            -o-transition: all all 0.5s ease-out 0s !important;
            transition: all all 0.5s ease-out 0s !important;
        }
        .widegt_about .social li a:hover,
        .widegt_about .social li a:focus {
            background-image: -moz-linear-gradient(0deg, #253A4B 0%, #253A4B 100%) !important;
            background-image: -webkit-linear-gradient(0deg, #253A4B 0%, #253A4B 100%) !important;
            background-image: -ms-linear-gradient(0deg, #253A4B 0%, #253A4B 100%) !important;
            color: #fff !important;
            box-shadow: 2.5px 4.33px 15px 0px rgba(254, 176, 0, 0.4) !important;
        }
    </style>
<?= $this->endSection(); ?>

<footer class="">
    <div class="pt-5" style="background: #8CD9E8;background: linear-gradient(-145deg, #8CD9E8 0%, #85F4BB 100%);">
        <div class="container pt-5 pt-lg-0">
            <div class="row mt-5 pb-5 px-4">
                <div class="col-12 col-md-3 mt-5 mt-md-0">
                    <div class="widget widget_link">
                        <h4 class="text-white" style="font-weight: bold;">Links</h4>
                        <div class="mt-4 d-flex flex-column">
                            <a class="text-white mb-3" href="/">Home</a>
                            <a class="text-white mb-3" href="<?= base_url('/#sampah') ?>">Sampah</a>
                            <a class="text-white mb-3" href="<?= base_url('/#courses') ?>">Kegiatan</a>
                            <a class="text-white mb-3" href="<?= base_url('/#mitra') ?>">Mitra</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-5 mt-md-0">
                    <div class="widget widget_contact">
                        <h4 class="text-white" style="font-weight: bold;">Contact Us</h4>
                        <div class="mt-4">
                            <div class="d-flex">
                                <div class="icon mr-3">
                                    <i class="fas fa-phone-alt" style="color:#253A4B;"></i>
                                </div>
                                <div class="info d-flex flex-column" style="line-height: 1.5;">
                                    +628569886410
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="icon mr-3">
                                    <i class="fas fa-envelope" style="color:#253A4B;"></i>
                                </div>
                                <div class="info d-flex flex-column" style="line-height: 1.5;">
                                    <a class="text-white" href="mailto:bstpinangpermai@gmail.com">
                                        bstpinangpermai@gmail.com
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="icon mr-3">
                                    <i class="fas fa-map-marker-alt" style="color:#253A4B;"></i>
                                </div>
                                <div class="info text-white" style="line-height: 1.5;">
                                    Jl. H. Gaim No.50, RT.10/RW.2, Petukangan Utara, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col mt-5 mt-md-0">
                    <div class="widget widegt_about">
                        <h4 class="text-white" style="font-weight: bold;">Social media</h4>
                        <div class="social">
                            <li>
                                <a href="https://wa.me/628569886410?text=Assalamualaikum%20Bu%20Sri,%20saya%20ingin%20bertanya%20mengenai%20banksampah%darling">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                            <li><a href="https://www.instagram.com/bstpinanggriya/"><i class="fab fa-instagram"></i></a></li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCL2qMpYljbOwEjMA0UV3G_w">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid mt-5 py-3 d-flex justify-content-center">
            <p class="text-white">Copyright &copy; 2020 All rights reserved.</p>
        </div>
    </div>
</footer>