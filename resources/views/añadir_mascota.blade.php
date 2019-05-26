<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>

    <style>
        .main-center{
            margin-top: 30px;
            margin: 0 auto;
            max-width: 330px;
        }

        .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
        }
    </style>
</head>

@extends('panel-admin')
@section('content')

    <section class="content-header">
        <h1>
           Añadir mascota
        </h1>
    </section>
      

    <section class="content">
            <form class="form-horizontal" action="{{action('MascotaController@addMascota')}}" method="POST" name="subida-imagenes" enctype="multipart/form-data">
            {{ csrf_field()}}
            {{ method_field('POST')}}

            <div class="col-md-6">
            				        
                <div class="form-group">
                    <label for="chip" class="col-lg-1 control-label">Chip</label>
                    <div class="col-lg-6" style="margin-left: 25px;">
                        <input type="name" class="form-control" name="chip" id="chip" placeholder="Insertar el número chip">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre" class="col-lg-1 control-label">Nombre</label>
                    <div class="col-lg-6" style="margin-left: 25px;">
                        <input type="name" class="form-control" name="nombre" id="nombre" placeholder="Inserta un nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fecha_nac" class="col-lg-1 control-label">Fecha Nacimiento</label>
                    <div class="col-lg-6" style="margin-top: 7px; margin-left: 25px;">
                        <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" placeholder="Inserta la fecha de nacimiento">
                    </div>
                </div>

                <div class="form-group">
                    <label for="raza" class="col-lg-1 control-label">Raza</label>
                    <div class="col-lg-6" style="margin-left: 25px;">
                        <input type="name" class="form-control" name="raza" id="raza" placeholder="Inserta una raza">
                    </div>
                </div>

                <div class="form-group">
                    <label for="especie" class="col-lg-1 control-label">Especie</label>
                    <div class="col-lg-6" style="margin-left: 25px;">
                        <input type="name" class="form-control" name="especie" id="especie" placeholder="Inserta una especie">
                    </div>
                </div>

                <div class="form-group">
                    <label for="num_pasaporte" class="col-lg-1 control-label">Número pasaporte</label>
                    <div class="col-lg-6"  style="margin-top: 7px; margin-left: 25px;">
                        <input type="name" class="form-control" name="num_pasaporte" id="num_pasaporte" placeholder="Inserta el número de pasaporte">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sexo" class="col-lg-1 control-label">Sexo</label>
                    <div class="col-lg-6" style="margin-left: 25px; magin-top: 15px;">
                        <input type="radio" name="masc" id="masc" value="macho"> Macho
                        <input type="radio" name="fem" id="fem" value="hembra"> Hembra
                    </div>
                </div>

                <div class="form-group">
                    <label for="peso" class="col-lg-1 control-label">Peso</label>
                    <div class="col-lg-6" style="margin-left: 25px;">
                        <input type="name" class="form-control" name="peso" id="peso" placeholder="Inserta un peso">
                    </div>
                </div>

                <div class="form-group">
                    <label for="propietario" class="col-lg-1 control-label">Propietario</label>
                    <div class="col-lg-6" style="margin-left: 25px;">
                        <input type="search" class="form-control" name="propietario" list="listapersonas" placeholder="Insertar un propietario">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-5">
                        <input type="submit" class="btn btn-default" value="Crear">
                        <input type="button" class="btn btn-default" onclick="location.href='/admin-menu/mascotas/ver';" value="Cancelar">
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <output id="list"></output>
                    <img id="img" class="thumb" src="/images/foto-por-defecto.png" title="Foto" style="width: 250px; height: 250px;"/>
                    <input type="file" id="files" name="photo" />

                </div>
            </div>
    </div>

            
            </form>
            
            <datalist id="listapersonas">
                @foreach ($personas as $persona)
                    <option value="{{$persona->nombre}}">
                @endforeach

            </datalist>

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

    </script>

@endsection