<head>
    <style>
        .title {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 3.2em;
            line-height: 48px;
            padding-bottom: 48px;
            color: #5543ca;
            background: #5543ca;
            background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
            background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
            background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .contact-form .form-field {
            position: relative;
            margin: 32px 0;
        }
        .contact-form .input-text {
            display: block;
            width: 100%;
            height: 36px;
            border-width: 0 0 2px 0;
            border-color: #5543ca;
            font-size: 18px;
            line-height: 26px;
            font-weight: 400;
        }
        .contact-form .input-text:focus {
            outline: none;
        }
        .contact-form .input-text:focus + .label,
        .contact-form .input-text.not-empty + .label {
            -webkit-transform: translateY(-24px);
                    transform: translateY(-24px);
        }
        .contact-form .label {
            position: absolute;
            left: 20px;
            bottom: 20px;
            font-size: 18px;
            line-height: 26px;
            font-weight: 400;
            color: #5543ca;
            cursor: text;
            transition: -webkit-transform .2s ease-in-out;
            transition: transform .2s ease-in-out;
            transition: transform .2s ease-in-out, 
            -webkit-transform .2s ease-in-out;
        }
        .contact-form .submit-btn {
            display: inline-block;
            background-color: #000;
            background-image: linear-gradient(125deg,#a72879,#064497);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 16px;
            padding: 8px 16px;
            border: none;
            width:200px;
            cursor: pointer;
        }

    </style>
</head>




@extends('panel-admin')
@section('content')


    <section class="content">
    <h1 class="title">Añadir personal</h1>
        <form class="contact-form row" action="{{action('AdminController@addPersonal')}}" method="POST" name="subida-imagenes" enctype="multipart/form-data">
            {{ csrf_field()}}
            {{ method_field('POST')}}
            <div class="col-md-6">
                <div class="form-field col-lg-6">
                    <input name="nombre" class="input-text js-input" type="text" required>
                    <label class="label" for="name">Nombre</label>
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="correo" class="input-text js-input" type="email" required>
                    <label class="label" for="email">Correo</label>
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="fecha_nac" class="input-text js-input" type="date" required>
                    <label class="label" for="company">Fecha Nacimiento</label>
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="telefono" class="input-text js-input" type="text" required>
                    <label class="label" for="phone">Telefono</label>
                </div>
                <div class="form-field col-lg-6">
                    <input name="direccion" class="input-text js-input" type="text" required>
                    <label class="label" for="message">Direccion</label>
                </div>
                <div class="form-field col-lg-6">
                    <input name="especialidad" class="input-text js-input" type="text" required>
                    <label class="label" for="message">Especialidad</label>
                </div>
                <div class="form-field col-lg-6">
				<label class="label" for="message">Contraseña</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<input type="password" class="input-text js-input" name="password" id="password" required/>
						<span class="input-group-addon" onClick="mostrarPassword();"><i class="fa fa-eye-slash icon"></i></span>
					</div>
				</div>
			</div>
                <div class="form-field col-lg-6">
                    <button type="button" class="btn btn-primary" onClick="generar(6);">Generar</button>
                    
                </div>
                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" value="Insertar">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <output id="list"></output>
                    <img id="img" class="thumb" src="/images/foto-por-defecto.png" title="Foto" style="width: 250px; height: 250px;"/>
                    <input type="file" id="files" name="photo" />

                </div>
            </div>

        </form>
    </section>

    <script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object
        
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
        
                var reader = new FileReader();
        
                reader.onload = (function(theFile) {
                    return function(e) {
                    // Insertamos la imagen
                    document.getElementById("img").remove();
                    document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '" style="width: 250px; height: 250px;"/>'].join('');
                    };
                })(f);
        
                reader.readAsDataURL(f);
            }
        }
        
        document.getElementById('files').addEventListener('change', archivo, false);

        function generar(longitud)
		{
			var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ2346789";
			var contraseña = "";
			for (i=0; i<longitud; i++) contraseña += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
			document.getElementById('password').value = contraseña;
		}

	
		
		function mostrarPassword(){
			var cambio = document.getElementById("password");
			if(cambio.type == "password"){
				cambio.type = "text";
				$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
			}else{
				cambio.type = "password";
				$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
			}
		}

    </script>


@endsection    