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
      
    <!-- Main content -->
    <section class="content">

            <div class="container-page">				
                    <div class="col-md-6">
                        
                        <div class="form-group col-lg-6">
                            <label>Nombre</label>
                            <input type="" name="" class="form-control" id="" value="">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>Chip</label>
                            <input type="password" name="" class="form-control" id="" value="">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control">	
                        </div>
                                        
                        <div class="form-group col-lg-6">
                            <label>Raza</label>
                            <input type="" name="" class="form-control" id="" value="">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>Especie</label>
                            <input type="" name="" class="form-control" id="" value="">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>Peso</label>
                            <input type="" name="" class="form-control" id="" value="">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Num. Pasaporte</label>
                            <input type="" name="" class="form-control" id="" value="">
                        </div>
                        
                        <div class="form-group col-lg-6" style="margin-top: 30px;">
                            <label>
                                <input id="M" type="radio" name="numero" value="1"> Macho
                            </label>
                            
                            <label style="margin-left: 15px;">
                                <input id="H" type="radio" name="numero" value="2"> Hembra
                            </label>
                            
                        </div>
                        

                    
                    </div>
                
                    <div class="col-md-6">
                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                <output id="list"></output>
                                <img id="img" class="thumb" src="/images/foto-por-defecto.png" title="Foto" style="width: 250px; height: 250px;"/>
                                <input type="file" id="files" name="files[]" />
                                

                            </div>
                    </div>
                </div>

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