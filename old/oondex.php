<?php

    require_once 'env.php';
    require_once 'core.php';

    $data = 'this is plain data as you want.';
    $output = handleProccess($data, $hrefs);

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            echo "<pre>";
            echo $output;
        ?>
    </body>
    </html>