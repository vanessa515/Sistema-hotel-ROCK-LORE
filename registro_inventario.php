<?php 

require_once "config.php";

$area = $link -> prepare("SELECT id_area, nom_area FROM area");
$area -> execute();
$resultado = $area -> get_result();

$producto = $link -> prepare("SELECT id_producto, nom_prod FROM producto");
$producto -> execute();
$resultadoprod = $producto -> get_result();

include("config.php");

if (isset($_POST['cantidad'])) {
    if (strlen($_POST ['cantidad']) >= 1 &&  strlen($_POST ['cantidad']) >= 1 ){
    $fk_producto = trim($_POST['fk_producto']);
    $cantidad = trim($_POST['cantidad']);
    $fk_area = trim($_POST['fk_area']);
    $fecha = trim($_POST['fecha']);
    $consulta = "INSERT INTO inventario(fk_producto, cantidad, fk_area, fecha) VALUES ('$fk_producto','$cantidad','$fk_area','$fecha')";
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
<h1>Registro de inventario</h1>
<a href="welcome.php">Regresar</a>
<center>

<form action="" class="form_reg" method="POST" >
 <p>Cantidad de producto</p>
    <input type="text" name="cantidad" >
    <p>fecha</p>
    <input type="text" name="fecha">
    <p>Area</p>
    <select name="fk_area" id="">
       
    <?php
while ($fila = $resultado ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_area"]?>">
<?php echo $fila["nom_area"]?>
</option>

<?php
} 
?>

</select>

<p>Producto</p>
  <select name="fk_producto" id="">
  
    <?php
while ($fila = $resultadoprod ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_producto"]?>">
<?php echo $fila["nom_prod"]?>
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