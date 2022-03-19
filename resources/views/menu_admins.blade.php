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
            font-size: 36px;
            background-color: #2d979e;
            color: white;
        }

        #encabezado {
            color: white;
        }

        .texto {
            margin: 10px;
            width: 500px;
            height: 50px;
        }

        .botones {
            cursor: pointer;
            font-size: 14px;
            height: 30px;
            width: 120px;
            margin: 20px;
        }
    </style>
</head>

<body>
    <h1 id="encabezado">Panel de control</h1>
    <br>
    <a href="/registro"><button class="botones" type="button">Crear</button></a>
    <a href="/buscarusuario"><button class="botones" type="button">Mostrar</button></a>
    <a href="/modificarusuario"><button class="botones" type="button">Modificar</button></a>
    <a href="/borrarusuario"><button class="botones" type="button">Eliminar</button></a>
</body>

</html>