/**
 * @namespace App.menu
 */
App.menu = {

    /**
     * Ativa o nó pai de um submenu.
     * 
     * @param {(string|jQUery)} target Elemento alvo..
     * @return jQuery
     * @example App.menu.activeParent('.sidebar-menu');
     */
    activeParent: function(target) {

        // Elemento em que será aplicado o tratamento.
        var $target = $(target || '.sidebar-menu');

        $($target)
            // Procura um submenu selecionado
            .find('.treeview-menu .active')
            // Procura o nó inicial.
            .closest(".treeview")
            // Adiciona a classe.
            .addClass('active');

        return $target;
    }
};

App.menu.activeParent();