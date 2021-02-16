<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('css/styles.css')}}"> --}}
    <title>Document</title>
</head>
<body>
    <div>
        <form action="{{url('modificar/'.$nota->id)}}" method="POST" class="form-group">
          @csrf
          {{method_field('PUT')}}
          <label for="title">Titulo</label>
          <input class="form-control" type="text" id="title" name="title" value="{{$nota->title}}" placeholder="Titulo..">
      
          <label for="description">Descripcion</label>
          <input class="form-control" type="text" id="description" name="description" value="{{$nota->description}}" placeholder="Descripcion...">
        
          <input class="btn btn-outline-primary" type="submit" name="Enviar" value="Enviar">
        </form>
      </div>
      <script src="{{asset('js/app.js')}}"></script>
</body>
</html>