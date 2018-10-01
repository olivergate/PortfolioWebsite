<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 01/10/2018
 * Time: 09:02
 */
$hero_statement_new = $_POST

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
            <form action="index.php" id="about_me" method="post">
                <textarea name="hero_statement" form="about_me"><?php echo $hero_statement; ?></textarea>
                <input type="submit"/>
            </form>
        </div>
    </main>
</body>