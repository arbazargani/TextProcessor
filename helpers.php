<?php
    function die_as_html($content) {
        $content = htmlentities($content);
        die("<!DOCTYPE html>
        <html lang='en' dir='rtl'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>
        <body>
            <pre style='text-align: right'>
            $content
            </pre>
        </body>
        </html>");
        
    }

    function EscapeArabics($content) {
        $content = str_replace('ي', 'ی', $content);
        $content = str_replace('ك', 'ک', $content);
        return $content;
    }

    function ReplaceCustomBreaks($content) {
        str_replace('<p>&nbsp;</p>', '+++', $content);
        str_replace('\r\n', '+++', $content);
        return $content;
    }

    function ApplyAllHelpers($content) {
        $content = EscapeArabics($content);
        $content = ReplaceCustomBreaks($content);
        return $content;
    }