<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="/js/codigo.js"></script>
		<script src="js/bootstrap-table-pagination.js"></script>
		

        <style>
			.linea {
				height: 5px;
				background-color: blue;
			}



            .profile-header-container{
                margin: 0 auto;
                text-align: center;
            }

            .profile-header-img {
                padding: 54px;
            }

            .profile-header-img > a > img.img-circle {
                width: 100px;
                height: 100px;
                border: 2px solid #51D2B7;
            }

            .profile-header {
                margin-top: 43px;
            }

            /**
            * Ranking component
            */
            .rank-label-container {
                margin-top: -19px;
                /* z-index: 1000; */
                text-align: center;
            }

            .label.label-default.rank-label {
                background-color: rgb(81, 210, 183);
                padding: 5px 10px 5px 10px;
                border-radius: 27px;
            }

        </style>
    
    </head>
    
    @extends('panel-admin')
	@section('content')
	
	<section class="content">

	<div class="row">
		<div class="col-md-6">
			<h3> Datos personales</h3>		
			<hr class="linea">
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Nombre</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Fecha de Nacimiento</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-birthday-cake" ></i></span>
						<input type="date" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Teléfono</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone" ></i></span>
						<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Dirección</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building" ></i></span>
						<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">País</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-flag" ></i></span>
						<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
					</div>
				</div>
			</div>
			<br>
			<button type="button" class="btn btn-primary">Guardar</button>

		</div>
		<div class="col-md-6">
			<h3> Datos de Acceso </h3>
			<hr class="linea">
			<div class="form-group">
				<label for="email" class="cols-sm-2 control-label">Your Email</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="password" class="cols-sm-2 control-label">Password</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
						<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
					</div>
				</div>
			</div>

			<button type="button" class="btn btn-primary">Generar</button>
			<br>
			<h3> Mascotas asociadas </h3>
			<hr class="linea">
			<div class="row">
				<div class="col-sm-3">
					<div class="profile-header-img" style="margin-top: -40px;">
							<a href="/admin-menu"><img class="img-circle" src="/images/añadir-person.png" /></a>
					</div>
					
				</div>
				<div class="col-sm-3">
					<div class="profile-header-img" style="margin-top: -40px;">
							<a href="/admin-menu"><img class="img-circle" src="/images/Dalmata.png" /></a>
					</div>
				</div> 
				
				<div class="col-sm-3">
					<div class="profile-header-img" style="margin-top: -40px;">
							<a href="/admin-menu"><img class="img-circle" src="/images/asha.JPG" /></a>
						</div>
					</div> 
				</div>

			</div>

		</div>
	</div>

	</section>


	@endsection