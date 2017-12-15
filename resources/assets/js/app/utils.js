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

    /**
     * Retorna uma propriedade de um json.
     * 
     * @param  {object|string} json
     * @param  {string} property
     * @return {string} 
     * @example App.ajax.utils.jsonProperty('{error: 'Erro!'}', 'error');
     */
    jsonProperty: function(json, property) {

        // Converte para json.
        json = App.ajax.utils.toJson(json)

        // Existe a propriedade?
        if (json && json[property]) {

            return json[property];
        }
    },

    /**
     * Converte uma string em um json.
     * 
     * @param  {object|string} json
     * @return {object} 
     * @example App.ajax.utils.toJson('{error: 'Erro!'}');
     */
    toJson: function(json) {

        // O json está em string?
        if ($.type(json) == 'string') {

            try {
                // Parseia o json.
                json = $.parseJSON(json);
            } catch (e) {}
        }

        // É um objeto?
        if ($.isPlainObject(json)) {

            return json;
        }
    },
}