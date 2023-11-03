<?php 

require_once "config.php";

$cliente = $link -> prepare("SELECT id_cliente, nombres FROM cliente");
$cliente -> execute();
$resultado = $cliente -> get_result();


if (isset($_POST['nom_bebida'])) {
    if (strlen($_POST ['nom_bebida']) >= 1 &&  strlen($_POST ['nom_bebida']) >= 1 ){
    $nom_bebida = trim($_POST['nom_bebida']);
    $precio = trim($_POST['precio']);
    $fk_cliente = trim($_POST['fk_cliente']);
    $consulta = "INSERT INTO bar(nom_bebida, precio, fk_cliente) VALUES ('$nom_bebida','$precio','$fk_cliente')";
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
<h1>Registro bar</h1>
<a href="welcome.php">Regresar</a>
<center>

<form action="" class="form_reg" method="POST" >
 <p>Nombre de bebida</p>
    <input type="text" name="nom_bebida" >
    <p>Precio</p>
    <input type="text" name="precio">
   
    <p>Cliente</p>

    <select name="fk_cliente" id="">
       
    <?php
while ($fila = $resultado ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_cliente"]?>">
<?php echo $fila["nombres"]?>
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