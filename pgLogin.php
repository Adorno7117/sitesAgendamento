<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Verifica se o email e a senha correspondem a uma entrada na tabela de usuários
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['senha'])) {
              $_SESSION['idCliente'] = $row['idCliente'];
              $_SESSION['nome'] = $row['nome'];
              $_SESSION['email'] = $email;
              header("Location: pgLogin.php");
              exit;
            } else {
              echo 'Senha incorreta!';
            }
          } else {
            echo "Usuário não encontrado!";
          }
        }
    }

$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <a href="pgHome.html"><button>Home</button></a>
    <a href="pgAgendamento.php"><button>Agendar</button></a>
    <a href="pgLogin.php"><button>Login</button></a>
    <a href="pgCadastro.php"><button>Cadastro</button></a>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
            </div>    
            <div class="second-column">
                <h2 class="title title-second">LOGIN</h2>
                <form action="login.php" class="form" method="post">
                    <label class="label-input" for="Email">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Email" name="email" id="email">
                    </label>
                    
                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha" id="senha">
                    </label>
                    
                    <input type="submit" class="btn btn-second" value="Login">
                    
                </form>
            </div>

    </div>
</body>
</html>
