<?php 

include("config.php");

if (isset($_POST['nom_tipo_pago'])) {
    if (strlen($_POST ['nom_tipo_pago']) >= 1 &&  strlen($_POST ['nom_tipo_pago']) >= 1 ){
    $nom_tipo_pago = trim($_POST['nom_tipo_pago']);
    $estatus = trim($_POST['estatus']);
    $consulta = "INSERT INTO tipo_pago(nom_tipo_pago, estatus) VALUES ('$nom_tipo_pago','$estatus')";
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

<h1>Registrar Tipo de pago</h1>

<form action="" class="form_reg" method="POST" >
 <p>Tipo de pago</p>
    <input type="text" name="nom_tipo_pago" >

     <p>Estatus</p>
    <input type="text" name="estatus" >
    
    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
<a href="welcome.php">Regresar</a>

