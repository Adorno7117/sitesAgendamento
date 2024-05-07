<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nome"]) && isset($_POST["idade"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["confirmar_senha"])) {
            $nome = $_POST["nome"];
            $idade = $_POST["idade"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $confirmarSenha = $_POST["confirmar_senha"];

        $sql_check = "SELECT * FROM usuarios WHERE email = '$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            echo "<script>alert('Este email já está cadastrado.');</script>";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('O email fornecido não é válido.');</script>";
            } else {
                if (strlen($senha) < 7 || !preg_match('/[0-9]/', $senha)) {
                    echo "<script>alert('A senha deve ter pelo menos 7 caracteres e conter pelo menos um número.');</script>";
                } else {
                    if ($senha != $confirmarSenha) {
                        echo "<script>alert('A senha e o confirmar senha devem ser iguais.');</script>";
                    } else {
                        // Insere os dados no banco de dados
                        $sql_insert = "INSERT INTO usuarios (nome, idade, email, senha) VALUES ('$nome', '$idade', '$email', '$senha')";

                        if ($conn->query($sql_insert) === TRUE) {
                            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
                            header("Location: pgLogin.php");
                        } else {
                            echo "<script>alert('Erro ao cadastrar: " . $conn->error . "');</script>";
                        }
                    }
                }
            }
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
    <title>Cadastro</title>
</head>
<body>
    <a href="pgHome.php"><button>Home</button></a>
    <a href="pgAgendamento.php"><button>Agendar</button></a>
    <a href="pgLogin.php"><button>Login</button></a>
    <a href="pgCadastro.php"><button>Cadastro</button></a>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Cadastro</h2>
                <form action="pgCadastro.php" class="form" method="post">
                    <label class="label-input" for="nome">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Nome" name="nome" id="nome">
                    </label><br>
                                    
                    <label class="label-input" for="idade">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="number" placeholder="Idade" name="idade" id="idade">
                    </label><br>

                    <label class="label-input" for="email">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="email" placeholder="Email" name="email" id="email">
                    </label><br>

                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha" id="senha">
                    </label><br>

                    <label class="label-input" for="confirmar_senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Confirmar Senha" name="confirmar_senha" id="confirmar_senha">
                    </label><br>
                                    
                    <input type="submit" class="btn btn-second" value="Cadastrar">
                </form>
            </div>

    </div>
</body>
</html>
