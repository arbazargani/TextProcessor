<?php
    function hrefMaker() {
        $base = 'http://hadesenews.ir/tag';

        // add keyword here and fell power!
        $keywords = 'حوادث حادثه پرونده سرقت قتل تجاوز جنایی جسد تصادف سانحه مواد مخدر ماده مخدر پرونده جنایت درگیری مسلحانه سارق دستگیر دستگیری بازداشت فساد اقتصادی سیل زلزله رانش زمین اختلاس';

        $exp = explode(' ', $keywords);
        $hrefs = [];

        foreach ($exp as $index) {
            $hrefs["$index"] = "$base/$index";
        }

        return $hrefs;
    }

    $hrefs = hrefMaker();

    $fa_char = [
        'ا',
        'ب',
        'پ',
        'ت',
        'ث',
        'ج',
        'چ',
        'ح',
        'خ',
        'د',
        'ذ',
        'ر',
        'ز',
        'س',
        'ش',
        'ص',
        'ض',
        'ط',
        'ظ',
        'ع',
        'غ',
        'ف',
        'ق',
        'ک',
        'گ',
        'ل',
        'م',
        'ن',
        'و',
        'ه',
        'ی'
    ];

    $en_char = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        'i',
        'j',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'q',
        'r',
        's',
        't',
        'u',
        'v',
        'w',
        'x',
        'y',
        'z',
    ];

    $allowed_tags = [
        '<br/>',
        '<br>'
    ];

    $load_plugins = true;
    $debug = false;