$(document).ready(function() {
    var dataSelecionada; // Variável para armazenar a data selecionada
    var momentoSelecionado = "Tarde"; // Valor padrão para o momento é 'Tarde'

    $('#calendar').fullCalendar({
        locale: 'pt-br',
        timeFormat: 'HH:mm',
        editable: true,
        eventLimit: false,
        displayEventTime: this.displayEventTime,
        slotLabelFormat: 'HH:mm',
        allDayText: '24 horas',
        columnFormat: 'dddd',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,listMonth'
        },
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Hoje',
            list: 'Lista'
        },
        defaultView: 'month',
        selectable: true,
        select: function(start, end) {
            // Verifica se o dia selecionado possui um evento marcado
            dataSelecionada = start.format('YYYY-MM-DD');
            var eventoExistente = eventosAgendamento.find(function(evento) {
                return evento.start.substring(0, 10) === diaSelecionado;
            });

            if (eventoExistente) {
                alert('Este dia já possui um evento marcado e não pode ser selecionado novamente.');
                $('#calendar').fullCalendar('unselect');
            }
        }
    });
    // Evento de clique no botão de momento
    $('.btn-momento').click(function() {
        // Marca o botão de momento como selecionado
        $('.btn-momento').removeClass('selected');
        $(this).addClass('selected');
        momentoSelecionado = $(this).text(); // Atualiza o momento selecionado

        // Remove a cor de fundo de todos os botões de momento
        $('.btn-momento').css('background-color', '');

        // Define a cor de fundo do botão selecionado como verde claro
        $(this).css('background-color', '#66FF99');

    
    });

    // Evento de clique no botão de confirmar
    $('#confirmar-btn').click(function() {
        $('.btn-momento').css('background-color', '');
        // Verifica se um momento foi selecionado
        if (momentoSelecionado && dataSelecionada) { // Verifica se tanto o momento quanto a data foram selecionados
            var agendamento = dataSelecionada + ' ' + momentoSelecionado;
    
            // Envia o agendamento para o backend
            $.ajax({
                url: 'confAgendamento.php',
                method: 'POST',
                data: { agendamento: agendamento, momento: momentoSelecionado }, // Inclui o momento do dia no POST
                success: function(response) {
                    console.log('Agendamento registrado com sucesso:', response);
                    alert('Agendamento registrado com sucesso!');
    
                    // Adiciona o evento ao calendário com fundo vermelho
                    $('#calendar').fullCalendar('renderEvent', {
                        title: 'Agendado',
                        start: dataSelecionada,
                        backgroundColor: 'red'
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao registrar o agendamento:', error);
                    alert('Erro ao registrar o agendamento. Por favor, tente novamente.');
                }
            });
        } else {
            alert('Por favor, selecione tanto um momento quanto uma data antes de confirmar.');
        }
    });


});