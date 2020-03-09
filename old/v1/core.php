<?php
    /*
    * Helper to proccess plain text
    * and make final output.
    */

    function handleProccess($data, $hrefs) {
        $counter = [];
        $tempout = explode(" ", $data);
        $output = '';
        foreach ($tempout as $temp) { // main words array
            // plain as plain.com
            foreach ($hrefs as $anchor => $href) {
                $position = strpos($temp, $anchor);
                if($position !== false) {
                    $output .= "<a href='$anchor.com' target='_blank'>" . substr($temp, 0, strlen('anchor')) . '</a>';
                } else {
                    $output .= " $temp";
                }
            }
        }
    }