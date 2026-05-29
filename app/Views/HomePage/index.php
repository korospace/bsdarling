<?= $this->extend('Layout/template') ?>

<!-- Css -->
<?= $this->section('contentCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/tailwind/dist/homepage.css'); ?>">

<style>
  @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

  @font-face {
    font-family: "Montserrat", sans-serif;
  }

  * {
    font-family: "Montserrat";
  }
</style>
<?= $this->endSection(); ?>

<!-- JS -->
<?= $this->section('contentJs'); ?>
  <!-- burger -->
  <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
  <!-- page -->
  <script src="<?= base_url('assets/js/homepage.js'); ?>"></script>

  <script>
  </script>
<?= $this->endSection(); ?>

<!-- Body -->
<?= $this->section('content'); ?>

<!-- **** Loading Spinner **** -->
<?= $this->include('Components/loadingSpinner'); ?>
<!-- **** Alert info **** -->
<?= $this->include('Components/alertInfo'); ?>

<nav class="fixed top-0 left-0 w-full z-50 bg-white border-gray-200 shadow-sm">
  <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-6 mx-auto">
    <a href="#" class="flex items-center gap-2">
      <img src="<?= base_url('assets/images/banksampah-logo.webp'); ?>" 
          class="h-8" alt="Banksampah Logo" />

      <!-- Text hanya muncul di md ke atas -->
      <span class="inline md:hidden text-lg font-light text-gray-800">
        Bank Sampah Darling
      </span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
        <li>
          <a href="<?= base_url('#beranda'); ?>" class="block py-2 pl-3 pr-4 text-white bg-green-700 rounded md:bg-transparent md:text-green-700 md:p-0 " aria-current="page">Home</a>
        </li>
        <li>
          <a href="<?= base_url('#program'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Program</a>
        </li>
        <li>
          <a href="<?= base_url('#mitra'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Mitra</a>
        </li>
        <li>
          <a href="<?= base_url('penghargaan'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Penghargaan</a>
        </li>
        <li>
          <a href="<?= base_url('#pencapaian'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Data Sampah</a>
        </li>
      </ul>
    </div>
    <div class="hidden md:flex gap-4">
      <a href="<?= base_url('login'); ?>" class="px-4 py-2 text-green-700 rounded-md bg-green-50">Masuk</a>
      <a href="<?= base_url('register'); ?>" class="px-4 py-2 bg-green-700 rounded-md text-green-50">Daftar</a>
    </div>
  </div>
</nav>

<div class="mx-8 space-y-32 sm:mx-12 pt-24">
  <section id="beranda" class="grid w-full grid-cols-1 gap-4 px-8 mt-8 sm:grid-cols-2">
    <div class="flex flex-col w-full gap-4 place-content-center">
      <p class="text-5xl font-light">
        <span class="text-green-800">
          Kumpulkan
        </span>
        dan
        <span class="text-green-800">
          Tukarkan
        </span>
        <br>
        Sampahmu Menjadi Uang
        <br>
        Bersama Kami
      </p>
      <p class="text-lg">
        Dapatkan berbagai keuntungan bersama kami dengan cara mengumpulkan dan menukarkan sampah anda menjadi uang. Jadi Tunggu apalagi segera daftarkan diri anda sekarang juga
      </p>
    </div>
    <div class="flex w-full place-content-center">
      <img src="<?= base_url("assets/images/banksampah-banner.jpg") ?>" alt="">
    </div>
  </section>

  <section id="pencapaian" class="space-y-12">
    <p class="px-4 text-4xl font-bold text-center capitalize">pencapaian kami sejauh ini</p>
    <p class="px-4 text-lg text-center text-gray-700">
      Kami telah dipercaya oleh banyak sekali orang dan <br>
      sudah banyak yang bergabung menjadi member kami
    </p>
    <div id="container-sampah" class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-2 md:grid-cols-4 place-items-center">
      <div class="flex flex-col p-4">
        <p id="sampah-kertas" class="text-2xl font-semibold text-green-700">0KG</p>
        <p id="kategori-kertas" class="flex-1 text-gray-700 uppercase">sampah </p>
      </div>
      <div class="flex flex-col p-4">
        <p id="sampah-plastik" class="text-2xl font-semibold text-green-700">0KG</p>
        <p id="kategori-plastik" class="flex-1 text-gray-700 uppercase">sampah </p>
      </div>
      <div class="flex flex-col p-4">
        <p id="sampah-logam" class="text-2xl font-semibold text-green-700">0KG</p>
        <p id="kategori-logam" class="flex-1 text-gray-700 uppercase">sampah </p>
      </div>
      <div class="flex flex-col p-4">
        <p id="sampah-lain-lain" class="text-2xl font-semibold text-green-700">0KG</p>
        <p id="kategori-lain-lain" class="flex-1 text-gray-700 uppercase">sampah</p>
      </div>
    </div>
  </section>

  <section id="program" class="space-y-12">
    <p class="px-4 text-4xl font-bold text-center capitalize">program kami</p>
    <p class="px-4 text-lg text-center text-gray-700">
      Kami telah dipercaya oleh banyak sekali orang dan sudah banyak yang bergabung menjadi member kami
    </p>
    <!-- <div class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-3 place-items-center">
      <button class="w-full px-8 py-4 mx-8 font-semibold text-white uppercase bg-green-700 rounded-full sm:mx-32 hover:shadow-lg hover:text-green-50 hover:bg-green-600">
        kuliah kerja nyata
      </button>
      <button class="w-full px-8 py-4 mx-8 font-semibold text-white uppercase bg-green-700 rounded-full sm:mx-32 hover:shadow-lg hover:text-green-50 hover:bg-green-600">
        sosialisasi
      </button>
      <button class="w-full px-8 py-4 mx-8 font-semibold text-white uppercase bg-green-700 rounded-full sm:mx-32 hover:shadow-lg hover:text-green-50 hover:bg-green-600">
        webinar
      </button>
    </div> -->
    <div id="container-article" class="grid items-center grid-cols-1 gap-4 sm:grid-cols-3 place-items-start">

    </div>
  </section>

  <section id="mission" class="space-y-12">
    <div class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-2">
      <div class="flex p-4 place-content-center place-items-center">
        <p class="text-4xl font-semibold text-green-700">Our Mission</p>
      </div>
      <div class="flex p-4">
        <p class="text-xl text-gray-700 ">
          Dengan mengusung program unggulan kami yang mana kami akan mengurangi sampah yang kami hasilkan ( Reduce ), Menggunakan kembali sampah yang telah kami hasilkan ( Reuse ) dan Menggunakan kembali sampah yang telah kami buat ( Recycle )
        </p>
      </div>
    </div>
  </section>

  <section id="threear" class="space-y-12">
    <div class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-2">
      <div class="flex flex-col gap-8 p-4 place-content-center">
        <p class="text-4xl font-bold text-green-700 capitalize">reuse - menggunakan kembali</p>
        <p class="text-xl text-gray-700">
          Dengan mengusung program unggulan kami yang mana kami akan mengurangi sampah yang kami hasilkan ( Reduce ), Menggunakan kembali sampah yang telah kami hasilkan ( Reuse ) dan Menggunakan kembali sampah yang telah kami buat ( Recycle )
        </p>
      </div>
      <div class="flex p-4 place-content-center place-items-center">
        <div class="flex w-full place-content-center">
          <img src="<?= base_url("assets/images/bg-r1.jpg") ?>" alt="">
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-2">
      <div class="flex p-4 place-content-center place-items-center">
        <div class="flex w-full place-content-center">
          <img src="<?= base_url("assets/images/bg-r2.jpg") ?>" alt="">
        </div>
      </div>
      <div class="flex flex-col gap-8 p-4 place-content-center">
        <p class="text-4xl font-bold text-green-700 capitalize">reduce - mengurangi penggunaan</p>
        <p class="text-xl text-gray-700">
          Kurangi jejak lingkungan dengan langkah-langkah kecil yang berdampak besar. Mulai dari meminimalisir konsumsi berlebihan hingga mengadopsi gaya hidup hemat sumber daya. Mari bersama-sama mengurangi dampak negatif dan menjaga keindahan bumi yang kita cintai.
        </p>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-2">
      <div class="flex flex-col gap-8 p-4 place-content-center">
        <p class="text-4xl font-bold text-green-700 capitalize">recycle - mengolah kembali</p>
        <p class="text-xl text-gray-700">
          Mendaur ulang sebagai langkah nyata menuju lingkungan yang lebih bersih dan sehat. Dengan mengubah sampah menjadi sumber daya berharga, kita dapat mengurangi kebutuhan akan bahan baku baru dan memperpanjang siklus hidup produk. Bergabunglah dalam gerakan daur ulang untuk masa depan yang berkelanjutan
        </p>
      </div>
      <div class="flex p-4 place-content-center place-items-center">
        <div class="flex w-full place-content-center">
          <img src="<?= base_url("assets/images/bg-r1.jpg") ?>" alt="">
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="space-y-12">
    <div class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-2">
      <div class="flex p-4 place-content-center place-items-center">
        <p class="text-4xl font-semibold text-green-700">Alur Pelayanan</p>
      </div>
      <div class="flex p-4">
        <p class="text-xl text-gray-700 ">
          Demi menciptakan kenyamanan dalam pelayanan kami membagi 4 tahap alur dalam melayani nasabah yang menabung sampahnya di kamu
        </p>
      </div>
    </div>
  </section>

  <section id="route" class="space-y-12">
    <div class="grid grid-cols-1 gap-4 px-8 sm:grid-cols-2">
      <div class="flex p-4 place-content-center place-items-center">
        <div class="flex w-full place-content-center">
          <img src="<?= base_url("assets/images/bg-service.jpg") ?>" alt="">
        </div>
      </div>
      <div class="p-4 space-y-14">
        <div>
          <p class="text-2xl font-semibold text-gray-700 capitalize">pendaftaran akun</p>
          <hr class="w-full h-1 my-4 bg-gray-800 rounded-md">
          <p class="text-xl text-gray-700 ">
            Dengan mengusung program unggulan kami yang mana kami akan mengurangi sampah yang kami hasilkan ( Reduce ), Menggunakan kembali sampah yang telah kami hasilkan ( Reuse ) dan Menggunakan kembali sampah yang telah kami buat ( Recycle )
          </p>
        </div>
        <div>
          <p class="text-2xl font-semibold text-gray-700 capitalize">konsultasi admin</p>
          <hr class="w-full h-1 my-4 bg-gray-800 rounded-md">
          <p class="text-xl text-gray-700 ">
            Temukan panduan dan bantuan yang Anda butuhkan: Konsultasikan pertanyaan Anda dengan admin Bank Sampah untuk solusi terbaik.
          </p>
        </div>
        <div>
          <p class="text-2xl font-semibold text-gray-700 capitalize">penimbangan sampah</p>
          <hr class="w-full h-1 my-4 bg-gray-800 rounded-md">
          <p class="text-xl text-gray-700 ">
            Setelah melakukan konsultasi dengan admin. Langkah selanjutnya adalah nasabah menyetorkan hasil sampah yang telah dikumpulkan sebeleumnya. lalu selanjutnya admin akan melakukan penimbangan terhadap sampah yang telah disetorkan sebelumnya
          </p>
        </div>
        <div>
          <p class="text-2xl font-semibold text-gray-700 capitalize">konversi uang</p>
          <hr class="w-full h-1 my-4 bg-gray-800 rounded-md">
          <p class="text-xl text-gray-700 ">
            Setelah itu nasabah akan mendapatkan informasi hasil saldo yang telah didapatkan. Saldo yang berhasil didapatkan dapat dilihat melalui website kami maupun aplikasi mobile yang telah didownload
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="mitra" class="space-y-12">
    <p class="px-4 text-4xl font-bold text-center capitalize">mitra kami</p>
    <p class="px-4 text-lg text-center text-gray-700">
      Kami telah dipercaya oleh banyak sekali orang dan sudah banyak yang bergabung menjadi member kami
    </p>
    <div class="grid grid-cols-1 gap-4 px-8 place-items-center sm:grid-cols-2 md:grid-cols-4" id="mitra_wraper">
      <!-- <div class="flex p-8 sm:p-12 place-items-center">
        <img src="<?= base_url("assets/images/icon-mitra/62e776b841aff.png") ?>" alt="">
      </div>
      <div class="flex p-8 sm:p-12 place-items-center">
        <img src="<?= base_url("assets/images/icon-mitra/6298a8258537a.png") ?>" alt="">
      </div>
      <div class="flex p-8 sm:p-12 place-items-center">
        <img src="<?= base_url("assets/images/icon-mitra/6298a7406d4a5.png") ?>" alt="">
      </div>
      <div class="flex p-8 sm:p-12 place-items-center">
        <img src="<?= base_url("assets/images/icon-mitra/dinas-apalah-hwhw.png") ?>" alt="">
      </div> -->
    </div>
  </section>

  <!-- <section id="newsletter" class="space-y-8">
    <p class="px-4 text-4xl font-bold text-center capitalize">newsletter</p>
    <p class="px-4 text-lg text-center text-gray-700">
      Masukkan email untuk mendapatkan kabar terbaru
    </p>
    <div class="flex gap-4 place-content-center">
      <input id="email" type="email" class="w-1/2 p-4 text-gray-600 border-2 border-green-400 rounded-md shadow-md outline-none focus:border-green-600 focus:shadow-xl">
      <button id="newsbtn" class="px-8 py-2 text-white capitalize bg-green-500 rounded-lg shadow-md hover:bg-green-600 hover:shadow-xl">subscribe</button>
    </div>
  </section> -->

  <section id="footer">

    <footer class="bg-white border-t border-gray-10">
      <div class="w-full max-w-screen-2xl p-4 py-6 mx-auto lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
            <div class="flex flex-col gap-4 place-content-center place-items-center">
              <img src="<?= base_url('assets/images/banksampah-logo.webp'); ?>" class="w-24" alt="Logo" />
              <p class="self-center text-xl font-semibold whitespace-nowrap ">bank sampah darling</p>
              <p class="text-center max-w-sm">Jl m Saidi RT 9 RW 01 Petukangan Selatan kec Pesanggrahan Jakarta Selatan 12270</p>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-8 capitalize sm:gap-6 sm:grid-cols-3">
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900">products</h2>
              <ul class="space-y-4 font-medium text-gray-600">
                <li>
                  <a href="#" class="hover:underline">CSR activities</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">green banking</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">news</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">ongoing campgain</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">updates</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900">get started</h2>
              <ul class="space-y-4 font-medium text-gray-600">
                <li>
                  <a href="#" class="hover:underline">career</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">contact us</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">goverment securities</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">examples</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">NIS</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900">about</h2>
              <ul class="space-y-4 font-medium text-gray-600">
                <li>
                  <a href="#" class="hover:underline">IPDC at a glance</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">mission, vision, and values</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">corporate governanace</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">share holders</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">investor relations</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="https://flowbite.com/" class="hover:underline">
              Bank Sampah Darling</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="#" class="text-gray-500 hover:text-gray-900">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
              </svg>
              <span class="sr-only">Facebook page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
              </svg>
              <span class="sr-only">Instagram page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
              </svg>
              <span class="sr-only">Twitter page</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
              </svg>
              <span class="sr-only">GitHub account</span>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
              </svg>
              <span class="sr-only">Dribbble account</span>
            </a>
          </div>
        </div>
      </div>
    </footer>

  </section>
</div>

<?= $this->endSection(); ?>