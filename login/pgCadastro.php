<?php
include('../config/config.php');

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

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="icon" type="image/png" href="../img/plantaIcon.png">
    <link rel="stylesheet" href="login.css">  
</head>
<body>
    <div class="page">
    <div class="container">
        <div class="left">
        <div class="login">Cadastro</div>
        <br><br>
        <a href="../home/pgHome.php"><div class="eula2">Pagina principal</div></a>
        </div>
        <div class="right2">
        <svg viewBox="0 0 320 300">

            <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
        </svg>
        <form action="pgCadastro.php" class="form" method="post">
        <div class="line-container">
            <label for="nome">Nome</label>
            <input type="name" id="nome" class="line-input" name="nome">
            <div class="line"></div>
        </div>
        <div class="line-container">
            <label for="idade">Idade</label>
            <input type="number" id="idade" class="line-input" name="idade">
            <div class="line"></div>
        </div>
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
        <div class="line-container">
            <label for="confirmar_senha">Confirmar Senha</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha" class="line-input">
            <div class="line"></div>
        </div> 
            <input type="submit" id="submit" value="Cadastrar">
            <a href="pgLogin.php"><div class="eula">Já possui conta?</div></a>
        </div>
        </form>
    </div>
    </div>


    <!-- <div class="container">
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

    </div> -->
</body>
</html>
<?php
$conn->close();
?>