<?php


class Debug {

    // refer to function in other files simply as 'print("somestring");' Prints to screen sort of like echo.
    public static function print($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}