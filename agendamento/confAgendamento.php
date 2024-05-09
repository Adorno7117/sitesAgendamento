<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agendamento'])) {
    $agendamento = $_POST['agendamento'];
    $momento = $_POST['momento']; // Recebe o momento do dia do POST

    // Insira o código aqui para inserir o agendamento na tabela do banco de dados
    // Por exemplo:
    $id = $_SESSION['idCliente'];
    $sql = "INSERT INTO agenda (agendamento, momento, idCliente) VALUES ('$agendamento', '$momento', $id )";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Agendamento registrado com sucesso!');</script>";
    } else {
        echo 'Erro ao registrar o agendamento: ' . $conn->error;
    }
    header("Refresh:0");
}

$conn->close();
?>
