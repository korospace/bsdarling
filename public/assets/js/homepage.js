/**
 * Get Mitra
 */
function getMitra() {
  $(".simple-cta").removeClass("d-none")

  axios
    .get(`${APIURL}/mitra/getmitra`)
    .then((res) => {
      let elMitra = ""
      res.data.data.forEach((e) => {
        elMitra += `<div class="flex p-8 sm:p-12 place-items-center">
          <img src="${e.icon}" alt="">
        </div>`
      })

      $("#mitra_wraper").html(elMitra)
    })
    .catch((err) => {
      $(".simple-cta").addClass("d-none")
    })
}
getMitra()

/*
--------------
send kritik
--------------
*/
$("#contact").on("submit", function (e) {
  e.preventDefault()

  if (doValidate()) {
    showLoadingSpinner()

    let form = new FormData(e.target)

    axios
      .post(`${APIURL}/nasabah/sendkritik`, form, {
        headers: {
          // header options
        },
      })
      .then((response) => {
        hideLoadingSpinner()
        $("#contact-name").val("")
        $("#contact-email").val("")
        $("#contact-message").val("")

        setTimeout(() => {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Pesan Telah Terkirim",
            showConfirmButton: false,
            timer: 2000,
          })
        }, 500)
      })
      .catch((error) => {
        hideLoadingSpinner()

        // error server
        if (error.response.status == 500) {
          showAlert({
            message: `<strong>Ups . . .</strong> terjadi kesalahan pada server, coba sekali lagi`,
            autohide: true,
            type: "danger",
          })
        }
      })
  }
})

/*
--------------
get total sampah
--------------
*/
axios
  .get(APIURL + "/transaksi/sampahmasuk")
  .then((res) => {
    let totalSampah = res.data.data

    for (const key in totalSampah) {
      $(`#sampah-${key.replace(/\s/g, "-")}`).html(
        `${parseFloat(totalSampah[key].total).toFixed(1)} kg`,
      )
      $(`#kategori-${key.replace(/\s/g, "-")}`).html(
        `sampah ${totalSampah[key].kategori}`,
      )
    }

    counterUp()
  })
  .catch((res) => {})
// Counter Up Data Rubbish
let counterUp = () => {
  $(".counter-value").each(function () {
    $(this)
      .prop("Counter", 0)
      .animate(
        {
          Counter: $(this).text(),
        },
        {
          duration: 3500,
          easing: "swing",
          step: function (now) {
            $(this).text(Math.ceil(now))
          },
        },
      )
  })
}

/**
 * GET ALL ARTIKEL
 */
let arrayBerita = []
axios
  .get(`${APIURL}/artikel/getkategori`)
  .then((res) => {
    let elBerita = ""
    let allBerita = res.data.data
    arrayBerita = allBerita

    allBerita.map(
      ({ id, icon, name, description, kategori_utama, created_at }) => {
        let date = new Date(parseInt(created_at) * 1000)
        let day = date.toLocaleString("en-US", { day: "numeric" })
        let month = date.toLocaleString("en-US", { month: "long" })
        let year = date.toLocaleString("en-US", { year: "numeric" })

        elBerita += `
        <div class="h-full w-full">
          <h5 class="mb-2 text-2xl px-4 py-2 text-center font-bold tracking-tight text-white bg-green-800 rounded-lg">${name}</h5>
          <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
            <div class="relative bg-cover bg-no-repeat" style="background-image: url(${icon});">
              <img class="rounded-t-lg w-full opacity-0 relative z-0" src="${APIURL}/assets/images/default-thumbnail.jpg" alt="" />
            </div>
            <div class="p-5">
              <p class="mb-3 font-normal text-gray-700 line-clamp-4">${description}</p>
              <a href="${APIURL}/homepage/${name}" class="inline-flex items-center py-2 text-sm font-medium text-center rounded-full text-green-700">
                Selengkapnya
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        `
      },
    )

    $("#container-article").html(elBerita)
  })
  .catch((err) => {
    if (err.response.status == 404) {
      $("#container-article").addClass("d-none")
      $("#img-404").removeClass("d-none")
    } else if (err.response.status == 500) {
      $("#container-article").addClass("d-none")
      $("#img-404").removeClass("d-none")
      showAlert({
        message: `<strong>Ups...</strong> terjadi kesalahan pada server, silahkan refresh halaman.`,
        btnclose: true,
        type: "danger",
      })
    }
  })

$("#newsbtn").click(function () {
  if ($("#email").val() !== "") {
    Swal.fire({
      icon: "success",
      title: "Sukses",
      text: "Terimakasih telah berlangganan News Letter",
      confirmButtonText: "ok",
    })
  } else {
    Swal.fire({
      icon: "warning",
      title: "Masukan Email",
      text: "Masukan email untuk berlangganan",
      confirmButtonText: "ok",
    })
  }
})
