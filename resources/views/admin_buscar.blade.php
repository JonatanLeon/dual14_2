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
    <h1 id="encabezado">Consultar usuario</h1>
    <form action='/buscarusuario/datosusuario' method="post">
        {{ csrf_field() }}
        <input class="texto" required="" type="text" placeholder="Usuario" name="nombre"/>
        <br>
        <input class="botones" type="submit" value="Mostrar datos" /> 
    </form>
</body>

</html>