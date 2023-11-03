<?php 

require_once "config.php";

$proveedores = $link -> prepare("SELECT id_proveedores, nom_proveedor FROM proveedores");
$proveedores -> execute();
$resultado = $proveedores -> get_result();


if (isset($_POST['nom_prod'])) {
    if (strlen($_POST ['nom_prod']) >= 1 &&  strlen($_POST ['nom_prod']) >= 1 ){
    $nom_prod = trim($_POST['nom_prod']);
    $estatus = trim($_POST['estatus']);
    $fk_proveedores= trim($_POST['fk_proveedores']);
    $consulta = "INSERT INTO producto(nom_prod, estatus, fk_proveedores) VALUES ('$nom_prod','$estatus','$fk_proveedores')";
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
<p>Agregar productos</p>
<form action="" class="form_reg" method="POST" >
 <p>Nombre del producto</p>
    <input type="text" name="nom_prod" >
    <p>Estatus</p>
    <input type="text" name="estatus">
   
    <p>Nombre proveedor</p>

    <select name="fk_proveedores" id="">
       
    <?php
while ($fila = $resultado ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_proveedores"]?>">
<?php echo $fila["nom_proveedor"]?>
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