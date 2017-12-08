/**
 * Funções úteis.
 * 
 * @namespace App.utils
 */
App.utils = {

    /**
     * Substitui caracteres especiais por caracteres simples.
     * 
     * @param {String} str
     * @return {String}
     */
    replaceSpecialCharacters: function(str) {
        var regex = new RegExp('[' + App.special_characters + ']', 'g');
        var translate = App.special_characters_replace;

        return (str.replace(regex, function(match) {
            return translate.substr(regex.source.indexOf(match) - 1, 1);
        }));
    },
}