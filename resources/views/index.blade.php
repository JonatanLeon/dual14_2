<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 36px;
            background-color: #2d979e;
            color: white;
        }
    </style>
</head>

<body>
<ul>
        @foreach ($usuarios as $usuario)
            <li>{{$usuario->nombre}}</li>
        @endforeach
</ul>
</body>

</html>