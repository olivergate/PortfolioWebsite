<?php
require 'pull_data_functions.php';
require 'db_instantiation.php';


$content_array = content_collect('location_description','content', $db);

$hero_statement = content_picker('hero_statement', $content_array);
$about_me1 = content_picker('about_me1', $content_array);

$portfolio_db = portfolio_collect($db);

foreach ($portfolio_db as $row) {
    echo '<br>delete =>' . $row['delete'];
    echo '<br>image_file_name =>' . $row['image_file_name'];
    echo '<br>project_name =>' . $row['project_name'];
    echo '<br>project_url =>' . $row['project_url'];
    echo '<br>hover_text =>' . $row['hover_text'];
}

$example_array = [
    [
        'delete' => 1,
        'image_file_name' => '..img/mayden.jpg',
        'project_name' => 'CSS Logo',
        'project_url' => 'https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/',
        'hover_text' => 'Have a look'
    ]
];
display_portfolio($example_array);