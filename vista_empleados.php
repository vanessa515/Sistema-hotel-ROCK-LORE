<?php 
include("config.php");


$cliente = $link -> prepare("SELECT * FROM empleado");
$cliente -> execute();
$resultado = $cliente -> get_result();


?>
       
  
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Document</title>
</head>
<body>
<a href="welcome.php">Regresar</a>
<h1>EMPLEADOS</h1>
  <table>
    <thead>
      <tr>
    <th>Nombre</th>
    <th>Apellido paterno</th>
    <th>Apellido materno</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Estatus</th>
    </tr>
    </thead>
    <tbody>
     
  <?php
   while ($fila = $resultado ->fetch_assoc()) {
     ?> 
    <tr>
   <td value="<?php echo $fila["id_empleado"]?>">
   <?php echo $fila["nombres"]?> </td>
   
   <td value="<?php echo $fila["id_empleado"]?>">
   <?php echo $fila["apaterno"]?> </td>

   <td value="<?php echo $fila["id_empleado"]?>">
   <?php echo $fila["amaterno"]?> </td>

   <td value="<?php echo $fila["id_empleado"]?>">
   <?php echo $fila["correo"]?> </td>

   <td value="<?php echo $fila["id_empleado"]?>">
   <?php echo $fila["telefono"]?> </td>

   <td value="<?php echo $fila["id_empleado"]?>">
   <?php echo $fila["estatus"]?> </td>
 
   </tr>
   <?php
   } 
   ?>

 </tbody>
</body>
</html>




