<?php 

include("config.php");

if (isset($_POST['nom_categoria'])) {
    if (strlen($_POST ['nom_categoria']) >= 1 &&  strlen($_POST ['nom_categoria']) >= 1 ){
    $nom_categoria = trim($_POST['nom_categoria']);
    $num_camas = trim($_POST['num_camas']);
    $tipo_camas = trim($_POST['tipo_camas']);
    $estatus = trim($_POST['estatus']);
    $consulta = "INSERT INTO cat_habitacion(nom_categoria, num_camas, tipo_camas, estatus) VALUES ('$nom_categoria','$num_camas','$tipo_camas','$estatus')";
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

<h1>Registrar categorias de habitaciones</h1>

<a href="welcome.php">Regresar</a>
<center>
<p>Agregar categorias de habitaciones</p>
<form action="" class="form_reg" method="POST">
 <p>Nombre de categoria</p>
    <input type="text" name="nom_categoria" >
    <p>Numero de camas</p>
    <input type="text" name="num_camas">
    <p>Tipo de camas</p>
    <input type="text" name="tipo_camas" >
    <p>Estatus</p>
    <input type="text" name="estatus">
    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
</center>

<style>
    .form_reg{
        height: 500px;
        width: 30%;
        background-color: lightblue;
    }
</style>