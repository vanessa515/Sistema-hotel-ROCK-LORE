<?php 
include("config.php");



if (isset($_POST['nombres'])) {
    if (strlen($_POST ['nombres']) >= 1 &&  strlen($_POST ['correo']) >= 1 ){
    $nombres = trim($_POST['nombres']);
    $apaterno = trim($_POST['apaterno']);
    $amaterno = trim($_POST['amaterno']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']);
    $estatus = trim($_POST['estatus']);
    $fk_area = trim($_POST['fk_area']);
    $fk_puesto = trim($_POST['fk_puesto']);
    $consulta = "INSERT INTO empleado(nombres, apaterno, amaterno, telefono, correo, estatus, fk_area, fk_puesto) VALUES ('$nombres','$apaterno','$amaterno','$telefono','$correo','$estatus','$fk_area','$fk_puesto')";
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

$area = $link -> prepare("SELECT id_area, nom_area FROM area");
$area -> execute();
$resultado = $area -> get_result();

$puesto = $link -> prepare("SELECT id_puesto, nom_puesto FROM puesto");
$puesto -> execute();
$resultadopuesto = $puesto -> get_result();


?>

<style>
    .form_reg{
        height: 600px;
        width: 30%;
        background-color: lightblue;
    }
</style>
<h1>Registro de empleados</h1>
<a href="welcome.php">Regresar</a>
<a href="vista_empleados.php">Ver empleados</a>
<center>
<p>Agregar empleados</p>
<form action="" class="form_reg" method="POST" >
 <p>Nombres</p>
    <input type="text" name="nombres" >
    <p>Apellido paterno</p>
    <input type="text" name="apaterno">
    <p>Apellido materno</p>
    <input type="text" name="amaterno" >
    <p>Telefono</p>
    <input type="text" name="telefono">
    <p>Correo</p>
    <input type="gmail" name="correo" >
    <p>Estatus</p>
    <input type="text" name="estatus">
    
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

<p>Puesto</p>
  <select name="fk_puesto" id="">
  
    <?php
while ($fila = $resultadopuesto ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_puesto"]?>">
<?php echo $fila["nom_puesto"]?>
</option>

<?php
} 
?>
</select>


    <input type="submit" class="btn btn-primary" value="Registrar">
</form>

</center>

