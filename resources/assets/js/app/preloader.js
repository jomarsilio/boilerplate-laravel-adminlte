/**
 * Preloader
 * 
 * @namespace
 */
App.preloader = {

    /**
     * Id do preloader.
     */
    id: 'app-preloader',

    /**
     * Alvo do preloader.
     */
    target: '.content-wrapper',

    /**
     * Função de manipulação.
     */
    manipulation: 'prepend',

    /**
     * Template html do preloader.
     */
    template: '<div class="progress xs" style="position:fixed;right:0;left:0;z-index:1030;">' +
        '<div role="progressbar" style="width:100%;" class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"></div>' +
        '</div>',

    /**
     * Adiciona o preloader.
     * 
     * @example App.preloader.add();
     * @return jQuery
     */
    add: function() {

        // Cria o preloader.
        var $preloader = $(App.preloader.template);

        // Adiciona o id do preloader.
        $preloader.attr('id', App.preloader.id);

        // Encontra o target.
        var $target = $(App.preloader.target);

        // Adiciona o preloader ao target.
        $target[App.preloader.manipulation]($preloader);

        return $preloader;
    },

    /**
     * Remove o preloader.
     * 
     * @example App.preloader.remove();
     * @return jQuery
     */
    remove: function() {

        // Recupera o preloader.
        $preloader = $('[id="' + App.preloader.id + '"]');

        // Remove o preloader.
        $preloader.remove();
    },
}