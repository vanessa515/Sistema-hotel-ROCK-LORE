<?php 

include("config.php");

if (isset($_POST['nom_area'])) {
    if (strlen($_POST ['nom_area']) >= 1 &&  strlen($_POST ['nom_area']) >= 1 ){
    $nom_area = trim($_POST['nom_area']);
    $consulta = "INSERT INTO area(nom_area) VALUES ('$nom_area')";
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

<h1>Registrar area</h1>

<form action="" class="form_reg" method="POST" >
 <p>Nombre Area</p>
    <input type="text" name="nom_area" >
    
    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
<a href="welcome.php">Regresar</a>

