
<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 01/10/2018
 * Time: 09:02
 */
require 'pull_data.php';

?>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="cms.css" />
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalemate" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Italiana" rel="stylesheet">

    <title>Content Management system</title>
</head>
<body>
    <main>
        <div class="form_container">
            <h3>Hero Statement</h3><textarea rows="4" cols="30" name="hero_statement" form="text_edit"><?php echo $hero_statement ?></textarea><br>
            <h3>About me</h3><textarea rows="4" cols="30" name="about_me1" form="text_edit"><?php echo $about_me1 ?></textarea>
            <form action="edit_page.php" id="text_edit" method="post">
                <input type="submit"/>
            </form>

        </div>
    </main>
</body>
