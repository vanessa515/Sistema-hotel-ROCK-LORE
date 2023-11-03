<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}

require_once "config.php";
 
$num_empleado = $pass = "";
$num_empleado_err = $pass_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["num_empleado"]))){ 
        $num_empleado_err = "Por favor ingrese su usuario.";
    } else{
        $num_empleado = trim($_POST["num_empleado"]);
    }

    if(empty(trim($_POST["pass"]))){
        $pass_err = "Por favor ingrese su contraseña.";
    } else{
        $pass = trim($_POST["pass"]);
    }
    
 
    if(empty($num_empleado_err) && empty($pass_err)){
      
        $sql = "SELECT id_usuario, num_empleado, pass FROM usuario WHERE num_empleado = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
         
            mysqli_stmt_bind_param($stmt, "s", $param_num_empleado);
         
            $param_num_empleado = $num_empleado;
        
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
     
                if(mysqli_stmt_num_rows($stmt) == 1){                    
               
                    mysqli_stmt_bind_result($stmt, $id_usuario, $num_empleado, $hashed_pass);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_pass)){
                       
                            session_start();
                       
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_usuario"] = $id_usuario;
                            $_SESSION["num_empleado"] = $num_empleado;                            
                            
                           
                            header("location: welcome.php");
                        } else{
                            $pass_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
            
                    $num_empleado_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Por favor, complete sus credenciales para iniciar sesión.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($num_empleado_err)) ? 'has-error' : ''; ?>">
                <label>Numero de empleado</label>
                <input type="text" name="num_empleado" class="form-control" value="<?php echo $num_empleado; ?>">
                <span class="help-block"><?php echo $num_empleado_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="pass" class="form-control">
                <span class="help-block"><?php echo $pass_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
        </form>
    </div>    
</body>
</html>