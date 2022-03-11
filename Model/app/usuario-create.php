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
if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $usuario = trim($_POST["usuario"]);
    $contrasenia = trim($_POST["contrasenia"]);
    $email = trim($_POST["email"]);


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
        exit('Something weird happened'); //something a user can understand
    }
    if (isset($_POST['usuario'])){
        $vars = parse_columns('usuario', $_POST);
        $stmt = $pdo->prepare("INSERT INTO usuario (usuario,contrasenia,email) VALUES (?,?,?)");
    
        if ($stmt->execute([$usuario, $contrasenia, $email])) {
            $stmt = null;
            header("location: usuario-index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">>
                <?php
                session_start();
                    if (!isset($_SESSION["usuario"])) {
                        echo '<div class="col-10 col-md-6 col-lg-6 mx-auto card mb-5 p-4" style="background-color: rgb(250, 215, 227);">';
                        echo '<div class="text-center">
                                <img src="../../Assets/img/id-1_c-1.jpg" class="img-fluid" style="width: 400px;height: 300px;">
                            </div>';    
                    }else{
                        echo '<div class="col-md-6 mx-auto card m-3 p-2">';
                    }
                ?>
                    <div class="page-header">
                        <h2 class="text-center">Registro</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <?php
                        if (!isset($_SESSION["usuario"])) {
                            echo '<div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" maxlength="52" class="form-control" value="">
                                    <span class="form-text"></span>
                                </div>';
                        }
                        ?>
                        <div class="form-group">
                            <label>usuario</label>
                            <input type="text" name="usuario" maxlength="52" class="form-control" value="<?php echo $usuario; ?>">
                            <span class="form-text"><?php echo $usuario_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>contrasenia</label>
                            <input type="password" name="contrasenia" class="form-control" value="<?php echo $contrasenia; ?>">
                            <span class="form-text"><?php echo $contrasenia_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="email" maxlength="100" class="form-control" value="<?php echo $email; ?>">
                            <span class="form-text"><?php echo $email_err; ?></span>
                        </div>
                        <?php
                        if (!isset($_SESSION["usuario"])) {
                            echo '<div class="form-group">
                                            <label>Repita el E-mail</label>
                                            <input type="text" name="email" maxlength="100"class="form-control" value="">
                                            <span class="form-text"></span>
                                        </div>
                                   ';
                        }
                        ?>

                        <input type="submit" class="btn btn-primary" value="Crear">
                        <a href="usuario-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>