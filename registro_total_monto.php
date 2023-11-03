<?php 

require_once "config.php";

$cliente = $link -> prepare("SELECT id_cliente, nombres FROM cliente");
$cliente -> execute();
$resultado = $cliente -> get_result();

$tipo_pago = $link -> prepare("SELECT id_tipo_pago, nom_tipo_pago FROM tipo_pago");
$tipo_pago -> execute();
$resultadopago = $tipo_pago -> get_result();

$descuento = $link -> prepare("SELECT id_descuento, porcentaje FROM descuento ");
$descuento  -> execute();
$resultadodescuento = $descuento  -> get_result();

include("config.php");

if (isset($_POST['monto_total'])) {
    if (strlen($_POST ['monto_total']) >= 1 &&  strlen($_POST ['monto_total']) >= 1 ){
    $fk_cliente = trim($_POST['fk_cliente']);
    $monto_total = trim($_POST['monto_total']);
    $fecha_pago = trim($_POST['fecha_pago']);
    $fk_descuento = trim($_POST['fk_descuento']);
    $fk_tipo_pago = trim($_POST['fk_tipo_pago']);
    $consulta = "INSERT INTO total_monto(fk_cliente, monto_total, fecha_pago, fk_descuento, fk_tipo_pago) VALUES ('$fk_cliente','$monto_total','$fecha_pago','$fk_descuento','$fk_tipo_pago')";
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
<h1>Registro monto total</h1>
<a href="welcome.php">Regresar</a>
<center>

<form action="" class="form_reg" method="POST" >
 <p>Monto total</p>
    <input type="text" name="monto_total" >
    <p>Fecha de pago</p>
    <input type="text" name="fecha_pago">
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

<p>Tipo de pago</p>
  <select name="fk_tipo_pago" id="">
  
    <?php
while ($fila = $resultadopago ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_tipo_pago"]?>">
<?php echo $fila["nom_tipo_pago"]?>
</option>

<?php
} 
?>
</select>

<p>Descuento</p>
  <select name="fk_descuento" id="">
  
    <?php
while ($fila = $resultadodescuento ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_descuento"]?>">
<?php echo $fila["porcentaje"]?>
</option>

<?php
} 
?>
</select>

    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
</center>

<style>
    .form_reg{
        height: 600px;
        width: 30%;
        background-color: lightblue;
    }
</style>