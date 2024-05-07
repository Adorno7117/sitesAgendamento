<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agendamento'])) {
    $agendamento = $_POST['agendamento'];

    // Insira o código aqui para inserir o agendamento na tabela do banco de dados

    // Por exemplo:
    $sql = "INSERT INTO agenda (agendamento) VALUES ('$agendamento')";
    if ($conn->query($sql) === TRUE) {
        echo 'Agendamento registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o agendamento: ' . $conn->error;
    }
    $conn->close();
}
?>