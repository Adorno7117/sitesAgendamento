$(document).ready(function() {
    var dataSelecionada; // Variável para armazenar a data selecionada

    $('#calendar').fullCalendar({
        lang: 'pt-br',
        header: {
            left: 'month',
            center: 'title',
            right: 'today prev,next'
        },
        defaultView: 'month',
        selectable: true,
        select: function(start, end) {
            // Atualiza a cor do dia selecionado
            $('#calendar').find('.fc-day').css('background-color', ''); // Remove a cor de todos os dias
            $(this).css('background-color', 'light-green'); // Define a cor verde para o dia selecionado

            // Armazena a data selecionada
            dataSelecionada = start.format('YYYY-MM-DD');

            // Exibe os botões de horário
            $('#confirmar-btn').show();
            $('#horario-buttons').empty();

            // Cria os botões de horário
            var horarios = ['13:00', '13:45', '14:30']; // Adicione mais horários conforme necessário
            for (var i = 0; i < horarios.length; i++) {
                var btn = $('<button class="btn-horario">' + horarios[i] + '</button>');
                $('#horario-buttons').append(btn);
            }
        }
    });

    // Evento de clique no botão de confirmar
    $('#confirmar-btn').click(function() {
        var horarioSelecionado = $('.btn-horario.selected').text();
        $('#calendar').find('.fc-day').css('background-color', '');
        if (horarioSelecionado) {
            var agendamento = dataSelecionada + ' ' + horarioSelecionado;

            // Envia o agendamento para o backend
            $.ajax({
                url: 'confAgendamento.php',
                method: 'POST',
                data: { agendamento: agendamento },
                success: function(response) {
                    console.log('Agendamento registrado com sucesso:', response);
                    alert('Agendamento registrado com sucesso!');
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao registrar o agendamento:', error);
                    alert('Erro ao registrar o agendamento. Por favor, tente novamente.');
                }
            });
        } else {
            alert('Por favor, selecione um horário antes de confirmar.');
        }
    });

    // Evento de clique nos botões de horário
    $(document).on('click', '.btn-horario', function() {
        // Marca o botão de horário como selecionado
        $('.btn-horario').removeClass('selected');
        $(this).addClass('selected');

        // Atualiza a cor do dia selecionado
        $('#calendar').find('.fc-day').css('background-color', ''); 
        $('#calendar').find('.fc-day[data-date="' + dataSelecionada + '"]').css('background-color', '#66FF99'); // Define a cor verde para o dia selecionado
    });
});
