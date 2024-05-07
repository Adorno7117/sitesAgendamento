<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamento</title>
<link rel="stylesheet" href="agenda.css">

<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
</head>
<body>
    <a href="pgHome.php"><button>Home</button></a>
    <a href="pgAgendamento.php"><button>Agendar</button></a>
    <a href="pgLogin.php"><button>Login</button></a>
    <a href="pgCadastro.php"><button>Cadastro</button></a>
    <h2>Agendamento</h2>

    <div id='calendar'></div>

    <h3>Escolha um horário:</h3>
    <div id="horario-buttons">
    
    </div>
        <button id="confirmar-btn"  style="display: none;">Confirmar</button>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/pt-br.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js'></script>
    <script src="agendamento.js"></script>
</body>
</html>
