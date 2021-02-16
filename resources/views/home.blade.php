<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideas</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
<h3>Notas</h3>

<div>
  <form action="/action_page.php">
    <label for="title">Título </label>
    <input type="text" id="title" name="title" placeholder="Título">

    <label for="description">Descripción</label>
    <input type="text" id="description" name="description" placeholder="Crear la nota..">
  
    <input type="submit" value="Crear">
  </form>
</div>
</body>
</html>