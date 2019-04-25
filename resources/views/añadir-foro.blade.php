<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>


    <style>
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #007bff !important;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #007bff !important;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            color: #007bff !important;
        }
    </style>
</head>

@extends('panel-admin')
@section('content')

<div class="container">

        <div class="row">

            <div class="col-md-8 offset-md-2">

                <h1>Añadir tema</h1>

                <form id="contact-form" method="POST" action="{{action('AdminController@addTema')}}">
                {{ csrf_field()}}
	            {{ method_field('POST')}}
                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name">Titulo </label>
                                    <input id="form_name" type="text" name="nombre" class="form-control" placeholder="Inserte un titulo" required="required"
                                        data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_lastname">Lugar </label>
                                    <input id="form_lastname" type="text" name="direccion" class="form-control" placeholder="Inserte el lugar" required="required"
                                        data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email">Autor </label>
                                    <input id="form_email" type="text" name="autor" class="form-control" placeholder="Inserte el autor" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone">Telefono</label>
                                    <input id="form_phone" type="tel" name="telefono" class="form-control" placeholder="Inserte un teléfono">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email">Municipio </label>
                                    <input id="form_email" type="text" name="municipio" class="form-control" placeholder="Inserte el municipio" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone">Correo</label>
                                    <input id="form_phone" type="text" name="correo" class="form-control" placeholder="Inserte un correo">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form_message">Descripcion </label>
                            <textarea id="form_message" name="descripcion" class="form-control" placeholder="Inserte una descripción" rows="4" required="required"
                                data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                        <input type="submit" class="btn btn-primary btn-send" value="Enviar">
                        
                    </div>
                    
                </form>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->




@endsection