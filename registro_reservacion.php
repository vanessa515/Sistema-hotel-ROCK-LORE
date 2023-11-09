<?php 

require_once "config.php";

$cliente = $link -> prepare("SELECT id_cliente, nombres FROM cliente");
$cliente -> execute();
$resultado = $cliente -> get_result();

$habitacion = $link -> prepare("SELECT id_habitacion, num_habitacion FROM habitacion");
$habitacion -> execute();
$resultadohabitacion = $habitacion -> get_result();

include("config.php");

if (isset($_POST['fecha_entrada'])) {
    if (strlen($_POST ['fecha_entrada']) >= 1 &&  strlen($_POST ['fecha_entrada']) >= 1 ){
    $fk_cliente = trim($_POST['fk_cliente']);
    $fk_habitacion = trim($_POST['fk_habitacion']);
    $fecha_entrada = trim($_POST['fecha_entrada']);
    $fecha_salida = trim($_POST['fecha_salida']);
    $consulta = "INSERT INTO reservaciones(fk_cliente, fk_habitacion, fecha_entrada, fecha_salida) VALUES ('$fk_cliente','$fk_habitacion','$fecha_entrada','$fecha_salida')";
    $resultado = mysqli_query($link, $consulta);

    if ($resultado) {
        ?>
        <h3 class="ok"> Se ha guardado correctamente</h3>
        <?php 
    } else {
        ?>
        <h3 class="ok"> Ups, ha ocurrido un error</h3>
        <?php  
    }
} else {
        ?>
        <h3 class="null">Por favor complete los campos </h3>
        <?php  
    
}

}

?>
<h1>Registro de empleados</h1>
<a href="welcome.php">Regresar</a>
<center>
<p>Agregar reservacion</p>
<form action="" class="form_reg" method="POST" >
 <p>Fecha de entrada</p>
    <input type="text" name="fecha_entrada" >
    <p>Fecha de salida</p>
    <input type="text" name="fecha_salida">
   
    
    
    <p>Cliente</p>
    <select name="fk_cliente" id="">
       
    <?php
while ($fila = $resultado ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_cliente"]?>">
<?php echo $fila["nombres"]?>
</option>

<?php
} 
?>

</select>

<p>Habitacion</p>
  <select name="fk_habitacion" id="">
  
    <?php
while ($fila = $resultadohabitacion ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_habitacion"]?>">
<?php echo $fila["num_habitacion"]?>
</option>

<?php
} 
?>
</select>


    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
</center>

