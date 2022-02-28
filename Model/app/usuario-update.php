<?php
// Include config file
require_once "config.php";
require_once "helpers.php";

// Define variables and initialize with empty values
$usuario = "";
$contrasenia = "";
$email = "";

$usuario_err = "";
$contrasenia_err = "";
$email_err = "";


// Processing form data when form is submitted
if(isset($_POST["id_usuario"]) && !empty($_POST["id_usuario"])){
    // Get hidden input value
    $id_usuario = $_POST["id_usuario"];

    $usuario = trim($_POST["usuario"]);
		$contrasenia = trim($_POST["contrasenia"]);
		$email = trim($_POST["email"]);
		

    // Prepare an update statement
    $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    try {
        $pdo = new PDO($dsn, $db_user, $db_password, $options);
    } catch (Exception $e) {
        error_log($e->getMessage());
        exit('Something weird happened');
    }

    $vars = parse_columns('usuario', $_POST);
    $stmt = $pdo->prepare("UPDATE usuario SET usuario=?,contrasenia=?,email=? WHERE id_usuario=?");

    if(!$stmt->execute([ $usuario,$contrasenia,$email,$id_usuario  ])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        header("location: usuario-read.php?id_usuario=$id_usuario");
    }
} else {
    // Check existence of id parameter before processing further
	$_GET["id_usuario"] = trim($_GET["id_usuario"]);
    if(isset($_GET["id_usuario"]) && !empty($_GET["id_usuario"])){
        // Get URL parameter
        $id_usuario =  trim($_GET["id_usuario"]);

        // Prepare a select statement
        $sql = "SELECT * FROM usuario WHERE id_usuario = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Set parameters
            $param_id = $id_usuario;

            // Bind variables to the prepared statement as parameters
			if (is_int($param_id)) $__vartype = "i";
			elseif (is_string($param_id)) $__vartype = "s";
			elseif (is_numeric($param_id)) $__vartype = "d";
			else $__vartype = "b"; // blob
			mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value

                    $usuario = $row["usuario"];
					$contrasenia = $row["contrasenia"];
					$email = $row["email"];
					

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.<br>".$stmt->error;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                                <label>usuario</label>
                                <input type="text" name="usuario" maxlength="52"class="form-control" value="<?php echo $usuario; ?>">
                                <span class="form-text"><?php echo $usuario_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>contrasenia</label>
                                <input type="number" name="contrasenia" class="form-control" value="<?php echo $contrasenia; ?>">
                                <span class="form-text"><?php echo $contrasenia_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>email</label>
                                <input type="text" name="email" maxlength="100"class="form-control" value="<?php echo $email; ?>">
                                <span class="form-text"><?php echo $email_err; ?></span>
                            </div>

                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="usuario-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
