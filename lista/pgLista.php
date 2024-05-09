<?php
include('../config/config.php');
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" type="image/png" href="../img/plantaIcon.png">
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="lista.css">
</head>
<body>
    <div class="nav-bar" style="height: 70px; background-color: rgba(0,0,0,0.5);">
        <div class="nav-logo">Décio Simoso</div>
        <div class="nav-links-container" id="antes">
            <a class="nav-link" href="../home/pgHome.php" id="topLink">Home</a>
            <a class="nav-link" href="../agendamento/pgAgendamento.php" id="aboutLink">Agenda</a>
            <?php

            if (isset($_SESSION['nome'])) {
                if ($_SESSION['idCliente'] == 999) {
                    echo '<a class="nav-link active" href="../lista/pgLista.php" id="aboutLink">Lista</a>';
                }
                echo '<span class="nav-link">Olá, ' . $_SESSION['nome'] . '</span>';
                echo '<a class="nav-link" href="../config/logout.php" id="logoutLink">Sair</a>';
            } else {
                echo '<a class="nav-link" href="../login/pgLogin.php" id="aboutLink">Login</a>';
                echo '<a class="nav-link" href="../login/pgCadastro.php" id="teamLink">Cadastro</a>';
            }
            ?>
        </div>
    </div>
    <div class="rela-block about-us-quad-container" style="margin-top:10%;">
        <h1 class="half-big-text has-border">Lista</h1>
        <?php 
        $sql = "SELECT MONTH(a.agendamento) AS mes, 
        DAY(a.agendamento) AS dia,
        a.momento,
        u.nome,
        u.idade
        FROM agenda a
        INNER JOIN usuarios u ON a.idCliente = u.idCliente
        ORDER BY a.agendamento";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        $mes_atual = 0; // Variável para rastrear o mês atual
        while ($row = $result->fetch_assoc()) {
        $mes = $row['mes'];
        if ($mes != $mes_atual) {
        // Se o mês mudou, exibe o cabeçalho do novo mês
        if ($mes_atual != 0) {
         echo '</table><br>';
        }
        echo '<h3 class="half-big-text">Mês: ' . $mes . '</h3>';
        echo '<table border="1">';
        echo '<tr><th>Nome</th><th>Idade</th><th>Dia</th><th>Momento</th></tr>';
        $mes_atual = $mes;
        }
        echo "<tr><td>{$row['nome']}</td><td>{$row['idade']}</td><td>{$row['dia']}</td><td>{$row['momento']}</td></tr>";
        }
        echo '</table>';
        } else {
        echo "Nenhum agendamento encontrado.";
        }
        ?>
    </div>

</body>
</html>
<?php
$conn->close();
?>