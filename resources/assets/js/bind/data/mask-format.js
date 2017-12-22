/**
 * Aplica a máscara de telefone a um input[data-mask-format="phone"].
 * 
 * @event input:data-mask-format=phone
 * @example <input type="text" data-mask-format="phone">
 */
$('body').on('focus', 'input[data-mask-format="phone"]', function(ev) {
    // Input com foco.
    var $input = $(ev.currentTarget);

    // Define a máscara.
    var phoneMask = function(phone) {
        return phone.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    }

    // Verifica se ainda não existe mascará.
    if (!$input.data('mask')) {

        $input.mask(phoneMask, {
            onKeyPress: function(phone, e, field, options) {
                field.mask(phoneMask.apply({}, arguments), options);
            }
        });
    }
});

/**
 * Aplica a máscara de CEP a um input[data-mask-format="zip-code"].
 * 
 * @event input:data-mask-format=zip-code
 * @example <input type="text" data-mask-format="zip-code">
 */
$('body').on('focus', 'input[data-mask-format="zip-code"]', function(ev) {
    // Input com foco.
    var $input = $(ev.currentTarget);

    // Verifica se ainda não existe mascará.
    if (!$input.data('mask')) {

        $input.mask("00000-000");
    }
});

/**
 * Aplica a máscara de IPv4 a um input[data-mask-format="ipv4"].
 * 
 * @event input:data-mask-format=ipv4
 * @example <input type="text" data-mask-format="ipv4">
 */
$('body').on('focus', 'input[data-mask-format="ipv4"]', function(ev) {
    // Input com foco.
    var $input = $(ev.currentTarget);

    // Verifica se ainda não existe mascará.
    if (!$input.data('mask')) {

        $input.mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            }
        });
    }
});

/**
 * Aplica a máscara de data a um input[data-mask-format="date"].
 * 
 * @event input:data-mask-format=date
 * @example <input type="text" data-mask-format="date">
 */
$('body').on('focus', 'input[data-mask-format="date"]', function(ev) {
    // Input com foco.
    var $input = $(ev.currentTarget);

    // Verifica se ainda não existe mascará.
    if (!$input.data('mask')) {

        $input.mask("00/00/0000");
    }
});

/**
 * Aplica a máscara de CPF a um input[data-mask-format="cpf"]
 * 
 * @event input:data-mask-format=cpf
 * @example <input type="text" data-mask-format="cpf">
 */
$('body').on('focus', 'input[data-mask-format="cpf"]', function(ev) {
    // Input com foco.
    var $input = $(ev.currentTarget);

    // Verifica se ainda não existe mascará.
    if (!$input.data('mask')) {

        // Mascára o input.
        $input.mask("000.000.000-00");
    }
});