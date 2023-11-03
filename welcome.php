
<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
</head>
<body>
    <div >
        <h1>Hola, empleado <b><?php echo htmlspecialchars($_SESSION["num_empleado"]); ?></b> Bienvenide.</h1>
        
    </div>
    <p>
        <a href="reset-password.php" >Cambia tu contraseña</a>
        <a href="logout.php" >Cierra la sesión</a>
</p>



<a class="dire" href="registro-empleado.php">Registrar empleado</a><br><br>

<a class="dire" href="registro_area.php">Registrar areas</a><br><br>

<a class="dire" href="registro_puesto.php">Registrar puestos</a><br><br>

<a class="dire" href="registro_cat_habitaciones.php">Registrar categoria de habitaciones</a><br><br>

<a class="dire" href="registro_cat_cliente.php">Registrar categoria de clientes</a><br><br>

<a class="dire" href="registro_cliente.php">Registrar clientes</a><br><br>

<a class="dire" href="registro_habitaciones.php">Registrar habitaciones</a><br><br>

<a class="dire" href="registro_bar.php">Registrar bar</a><br><br>

<a class="dire" href="registro_descuento.php">Registrar descuentos</a><br><br>

<a class="dire" href="registrar_proveedores.php">Registrar proveedores</a><br><br>

<a class="dire" href="registro_producto.php">Registrar productos</a><br><br>

<a class="dire" href="registro_producto.php">Registrar productos</a><br><br>

<a class="dire" href="registro_reservacion.php">Registrar reservacion</a><br><br>

<a class="dire" href="registro_inventario.php">Registrar Inventario</a><br><br>

<a class="dire" href="registro_tipo_pago.php">Registrar Tipo de pago</a><br><br>

<a class="dire" href="registro_total_monto.php">Registrar el monto total</a><br><br>


</body>
</html>
<style>
    .dire{
        color: black;
        font-size: 17px;
        text-decoration: none;
     
    }
   
        body{ 
        background-color: lightblue;

        }
        div{ font: 14px sans-serif; text-align: center; }
   
</style>