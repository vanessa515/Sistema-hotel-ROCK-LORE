<?php 

include("config.php");

if (isset($_POST['nom_puesto'])) {
    if (strlen($_POST ['nom_puesto']) >= 1 &&  strlen($_POST ['nom_puesto']) >= 1 ){
    $nom_area = trim($_POST['nom_puesto']);
    $estatus = trim($_POST['estatus']);
    $consulta = "INSERT INTO puesto(nom_puesto, estatus) VALUES ('$nom_area', '$estatus')";
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

<h1>Registrar puestos</h1>

<form action="" class="form_reg" method="POST" >
 <p>Nombre Puesto</p>
    <input type="text" name="nom_puesto" >
    <p>Estatus</p>
    <input type="text" name="estatus" >
    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
<a href="welcome.php">Regresar</a>

