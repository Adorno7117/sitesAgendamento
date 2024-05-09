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
        events: eventosAgendamento,
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Hoje',
            list: 'Lista'
        },
        defaultView: 'month',
        selectable: true,
        viewRender: function(view, element) {
            var start = $('#calendar').fullCalendar('getView').start;
            verificarAgendamento(start.format('YYYY-MM-DD'));
        },

        select: function(start, end) {
            dataSelecionada = start.format('YYYY-MM-DD');
            verificarAgendamento(dataSelecionada);
        }
    });

        function verificarAgendamento(data) {
            $.ajax({
                url: 'verificarAgendamento.php',
                method: 'POST',
                data: { dataSelecionada: data },
                success: function(response) {
                    if (response === 'agendado') {
                        $('.confimar').addClass('ocultar');
                        $('.nconfirma').addClass('mostrar');
                    } else {
                        $('.confimar').removeClass('ocultar');
                        $('.nconfirma').removeClass('mostrar');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao verificar agendamento:', error);
                }
            });
        }
    //Botão momento
    $('.btn-momento').click(function() {
        $('.btn-momento').removeClass('selected');
        $(this).addClass('selected');
        momentoSelecionado = $(this).text();

        $('.btn-momento').css('background-color', '');
        $(this).css('background-color', '#66FF99');

        $('#calendar').find('.fc-day').css('background-color', ''); 
        $('#calendar').find('.fc-day[data-date="' + dataSelecionada + '"]').css('background-color', '#66FF99');
    });

    //botão de confirmar
    $('#confirmar-btn').click(function() {
        $('.btn-momento').css('background-color', '');
        if (momentoSelecionado && dataSelecionada) {
            var agendamento = dataSelecionada + ' ' + momentoSelecionado;
    
            // Envia o agendamento para o backend
            $.ajax({
                url: 'confAgendamento.php',
                method: 'POST',
                data: { agendamento: agendamento, momento: momentoSelecionado }, // Inclui o momento do dia no POST
                success: function(response) {
                    console.log('Agendamento registrado com sucesso:', response);
                    alert('Agendamento registrado com sucesso!');
    
                    
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
        location.reload();
    });
});