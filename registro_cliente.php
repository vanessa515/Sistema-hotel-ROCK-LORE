<?php 

include("config.php");

if (isset($_POST['nombres'])) {
    if (strlen($_POST ['nombres']) >= 1 &&  strlen($_POST ['correo']) >= 1 ){
    $nombres = trim($_POST['nombres']);
    $apaterno = trim($_POST['apaterno']);
    $amaterno = trim($_POST['amaterno']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $fk_cat_cliente = trim($_POST['fk_cat_cliente']);
    $consulta = "INSERT INTO cliente(nombres, apaterno, amaterno, correo, telefono, fk_cat_cliente) VALUES ('$nombres','$apaterno','$amaterno','$correo','$telefono','$fk_cat_cliente')";
    $resultado = mysqli_query($link, $consulta);

    if ($resultado) {
      
        echo "<h3 class='ok'> Se guardado correctamente</h3>";
       
    } else {
       
          echo "<h3 class='ok'> Ups, ha ocurrido un error</h3>";
    }
} else {
    echo "<h3 class='ok'> Por favor complete los campos</h3>";
   
        
    
}

}

$cat_cliente = $link -> prepare("SELECT id_cat_cliente, nom_categoria FROM cat_cliente");
$cat_cliente -> execute();
$resultado = $cat_cliente -> get_result();  
?>
<h1>Registro de clientes</h1>
<a href="welcome.php">Regresar</a>
<center>
<p>Agregar clientes</p>
<form action="" class="form_reg" method="POST" >
 <p>Nombres</p>
    <input type="text" name="nombres" >
    <p>Apellido paterno</p>
    <input type="text" name="apaterno">
    <p>Apellido materno</p>
    <input type="text" name="amaterno" >
    <p>Correo</p>
    <input type="text" name="correo">
    <p>Telefono</p>
    <input type="gmail" name="telefono" >
    <p>Tipo de cliente</p>

    <select name="fk_cat_cliente" id="">
       
    <?php
while ($fila = $resultado ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_cat_cliente"]?>">
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