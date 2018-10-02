<?php
require 'pull_data.php';
require 'sanitize_functions.php';
/**Updates the database with the content of the post variable depending on WHERE location_description = the given location description.
 *
 * @param string $post_variable variable stored from the $_POST
 * @param $location_description, a hard typed location description according to the location description in the database
 * @param $db Object which stores the
 * @return string giving the indication of whether the submission was successful
 */
function push_data(string $post_variable, string $location_description, $db)
{
    $query_update = $db->prepare("UPDATE `text_input` SET `content` = :post_variable WHERE `location_description`='$location_description';");
    $query_update->bindParam(':post_variable', $post_variable);
    if ($query_update->execute()) {
        return "Submission of Form for " . $location_description . " Complete <br>";
    }else {
            return "Error in Submission for " . $location_description;
        }
}


$about_me1_new = clean_string($_POST["about_me1"]);
$hero_statement_new = clean_string($_POST["hero_statement"]);
echo push_data($hero_statement_new, 'hero_statement', $db);
echo push_data($about_me1_new, 'about_me1', $db);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="cms.css" />

</head>
<body>
<div class="congrats">
    <a href="cms.php"> SUBMISSION COMPLETE RETURN TO CMS BY CLICKING HERE</a>
</div>
</body>
</html>
