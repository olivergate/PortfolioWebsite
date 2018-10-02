<?php
require 'pull_data_functions.php';
require 'db_instantiation.php';


$content_array = content_collect('location_description','content', $db);

$hero_statement = content_picker('hero_statement', $content_array);
$about_me1 = content_picker('about_me1', $content_array);

$portfolio_1 = portfolio_collect(1, $db);
$portfolio_2 = portfolio_collect(2, $db);
$portfolio_3 = portfolio_collect(3, $db);
$portfolio_4 = portfolio_collect(4, $db);
$portfolio_5 = portfolio_collect(5, $db);
$portfolio_6 = portfolio_collect(6, $db);
$portfolio_7 = portfolio_collect(7, $db);
$portfolio_8 = portfolio_collect(8, $db);
$portfolio_9 = portfolio_collect(9, $db);

function display_portfolio(array $portfolio_array) {
    if ($portfolio_array[0]['delete']) {
        echo '<div style="background-image: url(' . $portfolio_array[0]['image_file_name'] . '); background-position:cover;" class="portfolio_button">';
        echo '<p>' . $portfolio_array[0]['project_name'] . '</p>';
        echo '<a href=' . $portfolio_array[0]['project_url'] . '><h3>Have a look here</h3></a>';
        echo '</div>';
    }
}