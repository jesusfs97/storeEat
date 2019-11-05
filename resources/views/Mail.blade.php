<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje Recibido</title>
</head>
<body>
    <p>Recibiste un mensaje de: {{$mensaje['Nombre']}} - {{$mensaje['Correo']}} </p>
    <p><strong>Asunto:</strong> {{$mensaje['Asunto']}}</p>
    <p><strong>Contenido:</strong> {{$mensaje['Contenido']}}</p>
</body>
</html>