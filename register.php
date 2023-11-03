<?php

require_once "config.php";

$empleado = $link -> prepare("SELECT id_empleado, nombres FROM empleado");
$empleado -> execute();

$resultados = $empleado -> get_result();

$num_empleado = $pass = $confirm_pass = "";
$num_empleado_err = $pass_err = $confirm_pass_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
    if(empty(trim($_POST["num_empleado"]))){
        $num_empleado_err = "Por favor ingrese un usuario.";
    } else{
      
        $sql = "SELECT id_usuario FROM usuario WHERE num_empleado = ?";


        if($stmt = mysqli_prepare($link, $sql)){
       
            mysqli_stmt_bind_param($stmt, "s", $param_num_empleado);
            
        
            $param_num_empleado = trim($_POST["num_empleado"]);
            
            if(mysqli_stmt_execute($stmt)){
            
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $num_empleado_err = "Este usuario ya fue tomado.";
                } else{
                    $num_empleado = trim($_POST["num_empleado"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
  
        mysqli_stmt_close($stmt);
    }
    

    if(empty(trim($_POST["pass"]))){
        $pass_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["pass"])) < 6){
        $pass_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $pass = trim($_POST["pass"]);
    }
    

    if(empty(trim($_POST["confirm_pass"]))){
        $confirm_pass_err = "Confirma tu contraseña.";     
    } else{
        $confirm_pass = trim($_POST["confirm_pass"]);
        if(empty($pass_err) && ($pass != $confirm_pass)){
            $confirm_pass_err = "No coincide la contraseña.";
        }
    }

    if(empty($num_empleado_err) && empty($pass_err) && empty($confirm_pass_err)){

        $sql = "INSERT INTO usuario (fk_empleado, num_empleado, pass, estatus) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            $fk_empleado = $_POST["fk_empleado"];
            $param_num_empleado = $_POST["num_empleado"];
            $param_pass = $_POST["pass"];
            $param_estatus = $_POST["estatus"];
            $param_pass = password_hash($pass, PASSWORD_DEFAULT); 
            mysqli_stmt_bind_param($stmt, "ssss", $fk_empleado, $param_num_empleado, $param_pass, $param_estatus);
            
            
            $param_num_empleado = $num_empleado;
            
       
            if(mysqli_stmt_execute($stmt)){
             
                header("location: login.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
   
        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($num_empleado_err)) ? 'has-error' : ''; ?>">
                <label>Numero de empleado</label>
                <input type="text" name="num_empleado" class="form-control" value="<?php echo $num_empleado; ?>">
                <span class="help-block"><?php echo $num_empleado_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="pass" class="form-control" value="<?php echo $pass; ?>">
                <span class="help-block"><?php echo $pass_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_pass_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_pass" class="form-control" value="<?php echo $confirm_pass; ?>">
                <span class="help-block"><?php echo $confirm_pass_err; ?></span>
            </div>
            <div>
                <label>Estatus</label>
                <input type="" class="form-control" name="estatus">
            </div><br>
            
            <select name="fk_empleado" id="">
<?php
while ($fila = $resultados ->fetch_assoc()) {
  ?> 

<option value="<?php echo $fila["id_empleado"]?>">
<?php echo $fila["nombres"]?>
</option>

<?php
} 
?>

            </select>


            <div class="form-group"><br>
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>