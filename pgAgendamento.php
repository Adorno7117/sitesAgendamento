<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamento</title>
<link rel="stylesheet" href="agenda.css">

<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
</head>
<body>
    <a href="pgHome.html"><button>Home</button></a>
    <a href="pgAgendamento.php"><button>Agendar</button></a>
    <a href="pgLogin.php"><button>Login</button></a>
    <a href="pgCadastro.php"><button>Cadastro</button></a>
    <h2>Agendamento</h2>

    <div id='calendar'></div>

    <h3>Escolha um horário:</h3>
    <button class="btn-horario">13:00</button>
    <button class="btn-horario">13:45</button>
    <button class="btn-horario">14:30</button>
    <!-- Adicione mais botões conforme necessário -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/pt-br.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js'></script>
    <script src="agenda.js"></script>
</body>
</html>
