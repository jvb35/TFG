@extends('layout')
    
@section('content')
	<!--================Header Menu Area =================-->

	<!--================ Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="col-lg-12">

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->

	<!--================ Procedure Category Area =================-->
	<section class="procedure_category section_gap">
		<div class="container">
				<div class="col-lg-12" style="text-align:center;">
					<h1>Ultimas tecnologias</h1>
					<p>
					En la medicina preventiva, medicina general y especialidades, así como en todo lo que ofrecemos en nuestra clínica veterinaria a nuestros clientes, el denominador común es la pasión con la que trabajamos, ya que ponemos todo nuestro corazón, toda nuestra mente y toda nuestra alma en lo que hacemos, y podemos decir orgullosos que trabajamos en lo que nos apasiona, somos felices haciéndolo y no nos vemos trabajando en otro sitio o de otra forma.
					</p>
				</div>

			<div class="row">
				<div class="col-lg-4">
					<div class="categories_post">
						<img src="img/robotica.jpg" alt="Procedure" style="width: 350px;height: 360px;">
						<div class="categories_details">
							<div class="categories_text">
								<div class="border_line"></div>
								<a href="single-blog.html">
									<h5>Cirugía Robótica</h5>
								</a>
								<div class="border_line"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="categories_post">
						<img src="img/laboratorio.jpg" alt="Procedure" style="width: 350px;height: 360px;">
						<div class="categories_details">
							<div class="categories_text">
								<div class="border_line"></div>
								<a href="single-blog.html">
									<h5>Laboratorio</h5>
								</a>
								<div class="border_line"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="categories_post">
						<img src="img/laser.jpg" alt="Procedure" style="width: 350px;height: 360px;">
						<div class="categories_details">
							<div class="categories_text">
								<div class="border_line"></div>
								<a href="single-blog.html">
									<h5>Cirugía láser</h5>
								</a>
								<div class="border_line"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Procedure Category Area =================-->



	<!--================ Start Offered Services Area =================-->
	<section class="service_area section_gap">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Nuestros Servicios</h1>
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
			</div>
		</div>
	</section>
	<!--================ End Offered Services Area =================-->


	<!--================ Start recent-blog Area =================-->
	<section class="recent-blog-area section_gap">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Últimas Noticias</h1>
					<p>
						Toda la información actualizada!
					</p>
				</div>
			</div>
			<div class="row">
				<div class="single-recent-blog col-lg-4 col-md-4">
					<div class="thumb">
						<img class="f-img img-fluid mx-auto" src="img/obesidad.jpg" alt="" style="height: 190px;">
					</div>
					<a href="#">
						<h4>La obesidad, una patología silenciosa.</h4>
					</a>
					<p>
						Cada día visitamos a multitud de pacientes, perros y gatos que acuden a su visita veterinaria por diferentes motivos.
					</p>
					<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
						<div class="meta">
							<span class="lnr lnr-calendar-full"></span> 13 Abril
						</div>
					</div>
				</div>
				<div class="single-recent-blog col-lg-4 col-md-4">
					<div class="thumb">
						<img class="f-img img-fluid mx-auto" src="img/leishmania.jpg" alt="" style="height: 190px;">
					</div>
					<a href="#">
						<h4>Leishmania</h4>
					</a>
					<p>
						Este enfermedad está en auge desde los últimos años. Es una enfermedad muy típica en animales de raza pura, por tanto es recomendable 
						hacer varias pruebas anuales para captar su enfermedad lo más temprano posible.
					</p>
					<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
						<div class="meta">
							<span class="lnr lnr-calendar-full"></span> 25 Mayo
						</div>
					</div>
				</div>
				<div class="single-recent-blog col-lg-4 col-md-4">
					<div class="thumb">
						<img class="f-img img-fluid mx-auto" src="img/congreso.jpg" alt="" style="height: 190px;">
					</div>
					<a href="#">
						<h4>Congreso Valencia 2019</h4>
					</a>
					<p>
						El próximo mes de Julio, el equipo profesional de veterinarios de nuestra empresa acudirá al evento anual sobre nuevas enfermedades que se celebra este
						año en Valencia, donde nuestros compañeros podrán adquirir conocimientos sobre posibles futuras enfermedades.
					</p>
					<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
						<div class="meta">
							<span class="lnr lnr-calendar-full"></span> 10 Junio
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ end recent-blog Area =================-->

	<script>
        window.onload = function() {
            document.getElementById('home').className = 'nav-item active';
        };
    </script>
@endsection
