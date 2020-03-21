<?php
    $plugins = [
        'SEO' => 1,
    ];

    foreach ($plugins as $name => $state) {
        if ($state) {
            require_once "plugins/$name.php";
            if ($debug) {
                echo "<pre>plugin: $name loaded.</pre>";
            }
        }
    }

