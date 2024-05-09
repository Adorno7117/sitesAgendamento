<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dataSelecionada'])) {
    $dataSelecionada = $_POST['dataSelecionada'];

    // Consulta ao banco de dados para verificar se a data está agendada como manhã, tarde ou dia todo
    $sql = "SELECT * FROM agenda WHERE DATE(agendamento) = '$dataSelecionada'";
    $result = $conn->query($sql);

    $agendamentoManha = false;
    $agendamentoTarde = false;
    $agendamentoDiaTodo = false;

    if ($result->num_rows > 0) {
        // Se houver resultados, verifica se há agendamento para manhã, tarde ou dia todo
        while($row = $result->fetch_assoc()) {
            if ($row['momento'] === 'Manhã') {
                $agendamentoManha = true;
            } elseif ($row['momento'] === 'Tarde') {
                $agendamentoTarde = true;
            } elseif ($row['momento'] === 'Dia Todo') {
                $agendamentoDiaTodo = true;
            }
        }
    }

    if ($agendamentoDiaTodo || ($agendamentoManha && $agendamentoTarde)) {
        // Se estiver agendado como dia todo ou ambas as opções de manhã e tarde estão agendadas, retorna 'diatodo'
        echo 'diatodo';
    } elseif ($agendamentoManha) {
        // Se estiver agendado apenas como manhã, retorna 'manha'
        echo 'manha';
    } elseif ($agendamentoTarde) {
        // Se estiver agendado apenas como tarde, retorna 'tarde'
        echo 'tarde';
    } else {
        // Se não estiver agendado, retorna 'nao_agendado'
        echo 'nao_agendado';
    }
} else {
    // Se a requisição não for POST ou se a data não for recebida, retorna 'erro'
    echo 'erro';
}

$conn->close();
?>
