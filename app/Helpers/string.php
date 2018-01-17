<?php

if (! function_exists('replace_special_characters')) {
    /**
     * Substitui caracteres especiais de uma string.
     *
     * @param string $value
     * @return string
     */
    function replace_special_characters($value)
    {
        // Detecta a codificação da string.
        $originalEncode = mb_detect_encoding($value);

        // Resgata os caracteres que serão substituídos.
        $toSearch = config('constant.specialCharacter.search');
        $toReplace = config('constant.specialCharacter.replace');

        // Converte a codificação para ISO-8859-1.
        $toSearch = mb_convert_encoding($toSearch, "ISO-8859-1");
        $toReplace = mb_convert_encoding($toReplace, "ISO-8859-1");
        $value = mb_convert_encoding($value, "ISO-8859-1");

        // Substitui os caracteres.
        $value = strtr($value, $toSearch, $toReplace);

        // Converte a codificação da string para o formato original.
        $value = mb_convert_encoding($value, $originalEncode);

        return $value;
    }
}
