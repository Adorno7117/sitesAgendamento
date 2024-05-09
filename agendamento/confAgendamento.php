<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agendamento'])) {
    $agendamento = $_POST['agendamento'];
    $momento = $_POST['momento']; // Recebe o momento do dia do POST

    // Insira o código aqui para inserir o agendamento na tabela do banco de dados
    // Por exemplo:
    $sql = "INSERT INTO agenda (agendamento, momento) VALUES ('$agendamento', '$momento')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Agendamento registrado com sucesso!');</script>";
    } else {
        echo 'Erro ao registrar o agendamento: ' . $conn->error;
    }
}

$conn->close();
?>
