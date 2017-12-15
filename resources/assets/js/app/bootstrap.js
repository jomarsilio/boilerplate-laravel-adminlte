/**
 * @namespace App.bootstrap
 */
App.bootstrap = {

    /**
     * Aplica o bootstrap nos elementos filhos do elemento selecionado.
     * 
     * @param {(string|jQUery)} target Alvo do bootstrap.
     * @return jQuery
     * @example App.bootstrap.apply('body');
     */
    apply: function(target) {

        // Elemento em que será aplicado o Bootstrap.
        var $target = $(target || 'body');

        $target
        // Procura os tooltips.
            .find('[data-toggle="tooltip"]')
            // Inicia o tooltip.
            .tooltip();

        return $target;
    },
};

App.bootstrap.apply();