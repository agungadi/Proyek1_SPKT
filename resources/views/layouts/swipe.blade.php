

<section id="home-slider">

    <div class="swiper-container">


        <div class="swiper-wrapper">

                    <div class="swiper-slide" id="skck" style="background-image:url({{asset('images/page/SKCK.png')}})">

                        <div class="col-sm-12 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">


                        </div>
                    </div>

                <div class="swiper-slide" id="sktlk"  onclick="sktlkConfirmation('SKTLK')" style="background-image:url({{asset('images/page/sktlk.png')}})">
                    <div class="col-sm-12 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">

                    </div>
                 </div>

                <div class="swiper-slide" id="lp" style="background-image:url({{asset('images/page/lp.png')}})">

                    <div class="col-sm-12 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">

                    </div>
                </div>


                <div class="swiper-slide" id="ijin" style="background-image:url({{asset('images/page/ijin.png')}})">

                    <div class="col-sm-12 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">

                    </div>

        </div>
        <!-- Add Pagination -->

        <div class="swiper-pagination"></div>

    </div>

    <div class="container">

        <div class="row">
            <div class="main-slider">
                <div class="slide-text">

                    <img src="{{asset('images/page/citys.png')}}" class="slider-hill" alt="slider image">

                    <img src="{{asset('images/page/tablet.png')}}" class="slider-house" alt="slider image">

                    <section id="services">
                        <div class="container">
                            <div class="row">


      <script src="{{asset('js/swiper.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


         <!-- Initialize Swiper -->




                                </div>
                            </div>
                        </div>
                    </section>


                    <!--/#services-->

                </div>
            </div>
        </div>
    </div>



</section>


<script type="text/javascript">



$(function (){
    $(this).keydown(function (e){
        e.preventDefault()
        if (e.keyCode == 13){
            console.log("enterde")
            var selectedCard = document.querySelector('.swiper-slide-active')
            var id = selectedCard.id
            console.log(id)


            switch(id){
                case 'skck':
                    jenis = "SKCK"
                    kep = "Surat Keterangan Catatan Kepolisian"
                    break
                case 'sktlk':
                    jenis = "SKTLK"
                    kep = "Surat Keterangan Tanda Lapor Kehilangan"
                    break
                case 'sttp':
                    jenis = "STTP"
                    kep = "Surat Tanda Terima Pemberitahuan"
                    break
                case 'lp':
                    jenis = "LP"
                    kep = "Laporan Polisi"
                    break
                case 'ijin':
                    jenis = "ijin"
                    kep = "Surat Pemberitahuan Perkembangan Hasil Penyidikan"
                    break

                //dll
            }

            showConfirmation(jenis)
        }
    })
})




function showConfirmation(jenis) {
    swal({
            title: "Tunggu Sebentar !",
            text: "Sedang mencetak tiket antrian "+kep+" ("+jenis+")",
            allowEscapeKey: false,
            allowOutsideClick: false,
            timer: 1000,
            onOpen: () => {
      swal.showLoading();
    }
        })
        .then(function () {
                $.ajax({
                    url:'{{ url("store") }}',
                    type : 'POST',
                    crossDomain: true,
                    data : {
                        keperluan: jenis,
                        _token   : '{{ csrf_token() }}'
                    },
                    success : function (data) {
                        console.log(data)

                    },
                    error : function (jqXHR) {
                        console.log(jqXHR);

                    }
                });

        swal({
          title: 'Selesai !',
          type: 'success',
          text: "Silahkan ambil tiket antrian "+kep+" ("+jenis+")",
          timer: 2000,
          showConfirmButton: false
        })



        }, function (dismiss) {
            return false;
        })

};


</script>
