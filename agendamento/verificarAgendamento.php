<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dataSelecionada'])) {
    $dataSelecionada = $_POST['dataSelecionada'];

    // Consulta ao banco de dados para verificar se a data está agendada
    $sql = "SELECT * FROM agenda WHERE DATE(agendamento) = '$dataSelecionada'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se houver resultados, significa que a data está agendada
        echo 'agendado';
    } else {
        // Se não houver resultados, significa que a data não está agendada
        echo 'nao_agendado';
    }
} else {
    // Se a requisição não for POST ou se a data não for recebida, retornar um erro
    echo 'erro';
}

$conn->close();
?>
