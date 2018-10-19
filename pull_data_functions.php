<?php
session_start();

/**
 * function that pulls data from the database and returns it as an array to mine data from
 *
 * @param string $key_field_name. Selects the field name that is being selected from which will represent the key.
 * @param string $field_name. Selects the field name that is being selected from
 * @param PDO $db linked object that holds the database
 *
 * @return array The content as an array
 */
function content_collect(string $key_field_name, string $field_name, PDO $db) : array {
    $query = $db->prepare("SELECT $key_field_name, $field_name FROM `text_input`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

/**
 * Picks content from an array
 * This function sifts through an array of database results and picks out a value according to that location
 *
 * @param string $location_id This is the description of where the content will go and correlates to the database entry location_description
 * @param array $database_pull this is the array which holds the pull from the database 'portfolio'
 *
 * @return string pull out the text which is in the database
 */
function content_picker(string $location_id, array $database_pull) : string {
    foreach($database_pull as $row) {
        if (array_search($location_id, $row)) {
            return $row['content'];
        }
    }
    return 'Error';
}

/**
 * Pulls in all information about an specific portfolio item as an array.
 *
 * @param PDO $db The database object that contains the necessary data
 *
 * @return array returned array showing containing all the necessary information. the array format is:
 * (that correlate to the field names) [id, visibility, project_name, image_file_name, hover_text, project_url]
 */
function portfolio_collect(PDO $db) : array {
    $query = $db->prepare("SELECT `id`, `delete`, `project_name`, `image_file_name`, `hover_text`, `project_url` FROM `portfolio`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

/**
 * Displays portfolio items
 * Function that loops through an array and returns  the full html script and echos all the portfolio items that are
 * in the data base if they have a deleted value of 1
 *
 * @param array $portfolio_array an array that holds the data from a database
 * @return string $result is a string with all of the html data in or an error statement
 */
function display_portfolio(array $portfolio_array) {
        $result = '';
        foreach($portfolio_array as $row) {
            if ($row['delete']) {
                if (
                    array_key_exists('image_file_name', $row) &&
                    array_key_exists('project_name', $row) &&
                    array_key_exists('project_url', $row) &&
                    array_key_exists('hover_text', $row)
                ) {
                    $result .= '<div style="background-image: url(' . $row['image_file_name'] . '); background-size:cover;" class="portfolio_button">';
                    $result .= '<p>' . $row['project_name'] . '</p>';
                    $result .= '<a href=' . $row['project_url'] . '>';
                    $result .= '<h3>' . $row['hover_text'] . ' </h3></a></div>';
                } else {
                    return 'Display Function not a recognisable array';
                }
            }
        }
        return $result;
}

/**
 * Displays portfolio items and editable information
 * Function that loops through an array and returns  the full html script and echos all the portfolio items that are
 * in the data base on the left hand side of the front end. Included in this echo function is a cms suite
 * which allows you to edit the information in the database which is pulling the data that is displaying
 *
 * @param array $portfolio_array an array that holds the data from a database
 * @return string $result is a string with all of the html data in or an error statement
 */
function display_portfolio_info(array $portfolio_array) {
    $result = '';
    foreach($portfolio_array as $row) {
        if (
            array_key_exists('image_file_name', $row) &&
            array_key_exists('project_name', $row) &&
            array_key_exists('project_url', $row) &&
            array_key_exists('hover_text', $row)
        ) {
            //shows the portfolio item (same as above function
            $result .= '<div><div style="background-image: url(' . $row['image_file_name'] . '); background-size:cover;" class="portfolio_button">';
            $result .= '<p>' . $row['project_name'] . '</p>';
            $result .= '<a href=' . $row['project_url'] . '>';
            $result .= '<h3>' . $row['hover_text'] . ' </h3></a></div>';

            //displays text box to the right of the portfolio item with editable gear

            $result .= '<div class="portfolio_display_text">';
            $result .= 'Title = <textarea rows="1"  name="title" form="portfolio_edit' . $row['id'] . '">' . $row['project_name'] . '</textarea><br>';
            $result .= 'Id (position) = ' . $row['id'] . '<br>';
            $result .= '<br>URL = <textarea rows="1" name="url" form="portfolio_edit' . $row['id'] . '">' . $row['project_url'] . '</textarea>';
            $result .= '<br>  Image file name = <textarea rows="1" name="image_path" form="portfolio_edit' . $row['id'] . '">' . $row['image_file_name'] . '</textarea>';
            $result .= '<br>Hover text = <textarea rows="1" name="hover" form="portfolio_edit' . $row['id'] . '">' . $row['hover_text'] . '</textarea>';
            $result .= '<br>Visibility = <textarea rows="1" name="visibility" form="portfolio_edit' . $row['id'] . '">' . $row['delete'] . '</textarea>';
            if ($row['delete'] == 1) {
                $result .= '<br>This item is displayed on the Front-end';
            } else {
                $result .= '<br>This item DOES NOT display on the Front-end (value 0)';
            }
            $result .= '<form method="post" id="portfolio_edit' . $row['id'] . '" action="portfolio_edit.php">';
            $result .= '<br><input name="id" type="hidden" value="' . $row['id'] . '"/>';
            $result .= '<br><input type="submit"/></form></div>';
        } else {
            return 'Display info Function not a recognisable array';
        }
    }

    return $result;


}