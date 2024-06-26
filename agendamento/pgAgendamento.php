<?php
include('../config/config.php');
if (!isset($_SESSION['nome'])) {

    header("Location: ../login/pgLogin.php");
    exit;
}
function obterEventosAgendados() {
    global $conn;
    
    $sql = "SELECT * FROM agenda";
    $result = $conn->query($sql);
    $eventos = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Formatando o evento para o formato esperado pelo FullCalendar
            $evento = array(
                'title' => 'Agendado',
                'start' => $row['agendamento'] . 'T00:00:00',
                'end' => $row['agendamento'] . 'T23:59:59',
                'backgroundColor' => 'red'
            );
            array_push($eventos, $evento);
        }
    }
    
        // Retorna os eventos como JSON
    return json_encode($eventos);
}
    

$eventosAgendados = obterEventosAgendados();



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
                if ($_SESSION['idCliente'] == 999) {
                    echo '<a class="nav-link" href="../lista/pgLista.php" id="aboutLink">Lista</a>';
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
        <h1 class="half-big-text has-border">Agenda</h1>
        <div class="half-big-text">Selecione o Dia desejado</div>
    </div>
    <div id='calendar'></div>
    <br><br>
    <div class="confimar ocultar"> 
    <div class="rela-block about-us-quad-container">
        <div class="orbitron black-orb">\\\///</div>
        <div class="half-big-text">Selecione o Momento desejado</div>
        <button id="btn-manha" class="btn-momento btn-manha has-lines black">Manhã</button>
        <button id="btn-tarde" class="btn-momento btn-tarde has-lines black">Tarde</button>
        <button id="btn-todo" class="btn-momento btn-todo has-lines black">Dia Todo</button>
    </div>
    <div class="rela-block">
    <button id="confirmar-btn" class="has-lines black">Confirmar</button>
    </div>
    </div>
    <div class="nconfirma ocultar">
    <div class="rela-block">
        <div class="orbitron black-orb">\\\///</div>
        <div class="half-big-text">Dia Já agendado</div>
    </div>
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
    <script src="../home/home.js"></script>
    <script>
    var eventosAgendamento = <?php echo $eventosAgendados; ?>;
    </script>
</body>
</html>
<?php

$conn->close();
?>