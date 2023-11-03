<?php 

require_once "config.php";

$cat_habitacion = $link -> prepare("SELECT id_cat_habitacion, nom_categoria FROM cat_habitacion");
$cat_habitacion -> execute();
$resultado = $cat_habitacion -> get_result();


if (isset($_POST['num_habitacion'])) {
    if (strlen($_POST ['num_habitacion']) >= 1 &&  strlen($_POST ['num_habitacion']) >= 1 ){
    $num_habitacion = trim($_POST['num_habitacion']);
    $piso_h = trim($_POST['piso_h']);
    $estatus = trim($_POST['estatus']);
    $fk_cat_habitacion = trim($_POST['fk_cat_habitacion']);
    $consulta = "INSERT INTO habitacion(num_habitacion, piso_h, estatus, fk_cat_habitacion) VALUES ('$num_habitacion','$piso_h','$estatus', '$fk_cat_habitacion')";
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
<h1>Registro de habitaciones</h1>
<a href="welcome.php">Regresar</a>
<center>
<p>Agregar habitaciones</p>
<form action="" class="form_reg" method="POST" >
 <p>Numero de habitacion</p>
    <input type="text" name="num_habitacion" >
    <p>Piso de habitacion</p>
    <input type="text" name="piso_h">
    <p>Estatus</p>
    <input type="text" name="estatus" >
   
    <p>Tipo de habitacion</p>

    <select name="fk_cat_habitacion" id="">
       
    <?php
while ($fila = $resultado ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_cat_habitacion"]?>">
<?php echo $fila["nom_categoria"]?>
</option>

<?php
} 
?>

</select><br><br>


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