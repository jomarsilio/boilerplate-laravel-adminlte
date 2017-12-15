<?php

if (! function_exists('map_with_keys')) {
    /**
     * Converte uma collection para um array simples com chave => valor.
     *
     * @param Collection $collection
     * @param string $keyName
     * @param string|array $valueName
     * @param string  $separator
     * @return string
     */
    function map_with_keys($collection, $keyName, $valueName, $separator = ' - ')
    {
        $newCollection = [];
        
        // Re-mapeia a collection.
        foreach ($collection as $item) {
            // O item é um array?
            if (is_array($item)) {
                // Então converte para um objeto.
                $item = (object) $item;
            }

            // O valor não é uma array?
            if (!is_array($valueName)) {
                // Então converte para um array.
                $valueName = [$valueName];
            }
            
            $names = [];
            
            // Criar um array com o valor.
            foreach ($valueName as $row) {
                $names[] = $item->$row;
            }
            
            // Transforma o array em uma string.
            $names = implode($separator, $names);
            
            // Mapeia para chave => valor.
            $newCollection[$item->$keyName] = $names;
        }
        
        return $newCollection;
    }
}

if (! function_exists('map_permissions_to_groups')) {
    /**
     * Agrupa as permissões com base no nome da permissão.
     * 
     * @param Collection $collection
     * @return Collection
     */
    function map_permissions_to_groups($collection)
    {
        $groups = $collection->mapToGroups(function ($item, $key) {

            // Gera um array a partir do nome da permissão.
            $groupPrefix = explode('.', $item->name);

            // Remove o último item do array.
            array_pop($groupPrefix);

            // Transforma o array em uma string.
            $groupPrefix = implode('_', $groupPrefix);

            // Seta o grupo ao array de retorno e atribui a permissão.
            return [$groupPrefix => $item];
        });

        return $groups;
    }
}
