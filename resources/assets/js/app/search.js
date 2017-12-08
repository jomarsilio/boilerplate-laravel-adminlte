/**
 * Busca uma string nos elementos da página.
 */

App.search = {

    default: function($target, str) {
        // Trata o texto da busca
        str = App.utils.replaceSpecialCharacters($.trim(str)).toLowerCase();

        // Possui alguma busca?
        if (str) {

            $target.filter(function() {

                // O texto da busca não foi encontrado?
                if (App.utils.replaceSpecialCharacters($(this).text().toLowerCase()).indexOf(str) <= 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }

            });

        } else {
            // Captura apenas os elementos ocultos.
            var $filtereds = $target.filter(':hidden');

            // Exibe todos os elementos filtrados.
            $filtereds.show();
        }
    }
}