/**
 * Utilizando o data-search em um input para buscar valores em uma tabela
 * 
 * @event input:data-search=table
 * @example <input data-search="table" data-target="#target">
 */
$('body').on('keyup', 'input[data-search=table]', function(e) {
    // Resgata o input.
    var $input = $(e.currentTarget);

    // Se for ESC, apaga o valor do input.
    if (e.keyCode == 27) {
        $input.val('');
    }

    // Indica o container em que o texto será buscado.
    var target = $input.data('target');

    // Resgata os elementos que serão filtrados dentro do container.
    var $target = $(target + ' tbody tr');

    App.search.default($target, $input.val());
});