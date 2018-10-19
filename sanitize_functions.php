<?php
session_start();
/**
 * Cleans a string ready
 * Function that really makes sure that the string that is being input into the function is an actual string and gets
 * rid of any special characters that could effect php or html or sql.
 *
 * @param string $input_string the string which requires sensitization
 * @return bool|string either a cleansed string or a boolean
 */
function clean_string(string $input_string) {
        $sanitised_string = filter_var($input_string, FILTER_SANITIZE_STRING);
        trim($sanitised_string);
        return $sanitised_string;
}


