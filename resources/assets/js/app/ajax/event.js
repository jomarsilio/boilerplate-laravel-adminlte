/**
 * Funções padrões para o tratamento do ajax.
 * 
 * @namespace App.event
 */
App.ajax.event = {

    /**
     * Evento para quando um ajax é executado com sucesso.
     * 
     * @param  {jQuery} $element Elemento que executou o ajax.
     * @param  {object} data Retorno do ajax.
     * @return {jQuery} 
     * @example App.ajax.event.success($element, data);
     */
    success: function($element, data) {

        var success = App.ajax.utils.jsonProperty(data, 'success');

        if (success) {

            // Exibe a mensagem de sucesso num toast.
            // App.materialize.toast(success);
        }
    },

    /**
     * Evento para quando um ajax é executado e um erro é retornado.
     * 
     * @param  {jQuery} $element Elemento que executou o ajax.
     * @param  {object} jqXHR Retorno do ajax.
     * @param  {jQuery} $target Elemento destino que irá receber o conteúdo do ajax.
     * @return {jQuery} 
     * @example App.ajax.event.success($element, jqXHR);
     */
    error: function($element, jqXHR, $target) {

        // Procura pelo erro na variável errors.
        var error = App.ajax.utils.jsonProperty(jqXHR.responseText, 'errors');

        if (!error) {
            // Procura pelo erro na variável error.
            error = App.ajax.utils.jsonProperty(jqXHR.responseText, 'error');
        }

        if (!error) {
            // Procura pela exception.
            var exception = App.ajax.utils.jsonProperty(jqXHR.responseText, 'exception');

            if (exception) {

                var message = App.ajax.utils.jsonProperty(jqXHR.responseText, 'message');
                var file = App.ajax.utils.jsonProperty(jqXHR.responseText, 'file');
                var line = App.ajax.utils.jsonProperty(jqXHR.responseText, 'line');

                // Monta a mensagem da exception.
                error = exception + ': ' + message + ' [' + file + '#' + line + ']';
            }
        }

        var redirectUrl = App.ajax.utils.jsonProperty(jqXHR.responseText, 'redirect');

        if (redirectUrl) {
            var redirect = function() {
                document.location.href = redirectUrl;
            }

        }

        var timeout = redirect ? 3000 : null;

        if (error) {

            // Exibe a mensagem de erro num toast.
            // App.materialize.toast(error, timeout, redirect);
        }
        // O retorno não é um json.
        else {

            // Tem um $target?                        
            if ($target) {

                // Substitui o $target com o conteúdo.
                $target.html(jqXHR.responseText);
            }

            if (redirect) {
                redirect();
            }
        }
    },

    /**
     * Evento para quando um ajax é executado.
     * 
     * @param  {jQuery} $element Elemento que executou o ajax.
     * @param  {object} jqXHR Retorno do ajax.
     * @return {jQuery} 
     * @example App.ajax.event.success($element, jqXHR);
     */
    complete: function($element, jqXHR) {

        // Fecha o modal, caso o formulário esteja aberto.
        // $element.closest('.modal').modal('close');
        // App.ajax.modal.removelOpeneds(0);

        // Remove o preloader.
        // App.preloader.remove();
    },

    /**
     * Evento antes de um ajax ser executado.
     * 
     * @param  {jQuery} $element Elemento que executou o ajax.
     * @return {jQuery} 
     * @example App.ajax.event.before($element);
     */
    before: function($element) {
        // Adiciona o preloader.
        // App.preloader.add();
    },
}