<?php
include('../config/config.php');
if (!isset($_SESSION['nome'])) {

    header("Location: ../login/pgLogin.php");
    exit;
}

// Consulta ao banco de dados para obter os eventos de agendamento
$sql = "SELECT * FROM agenda WHERE idCliente = {$_SESSION['idCliente']}";
$result = $conn->query($sql);
$eventos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Formatando o evento para o formato esperado pelo FullCalendar
        $evento = array(
            'start' => $row['agendamento'] . 'T00:00:00', // Adicionando a hora inicial como 00:00:00
            'end' => $row['agendamento'] . 'T23:59:59', // Adicionando a hora final como 23:59:59
            'display' => 'background'
        );
        array_push($eventos, $evento);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamento</title>
<link rel="icon" type="image/png" href="../img/plantaIcon.png">
<link rel="stylesheet" href="agenda.css">
<link rel="stylesheet" href="../home/home.css">

<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
</head>
<body>
    <div class="nav-bar" style="height: 70px; background-color: rgba(0,0,0,0.5);">
        <div class="nav-logo">Décio Simoso</div>
        <div class="nav-links-container" id="antes">
            <a class="nav-link" href="../home/pgHome.php" id="topLink">Home</a>
            <a class="nav-link active" href="../agendamento/pgAgendamento.php" id="aboutLink">Agenda</a>
            <?php
            
            if (isset($_SESSION['nome'])) {
                echo '<span class="nav-link">Olá, ' . $_SESSION['nome'] . '</span>';
                echo '<a class="nav-link" href="../config/logout.php" id="logoutLink">Sair</a>';
                if ($_SESSION['idCliente'] == 999) {
                    echo '<a class="nav-link" href="pgLista.php" id="aboutLink">Lista</a>';
                }
            } else {
                echo '<a class="nav-link" href="../login/pgLogin.php" id="aboutLink">Login</a>';
                echo '<a class="nav-link" href="../login/pgCadastro.php" id="teamLink">Cadastro</a>';
            }
            ?>
        </div>
    </div>
    <div class="rela-block about-us-quad-container" style="margin-top:10%;">
        <h1 class="half-big-text has-border">Agenda</h1>
    </div>

    <div id='calendar'></div>
    <br><br>
    <div class="rela-block about-us-quad-container">
        <div class="orbitron black-orb">\\\///</div>
        <div class="half-big-text">Selecione o Momento desejado</div>
        <button class="btn-momento has-lines black">Manhã</button>
        <button class="btn-momento has-lines black">Tarde</button>
        <button class="btn-momento has-lines black">Dia Todo</button>
        
    </div>
    </div>
    <div class="rela-block top-link">
    <button id="confirmar-btn" class="has-lines black">Confirmar</button>
    </div>
    <br><br><br>
    <div class="rela-block footer-section" style="margin: 0px;">
    <h2 class="small-header top-link">Voltar ao Topo</h2><br>
    <p>Obrigado por escolher os nossos serviços de colheitadeiras. É uma honra fazer parte da sua jornada agrícola. <br>
    Estamos aqui para ajudar no que for preciso. Obrigado!</p>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/pt-br.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js'></script>
    <script src="agendamento.js"></script>
    <script src="home.js"></script>
    <script>
        var eventosAgendamento = <?php echo json_encode($eventos); ?>;
    </script>
</body>
</html>
<?php
$conn->close();
?>