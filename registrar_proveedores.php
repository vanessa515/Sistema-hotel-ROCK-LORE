<?php 

include("config.php");

if (isset($_POST['nom_proveedor'])) {
    if (strlen($_POST ['nom_proveedor']) >= 1 &&  strlen($_POST ['nom_proveedor']) >= 1 ){
    $nom_proveedor = trim($_POST['nom_proveedor']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']);
    $estatus = trim($_POST['estatus']);
    $consulta = "INSERT INTO proveedores(nom_proveedor, telefono, correo, estatus) VALUES ('$nom_proveedor','$telefono','$correo','$estatus')";
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

<h1>Registrar proveedores</h1>

<form action="" class="form_reg" method="POST" >
 <p>Nombre del proveedor</p>
    <input type="text" name="nom_proveedor" >
    <p>Telefono del proveedor</p>
    <input type="text" name="telefono" >
    <p>Corre del proveedor</p>
    <input type="text" name="correo" >
    <p>Estatus</p>
    <input type="text" name="estatus" >
    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
<a href="welcome.php">Regresar</a>

