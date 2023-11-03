<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

$new_pass = $confirm_pass = "";
$new_pass_err = $confirm_pass_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
    if(empty(trim($_POST["new_pass"]))){
        $new_pass_err = "Ingrese la nueva contraseña.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_pass_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $new_pass = trim($_POST["new_pass"]);
    }
  
    if(empty(trim($_POST["confirm_pass"]))){
        $confirm_pass_err = "Por favor confirme la contraseña.";
    } else{
        $confirm_pass = trim($_POST["confirm_password"]);
        if(empty($new_pass_err) && ($new_pass != $confirm_pass)){
            $confirm_pass_err = "Las contraseñas no coinciden.";
        }
    }
        
   
    if(empty($new_pass_err) && empty($confirm_pass_err)){
   
        $sql = "UPDATE usuario SET pass = ? WHERE id_usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "si", $param_pass, $param_id);
            
          
            $param_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id_usuario"];
           
            if(mysqli_stmt_execute($stmt)){
          
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Algo salió mal, por favor vuelva a intentarlo.";
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
    <title>Cambia tu contraseña acá</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Cambia tu contraseña acá</h2>
        <p>Complete este formulario para restablecer su contraseña.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_pass_err)) ? 'has-error' : ''; ?>">
                <label>Nueva contraseña</label>
                <input type="password" name="new_pass" class="form-control" value="<?php echo $new_pass; ?>">
                <span class="help-block"><?php echo $new_pass_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_pass_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar contraseña</label>
                <input type="password" name="confirm_pass" class="form-control">
                <span class="help-block"><?php echo $confirm_pass_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <a class="btn btn-link" href="welcome.php">Cancelar</a>
            </div>
        </form>
    </div>    
</body>
</html>