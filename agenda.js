$(document).ready(function() {
    $('#calendar').fullCalendar({
        // Configurações do calendário aqui
        lang: 'pt-br', // Define o idioma como português (Brasil)
    });
    
    // Adicione listeners para os botões de horário
    $('.btn-horario').click(function() {
        var horario = $(this).text();
        // Aqui você pode enviar o horário selecionado para o backend para registro
        console.log("Horário selecionado:", horario);
    });
});
