<?php


//Unidad de Trabajo 2.- Características del lenguaje PHP.

//Autor:JNEGC.

session_start(); //inicio de sesion

//iniciar el array asociativo de la sesion si no existe
if(!isset($_SESSION['datos_usuario'])){
    $_SESSION['datos_ususario'] = []; //crear array vacio

}

//verificar si se ha enviado el fromulario en el HTML

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //verificar si los datos del fondo del formulario se han puesto
        if(isset($_POST['nombre']) && isset($_POST['telefono'])){
            //se ha guardado en variable
            $nombre = trim($_POST['nombre']);
            $telefono = trim($_POST['telefono']);


            //Si los campos no estan vacios, agregamos los datos al array en S_SESSION
            if(!empty($nombre) && !empty($telefono)){
                //añade datos al arrya con los nuevos datos
                $_SESSION['datos_usuario'][$nombre] =$telefono;


            }        

            //Si se ha puesto un nombre y no el telefono, se borra la entrada con la clave
            if(!empty($nombre) && empty($telefono)){
                //elimina la entrada del nombre
                unset($_SESSION['datos_usuarios'][$nombre]);
            }


}
}

?>


<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>

    <body>


    <h2>Agenda</h2>

    <?php

    //Mostrar los datos almacenados en la sesion
    if(isset ($_SESSION['datos_usuario'])&& !empty($_SESSION['datos_usuario'])){
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Telefono</th></th>";
        foreach ($_SESSION['datos_usuario'] as $nombre => $telefono){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($nombre) . "</td>";
        echo "<td>" . htmlspecialchars($telefono) . "</td>";
        echo "<tr>";
    }
        echo "</tables>";

    }else{

        echo "<p>NO hay datos de almacenamiento en la sesion. </p>";
    }     
    ?> 



    <h3><strong>Formulario</strong</h3>

    <form action="<?PHP  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Nombre: <input type="text" name="nombre" required><br><br>
        Telefono: <input type="tel" id="telefono" name="telefono"><br><br>
        <input type="submit" values=""Enviar>
    </form>
        
        
    </body>







    
</html>

