@extends('layout')
    
@section('content')

<section class="service_area section_gap" style="margin-top: 100px;">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Nuestros servicios</h1>
					<p>
                    Tenemos una amplia serie de servicios para que el cuidado y el bienestar de tú mascota sea nuestro principal objetivo 
					</p>
				</div>
			</div>

			<div class="row">
            <div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-rocket"></span>
							<h4>24/7 Emergencias</h4>
						</a>
						<p>
							Tenemos a vuestra disposición veterinarios las 24 horas de día y los 365 dias del año.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-heart-pulse"></span>
							<h4>Personal experto</h4>
						</a>
						<p>
							Contamos con una amplia plantilla de los mejores profesionales en el sector de Veterinaria.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-bug"></span>
							<h4>Enfermedades </h4>
						</a>
						<p>
							Somos expertos en todo tipo de enfermedades en animales domésticos, por eso nuestra clínica es el lugar idóneo para tu máscota.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-users"></span>
							<h4>Ambiente Familiar</h4>
						</a>
						<p>
							Te aseguraremos un trato muy familiar y sobretodo, quedarás contento con el trato recibido a tu mascota.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-calendar-full"></span>
						<a href="#">
							<h4>Citas</h4>
						</a>
						<p>
							Disponemos de un amplio calendario para poder gestionar muchas citas a la misma vez.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-home"></span>
						<a href="#">
							<h4>Servicio domicilio</h4>
						</a>
						<p>
							Si no puedes venir a nuestra consulta no hay problema, nosotros iremos a tu hogar lo más temprano posible.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-chart-bars"></span>
						<a href="#">
							<h4>Estadísticas</h4>
						</a>
						<p>
							Según las estadísticas somos uno de los mejores centros veterinarios en toda España.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_service">
						<span class="lnr lnr-earth"></span>
						<a href="#">
							<h4>Comunicación</h4>
						</a>
						<p>
							La comunicación con nosotros no va a ser un problema. Hablamos hasta 7 idiomas diferentes.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


<script>
    window.onload = function() {
        document.getElementById('servicios').className = 'nav-item submenu dropdown active';
    };
</script>
@endsection