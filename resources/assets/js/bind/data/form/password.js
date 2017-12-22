/**
 * Evento para sempre que um [data-toggle="password"] for clicado, alternar a exibicao de um input[type="password"].
 * 
 * @event input:data-toggle="password
 * @example 
 *  <i data-toggle="password" data-target="#password" class="fa fa-eye"></i>
 *  <input type="password" id="password" />
 */
$('body').on('click', '[data-toggle="password"]', function(ev) {

    // Desabilita o evento nativo.
    ev.preventDefault();

    // Elemento atual.
    var $el = $(ev.currentTarget);

    // Ícone do elemento atual.
    var icon = $el.html();

    // Alvo do disparo.
    var dataTarget = $el.attr('data-target');

    // Elemento alvo.
    var $target = $(dataTarget);

    // O alvo é um password?
    if ($target.is('input[type="password"]')) {

        // Altera o alvo.
        $target.prop('type', 'text');

        // Altera o ícone do elemento atual.
        $el.html(icon.replace('-slash', ''));

    } else {
        // Altera o alvo.
        $target.prop('type', 'password');

        // Altera o ícone do elemento atual.
        $el.html(icon.replace('fa-eye', 'fa-eye-slash'));
    }
});