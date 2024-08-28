<?php

if (!function_exists('makeItems')) {
    function makeItems($names)
    {
        $items = [];
        foreach ($names as $name) {
            $items[] = (object) ['id' => $name, 'name' => $name];
        }
        return $items;
    }
}

