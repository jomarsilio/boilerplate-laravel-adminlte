/**
 * Evento para submeter um formulário, sempre que um input[type=checkbox][data-ajax-form-submit] for alterado.
 * 
 * @namespace DOM[data-ajax-form-submit]
 * @property {void} data-ajax-form-submit Indica que o formulário será submetido via ajax.
 * @example 
 *  <form action="..." method="...">
 *      <input type="hidden" name="..." value="...">
 *      <input type="checkbox" name="..." value="..." data-ajax-form-submit data-target="#id">
 *  </form>
 * @property {String} data-target Indica o alvo do retorno da requisição.
 */
$('body').on('change', 'input[type=checkbox][data-ajax-form-submit]', function(ev) {

    // Input alterado.
    var $input = $(ev.currentTarget);

    // Descobre o formulário pai.
    var $form = $input.closest('form');

    // Serializa os dados do formulário.
    var data = $form.serializeArray();

    // O input não está checado?
    if ($input.prop('checked') == false) {
        // Adiciona o valor ao array de dados serializados.
        data.push({
            'name': $input.attr('name'),
            'value': '',
        });
    }

    // Alvo do ajax
    var target = $input.data('target');

    // Chama o tratamento padrão para antes ajax.
    App.ajax.event.before($input);

    // Requisição ajax.
    $.ajax({

        // Url da requisição.
        url: $form.attr('action'),

        // Variáveis a serem enviadas por post.
        data: data,

        // Método da requisição.
        method: $form.attr('method'),

        // Tipo da requisição.
        dataType: 'json',

        // Ajax assincrono.
        async: true,

        // Antes de enviar a requisição...
        beforeSend: function() {

            // Desativa o input.
            $input.prop('disabled', true);
        },

        // Depois de enviar a requisição...
        complete: function() {

            // Chama o tratamento padrão para o fim do ajax.
            App.ajax.event.complete($input);

            // Ativa o input.
            $input.prop('disabled', false);
        },

        // Se acontecer um erro...
        error: function(jqXHR) {

            // Chama o tratamento padrão para o erro do ajax.
            App.ajax.event.error($input, jqXHR);

            // Atualiza o estado do input.
            $input.prop('checked', !$input.prop('checked'));
        },

        // Se obteve successo...
        success: function(data) {

            // Possui alvo definido?
            if (target !== undefined) {

                // Possui conteúdo para sobrescrever?
                if (data.content !== null) {

                    // Sobrescreve os dados de um elemento com o retorno do ajax
                    $(target).html(data.content);
                }
            }
        },
    });
});