<?php 

include("config.php");

if (isset($_POST['nom_categoria'])) {
    if (strlen($_POST ['nom_categoria']) >= 1 &&  strlen($_POST ['nom_categoria']) >= 1 ){
    $nom_categoria = trim($_POST['nom_categoria']);
    $estatus = trim($_POST['estatus']);
    $consulta = "INSERT INTO cat_cliente(nom_categoria, estatus) VALUES ('$nom_categoria', '$estatus')";
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

<h1>Registrar categorias de clientes</h1>

<form action="" class="form_reg" method="POST" >
 <p>Nombre categoria cliente</p>
    <input type="text" name="nom_categoria" >
    <p>Estatus</p>
    <input type="text" name="estatus" >
    <input type="submit" class="btn btn-primary" value="Registrar">
</form>
<a href="welcome.php">Regresar</a>

