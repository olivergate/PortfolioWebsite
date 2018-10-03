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

/**function that loops through an array and echoes out the full html script and echos all the portfolio items that are
 * in the data base if they have a deleted value of 1
 *
 * @param array $portfolio_array an array that holds the data from a database
 * @return bool false iff there is no array put in. the rest of the outputs are echos only.
 */
function display_portfolio(array $portfolio_array) {
    if (is_array($portfolio_array)) {
        foreach ($portfolio_array as $row) {
            if ($row['delete']) {
                echo '<div style="background-image: url(' . $row['image_file_name'] . '); background-position:cover;" class="portfolio_button">';
                echo '<p>' . $row['project_name'] . '</p>';
                echo '<a href=' . $row['project_url'] . '><h3>Have a look here</h3></a>';
                echo '</div>';

            }
        }
    } else {
        return false;
    }
}

function display_portfolio_info(array $portfolio_array) {
    if (is_array($portfolio_array)) {
        foreach ($portfolio_array as $row) {
            echo '<div style="background-image: url(' . $row['image_file_name'] . '); background-position:cover;" class="portfolio_button">';
            echo '<p>' . $row['project_name'] . '</p>';
            echo '<a href=' . $row['project_url'] . '><h3>Have a look here</h3></a>';
            echo '</div>';
            echo '<br>URL = ' . $row['project_url'] . '<br>  Image file name = ' . $row['image_file_name'] . ' ';
            if ($row['delete']=1) {
                echo 'This item is displayed on the Front-end';
            }else {
                echo 'This item DOES NOT display on the Front-end (value 0)';
            };


        }
    } else {
        return false;
    }
}