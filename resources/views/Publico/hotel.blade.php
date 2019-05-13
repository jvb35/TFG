@extends('layout')
    
@section('content')

<section class="sample-text-area" style="margin-top: 50px;">
    <div class="container">
        <h3 class="text-heading title_color">Hotel Canino</h3>
        <p class="sample-text">
            ¿Estás trabajando y no puedes cuidar a tu mascota? ¿Te vas de viaje y no sabes donde dejar tu mascota?
            Pues tenemos la solución a tu problema. Disponemos de un magnífico hotel donde cuidaremos a tus mascotas.
            En nuestro hotel tenemos una capacidad de hasta 100 mascotas diarias, por lo cual no va a ser un problema
            que nos dejes a tu mascota, ya que podremos acojerla sea el día que sea. Revisa nuestra galería de fotos
            y nuestros horarios. No te lo pienses más y reserva hospedaje para tu mascota. ¡No te arrepentirás!

        </p>
    </div>
</section>

<div class="section-top-border">
    <h3 class="title_color">Galería</h3>
    <div class="row gallery-item">
        <div class="col-md-4">
            <a href="img/hotel1.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel1.jpg);"></div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="img/hotel2.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel2.jpg);"></div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="img/hotel3.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel3.jpg);"></div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="img/hotel4.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel4.jpg);"></div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="img/hotel5.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel9.jpg);"></div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="img/elements/g6.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel5.jpg);"></div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="img/elements/g7.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel7.jpg);"></div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="img/elements/g8.jpg" class="img-gal">
                <div class="single-gallery-image" style="background: url(img/hotel8.jpg);"></div>
            </a>
        </div>
    </div>
</div>


	<!--================ Start Appointment Area =================-->
	<section class="appointment-area">
		<div class="container">
			<div class="row justify-content-between align-items-center appointment-wrap">
				<div class="col-lg-6 col-md-6 appointment-left">
					<h1>
						Horario de Servicio
					</h1>
					<p>
						En cualquiera de estas horas pueden venir a dejar a su mascota sin compromiso ni cita previa.
					</p>
					<ul class="time-list">
						<li class="d-flex justify-content-between">
							<span>Lunes a Viernes</span>
							<span>08.00 - 20.00</span>
						</li>
						<li class="d-flex justify-content-between">
							<span>Sábados</span>
							<span>10.00 - 18.00</span>
						</li>
						<li class="d-flex justify-content-between">
							<span>Domingos</span>
							<span>10.00 - 14.00</span>
						</li>
					</ul>
                </div>
                <div class="col-lg-6 col-md-6 appointment-left">
					<h1>
						Precio
					</h1>
					<p>
						Nuestros precios son los más asequibles del mercado. No dejes escapar esta oportunidad.
					</p>
					<ul class="time-list">
						<li class="d-flex justify-content-between">
							<span>1 día</span>
							<span>20€</span>
						</li>
						<li class="d-flex justify-content-between">
							<span>1 Semana</span>
							<span>100€</span>
						</li>
						<li class="d-flex justify-content-between">
							<span>1 mes</span>
							<span>300€</span>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</section>


<script>
    window.onload = function() {
        document.getElementById('hotel').className = 'nav-item active';
    };
</script>

@endsection