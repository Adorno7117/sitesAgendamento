<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($senha == $row['senha']) {
                $_SESSION['idCliente'] = $row['idCliente'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['idade'] = $row['idade'];
                $_SESSION['email'] = $email;
                echo "tudo certo";
                header("Location: ../home/pgHome.php");
                exit;
            } else {
              echo 'Senha incorreta!';
            }
        } else {
            echo "Usuário não encontrado!";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="../img/plantaIcon.png">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="page">
    <div class="container">
        <div class="left">
        <div class="login">Login</div>
        <br><br>
        <a href="../home/pgHome.php"><div class="eula2">Pagina principal</div></a>
        </div>
        <div class="right">
        <svg viewBox="0 0 320 300">

            <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
        </svg>
        <form action="pgLogin.php" class="form" method="post">
        <div class="line-container">
            <label for="email">Email</label>
            <input type="email" id="email" class="line-input" name="email">
            <div class="line"></div>
        </div>   
        <div class="line-container">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="line-input">
            <div class="line"></div>
        </div>   
            <input type="submit" id="submit" value="Logar">
            <a href="pgCadastro.php"><div class="eula">Não possui conta?</div></a>
        </div>
        </form>
    </div>
    </div>

    <!-- <div class="container">
        <div class="content first-content">
            <div class="first-column">
            </div>    
            <div class="second-column">
                <h2 class="title title-second">LOGIN</h2>
                <form action="pgLogin.php" class="form" method="post">
                    <label class="label-input" for="Email">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Email" name="email" id="email">
                    </label>
                    
                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha" id="senha">
                    </label>
                    
                    <input type="submit" class="btn btn-second" value="Logar">
                    
                </form>
            </div>

    </div> -->
    <script scr="login.js"></script>
</body>
</html>
<?php
$conn->close();
?>