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
					<h1>Nuestro Servicios</h1>
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


	<!--================ Start Appointment Area =================-->
	<section class="appointment-area">
		<div class="container">
			<div class="row justify-content-between align-items-center appointment-wrap">
				<div class="col-lg-5 col-md-6 appointment-left">
					<h1>
						Servicing Hours
					</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<ul class="time-list">
						<li class="d-flex justify-content-between">
							<span>Monday-Friday</span>
							<span>08.00 am - 10.00 pm</span>
						</li>
						<li class="d-flex justify-content-between">
							<span>Saturday</span>
							<span>08.00 am - 10.00 pm</span>
						</li>
						<li class="d-flex justify-content-between">
							<span>Sunday</span>
							<span>08.00 am - 10.00 pm</span>
						</li>
					</ul>
				</div>
				<div class="col-lg-6 col-md-6 pt-60 pb-60">
					<div class="appointment-right">
						<form class="form-wrap" action="#">
							<h3 class="pb-20 text-center mb-20">Book an Appointment</h3>
							<input type="text" class="form-control" name="name" placeholder="Patient Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name'">
							<input type="text" class="form-control" name="phone" placeholder="Phone " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
							<input type="email" class="form-control" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
							<input id="datepicker1" name="dop" class="dates form-control" placeholder="Date of Birth" type="text">
							<div class="form-select" id="service-select">
								<select>
									<option data-display="">Disease Type</option>
									<option value="1">Type One</option>
									<option value="2">Type Two</option>
									<option value="3">Type Three</option>
									<option value="4">Type Four</option>
								</select>
							</div>
							<input id="datepicker2" class="dates form-control" placeholder="appointment Date" type="text">
							<textarea name="messege" class="" rows="5" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"></textarea>
							<div class="text-center confirm_btn_box">
								<button class="main_btn text-uppercase">Confirm Booking</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Appointment Area =================-->

	<!--================ Start recent-blog Area =================-->
	<section class="recent-blog-area section_gap">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Our Recent Blogs</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="single-recent-blog col-lg-4 col-md-4">
					<div class="thumb">
						<img class="f-img img-fluid mx-auto" src="img/b1.jpg" alt="">
					</div>
					<a href="#">
						<h4>Portable Fashion for women</h4>
					</a>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud.
					</p>
					<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
						<div class="meta">
							<span class="lnr lnr-calendar-full"></span> 13th Dec
							<span class="lnr lnr-heart"></span> 15
							<span class="lnr lnr-bubble"></span> 04
						</div>
					</div>
				</div>
				<div class="single-recent-blog col-lg-4 col-md-4">
					<div class="thumb">
						<img class="f-img img-fluid mx-auto" src="img/b2.jpg" alt="">
					</div>
					<a href="#">
						<h4>Summer ware are coming</h4>
					</a>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud.
					</p>
					<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
						<div class="meta">
							<span class="lnr lnr-calendar-full"></span> 13th Dec
							<span class="lnr lnr-heart"></span> 15
							<span class="lnr lnr-bubble"></span> 04
						</div>
					</div>
				</div>
				<div class="single-recent-blog col-lg-4 col-md-4">
					<div class="thumb">
						<img class="f-img img-fluid mx-auto" src="img/b3.jpg" alt="">
					</div>
					<a href="#">
						<h4>Summer ware are coming</h4>
					</a>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud.
					</p>
					<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
						<div class="meta">
							<span class="lnr lnr-calendar-full"></span> 13th Dec
							<span class="lnr lnr-heart"></span> 15
							<span class="lnr lnr-bubble"></span> 04
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ end recent-blog Area =================-->
@endsection
