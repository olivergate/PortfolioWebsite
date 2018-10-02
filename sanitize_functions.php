<?php

/** Function that really makes sure that the string that is being input into the function is an actual string and gets
 * rid of any special characters that could effect php or html or sql.
 *
 * @param string $input_string the string which requires sensitization
 * @return bool|string either a cleansed string or a boolean
 */
function clean_string(string $input_string) {
    if (is_string($input_string)===true) {
        $sanitised_string = filter_var($input_string, FILTER_SANITIZE_STRING);
        trim($sanitised_string);
        return $sanitised_string;
    }
    return false;
}


/**Function that cleans a string that is meant to contain a date. Method is that by exploding the array, it measure the
 * length of each part of the array and returns either a 4-2-2 result as a string or a false statement. Extra functionality required
 * to clean the char set of anything but numeric values and '-' marks.
 *
 * @param string $input_date input comes from a form which is set to date input.
 * @return array|bool the return is either a string of format 4-2-2 or a false statement
 */
function clean_date(string $input_date) {
    $exploded_array = explode('-', $input_date);
    if (strlen($exploded_array[0])==4 && strlen($exploded_array[1])==2 &&strlen($exploded_array[2])==2) {
        $clean_date = [$exploded_array[0] . '-' . $exploded_array[1] . '-' . $exploded_array[2], true];
        return $clean_date;
    }
        return false;
}

echo clean_string(5);