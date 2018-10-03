<?php

/** function that pulls data from the database and returns it as an array to mine data from
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

/**This function sifts through an array of database results and picks out a value according to that location
 *
 * @param string $location_id This is the description of where the content will go and correlates to the database entry location_description
 * @param array $database_pull this is the array which holds the pull from the database 'portfolio'
 *
 * @return string pull out the text which is in the database
 */
function content_picker(string $location_id, array $database_pull) : string {
    foreach ($database_pull as $row) {
        if(array_search($location_id, $row)) {
            return $row['content'];
        }
    }
    return 'Error';
}

/**Pulls in all information about an specific portfolio item as an array.
 *
 * @param PDO $db The database object that contains the necessary data
 *
 * @return array returned array showing containing all the necessary information. the array format is:
 * (that correlate to the field names) [id, visibility, project_name, image_file_name, hover_text, project_url]
 */
function portfolio_collect(PDO $db) : array {
    $query = $db->prepare("SELECT * FROM `portfolio`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

/**function that loops through an array and returns  the full html script and echos all the portfolio items that are
 * in the data base if they have a deleted value of 1
 *
 * @param array $portfolio_array an array that holds the data from a database
 * @return string $result is a string with all of the html data in or an error statement
 */
function display_portfolio(array $portfolio_array) {
    if (is_array($portfolio_array)) {
        $result = '';
        foreach ($portfolio_array as $row) {
            if ($row['delete']) {
                $result .= '<div style="background-image: url(' . $row['image_file_name'] . '); background-position:cover;" class="portfolio_button">';
                $result .= '<p>' . $row['project_name'] . '</p>';
                $result .= '<a href=' . $row['project_url'] . '>';
                $result .= '<h3>' . $row['hover_text'] . ' </h3></a></div>';
            }
        }
        return $result;
    } else {
        return 'Display Function not a recognisable array';
    }
}

function display_portfolio_info(array $portfolio_array) {
    if (is_array($portfolio_array)) {
        $result = '';
        foreach ($portfolio_array as $row) {
            //shows the portfolio item (same as above function
            $result .= '<div><div style="background-image: url(' . $row['image_file_name'] . '); background-position:cover;" class="portfolio_button">';
            $result .= '<p>' . $row['project_name'] . '</p>';
            $result .= '<a href=' . $row['project_url'] . '>';
            $result .= '<h3>' . $row['hover_text'] . ' </h3></a></div>';

            //displays text box to the right of the portfolio item with editable gear

            $result .= '<div class="portfolio_display_text">';
            $result .= '<br>Title = <textarea rows="1"  name="title_' . $row['id'] . '" form="text_edit">' . $row['project_name'] . '</textarea><br>';
            $result .= '<br>Id (position) = <textarea rows="1"  name="id_' . $row['id'] . '" form="text_edit">' . $row['id'] . '</textarea><br>';
            $result .= 'CHANGES TO ID NUMBERS MUST CONSDER UNIQUENESS<br>';
            $result .= '<br>URL = <textarea rows="1" name="url_' . $row['id'] . '" form="text_edit">' . $row['project_url'] . '</textarea>';
            $result .= '<br>  Image file name = <textarea rows="1" name="image_' . $row['id'] . '" form="text_edit">' . $row['image_file_name'] . '</textarea>';
            $result .= '<br>Hover text = <textarea rows="1" name="hover_' . $row['id'] . '" form="text_edit">' . $row['hover_text'] . '</textarea>';
            $result .= '<br>Visibility = <textarea rows="1" name="visibility_' . $row['id'] . '" form="text_edit">' . $row['delete'] . '</textarea>';
            if ($row['delete']==1) {
                $result .= '<br>This item is displayed on the Front-end</div>';
            } else {
                $result .= '<br>This item DOES NOT display on the Front-end (value 0)</div>';
            }
        }
        $result .= '<form method="post" name="portfolio_edit" action="push_data.php" id="portfolio_edit">';
        $result .= '<input type="submit"/></form>';
        return $result;
    } else {
        return 'Display info Function not a recognisable array';
    }
}