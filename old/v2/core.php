<?php
require_once 'env.php';
$content = $_POST['content'];
$exploded = explode(' ', $content); //تبدیل محتوا به ارایه
$founds = []; // بدون استفاده
foreach ($exploded as $key => $word) { // طی کردن طول آرایه محتوا
    foreach ($hrefs as $anchor => $href) { //طی کردن طول ارایه کلمات کلیدی
        $state = 1;
        if (strpos($word, $anchor) !== false) {
            $exact = substr($word, 0, strlen($anchor)); // ساخت زیر رشته از کلمه بصورت دقیق برای جایگیزینی
            foreach($fa_char as $unallowed) { // چک کردن کاراکتر فارسی قبل یا بعد برای عدم لینک بین کلمه ای
                if($word[strlen($anchor)+1] == $unallowed || $word[$pos-1] == $unallowed) {
                    $state = 0;
                }
            }
            foreach($en_char as $unallowed) { // چک کردن کاراکتر انگلیسی قبل یا بعد برای عدم لینک بین کلمه ای
                if($word[strlen($anchor)+1] == $unallowed || $word[$pos-1] == $unallowed) {
                    $state = 0;
                }
            }
            if ($state) {
                if (!array_key_exists($exact, $founds)) {
                    // $founds[] = str_replace($exact, "<a href='$href'>$exact</a>", $word);
                    $exploded[$key] = str_replace($exact, "<a href='$href'>$exact</a>", $word);
                    $founds["$exact"] = 1;
                }
            } else {
                // $founds[] = $word;
                $exploded[$key] = $word;
            }
        }
    }
}
$final = implode(' ',$exploded);