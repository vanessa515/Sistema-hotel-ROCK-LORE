<?php 

include("config.php");

if (isset($_POST['porcentaje'])) {
    if (strlen($_POST ['porcentaje']) >= 1 &&  strlen($_POST ['porcentaje']) >= 1 ){
    $porcentaje = trim($_POST['porcentaje']);
    $estatus = trim($_POST['estatus']);
    $consulta = "INSERT INTO descuento(porcentaje, estatus) VALUES ('$porcentaje','$estatus')";
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

<h1>Registrar descuento</h1>

<form action="" class="form_reg" method="POST" >
 <p>Porcentaje de descuento</p>
    <input type="text" name="porcentaje" >
    <p>Estatus</p>
    <input type="text" name="estatus" >
    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
<a href="welcome.php">Regresar</a>

