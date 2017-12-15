/**
* @namespace App.ajax
*/
App.ajax = {
    
    /**
    * Retorna dados defaults para o header da requisição ajax.
    * 
    * @param  {object} additionalData Dados adicionais a serem enviados por header.
    * @return {object}
    * @example App.ajax.headers({});
    */
    headers: function(additionalData){
        
        var headers = {
            // Token CRSF.
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
        };
        
        // Tem dados adicionais a serem enviados?
        if (additionalData) {
            
            // Mescla com os dados adicionais.
            headers = $.extend(headers, additionalData);
        }
        
        return headers;
    },
};