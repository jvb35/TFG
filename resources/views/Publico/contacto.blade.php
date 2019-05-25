@extends('layout')
    
@section('content')



    <section class="contact_area p_120">
        <div class="container">
            <div class="mapBox">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d779.5031621694233!2d-0.045941670779341574!3d38.60257909872608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6201050d1369eb%3A0x6e53dd378c5a8a34!2sN-332%2C+56-58%2C+03590+Altea%2C+Alicante!5e0!3m2!1ses!2ses!4v1557733462498!5m2!1ses!2ses" width="1100" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success')}}</p>
                    </div>
                @endif
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Altea, Alicante</h6>
                            <p>Calle los Almendros 10</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>
                                <a href="#">965848972</a>
                            </h6>
                            <p>Lunes a Viernes de 10:00 a 20:00</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>
                                <a href="#">clinicaveter3@gmail.com</a>
                            </h6>
                            <p>Consultar sin compromiso</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <form class="row contact_form" action="{{url('/mail')}}" method="post" id="contactForm" novalidate="novalidate">
                    {{ csrf_field()}}
                    {{ method_field('POST')}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escribe tu nombre">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu correo electrónico">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Escribe un titulo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" type="text" name="mensaje" id="mensaje" rows="10" placeholder="Escribe un mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="vendors/lightbox/simpleLightbox.min.js"></script> -->
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <!-- <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script> -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7nx22ZmINYk9TGiXDEXGVxghC43Ox6qA"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/custom.js"></script>

<script>
    window.onload = function() {
        document.getElementById('contacto').className = 'nav-item active';
    };
</script>

@endsection