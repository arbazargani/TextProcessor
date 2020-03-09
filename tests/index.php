<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function trimmer($str) {
        $chars = [".", "\\", "/", "-", "!", "،", ",", "<", ">", "[", "]", "{", "}", "|"];
        foreach ($chars as $char) {
            // trim($str, "$char");
            str_replace($char, "", $str);
        }
        return $str;
    }
    echo trim("این یک حبر آزمایشی است،", "060C");
?>
</body>
</html>