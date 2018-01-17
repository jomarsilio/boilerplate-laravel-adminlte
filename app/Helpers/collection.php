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
        // Re-mapeia a collection.
        $newCollection = $collection->mapWithKeys(function ($item) use ($keyName, $valueName, $separator) {
            
            $names = [];

            // O valor não é uma array?
            if (!is_array($valueName)) {
                // Então converte para um array.
                $valueName = [$valueName];
            }
            
            // Criar um array com o valor.
            foreach ($valueName as $row) {
                $names[] = $item->$row;
            }
            
            // Transforma o array em uma string.
            $names = implode($separator, $names);

            // Mapeia para chave => valor.
            return [$item->$keyName => $names];
        });
        
        return $newCollection->all();
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

if (! function_exists('map_to_groups')) {
    /**
     * Agrupa as permissões com base no nome da permissão.
     *
     * @param Collection $collection
     * @param string $prefix
     * @return Collection
     */
    function map_to_groups($collection, $prefix)
    {
        $groups = $collection->mapToGroups(function ($item, $key) use ($prefix) {

            // Gera o prefixo do grupo.
            $groupPrefix = $item->$prefix;

            // Seta o grupo ao array de retorno e atribui o item da coleção.
            return [$groupPrefix => $item];
        });

        return $groups;
    }
}
