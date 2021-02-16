<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideas</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="js/ajax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="width: 30%;">
        <div class="abs-center">
            <br>
            <h3 style="text-align: center;">Ideas</h3>
            <form method="post" onsubmit="crear(); return false;" class="border p-3 form">
                {{--@csrf --}}
                {{csrf_field()}}
                <div class="form-group">
                    <label>Título </label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Título">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <input class="form-control" type="text" id="description" name="description" placeholder="Crear la nota..">
                </div>
                <input type="submit" class="btn btn-success" value="Crear">
            </form>
            <div class="row">
                <div class="column-1">
                    <h3 id="mensaje">Aquí verás las últimas modificaciones...</h3>
                </div>
            </div>
        </div>
    </div>
    </br>
    </br>
    <div class="row" id="section-3" style="margin-left: 20%">
        
    </div>
    

    <div id="modal" class="modal">
        <div class="modal-content" id="content">
        <span class="close" onclick="closeModal()">&times;</span>
                <form method="POST" onsubmit="updateNota();return false;">
                <div class="form-group">
                    <label>Título </label>
                    <input class="form-control" type="text" id="title2" name="title" placeholder="Título">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <input class="form-control" type="text" id="description2" name="description" placeholder="Modificar la nota..">
                </div>
                <input type="hidden" id="id" value="" >
                <input type="submit" class="btn btn-success" value="Cambiar">
            </form>
                </div>
            </div>
        </div>

    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- <script src="{{asset('js/code.js')}}"></script> -->
</body>

</html>