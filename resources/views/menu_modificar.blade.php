<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        body {
            text-align: center;
            margin-top: 10%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: larger;
            background-color: #2d979e;
        }

        #encabezado {
            color: white;
        }

        .texto {
            margin: 10px;
            width: 300px;
            height: 30px;
        }

        .botones {
            cursor: pointer;
            font-size: 14px;
            height: 30px;
            width: 150px;
            margin: 20px;
        }
    </style>
</head>

<body>
    <h2 id="encabezado">Modificando el usuario {{$nombre}}</h2>
    <form action="{{route('usuario.mod', $nombre)}}" method="post">
        {{ csrf_field() }}
        <input class="texto" required="" type="text" placeholder="Nuevo nombre" name="nombre"/>
        <br>
        <input class="texto" required="" type="text" placeholder="Nueva contraseña" name="password"/>
        <br>
        <input class="botones" type="submit" value="Aceptar" /> 
    </form>
</body>

</html>