<?php
// load environments
require_once 'env.php';
require_once 'helpers.php';

// load requirements
if ($load_plugins) {
    require_once 'plugins.php';
}

// variables handling
$content = $_POST['content'];
$keyword = $_POST['keyword'];

// Apply helper functions from 'helpers.php' for input handling
$content = ApplyAllHelpers($content);

// if keyword sets and SEO plugin loades successfully, proccess should be done
if(isset($_POST['keyword']) && strlen($_POST['keyword']) > 0 && function_exists('CheckKeywordDensity')) {
    $optimizeInfo = CheckKeywordDensity($content, $keyword);
}

$exploded = explode(' ', $content); //تبدیل محتوا به ارایه
$founds = []; // جهت استفاده برای عدم لینک کردن مجدد یک کلمه
foreach ($exploded as $key => $word) { // طی کردن طول آرایه محتوا
    foreach ($hrefs as $anchor => $href) { //طی کردن طول ارایه کلمات کلیدی
        $state = 1;
        if (strpos($word, $anchor) !== false) {
            $exact = substr($word, 0, strlen($anchor)); // ساخت زیر رشته از کلمه بصورت دقیق برای جایگیزینی
            // چک کردن کاراکتر فارسی قبل یا بعد برای عدم لینک بین کلمه ای
            foreach($fa_char as $unallowed) {
                if( strpos(str_replace($exact, '', $word), $unallowed) !== false ) {
                    $state = 0;
                }
            }

            foreach($en_char as $unallowed) {
                if( strpos(str_replace($exact, '', $word), $unallowed) !== false ) {
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
$final = str_replace('+++', '<br/>', $final);
$final = ReplaceAuthor($final);
