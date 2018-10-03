
<?php
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
            <form action="push_data.php" id="text_edit" method="post">
                <input type="submit"/>
            </form>
            <form enctype="multipart/form-data" action="push_data.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                Send this file: <input name="portfolio_image" type="file" />
                <input type="submit" value="Send File" />
            </form

        </div>
        <div class="portfolio_cms">
            <div class="_50_50_">
            </div>
            <div class="_50_50_display">
                <?php display_portfolio_info($portfolio_db); ?>
            </div>
        </div>
    </main>
</body>
