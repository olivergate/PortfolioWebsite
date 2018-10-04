<?php
session_start();

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="login.css" />
</head>
<body>

<section class="form">
    <?php
    if (isset($_GET['login_fail'])) {
        echo '<h3>LOGIN FAILED<h3></h3>';
    }
    ?>
    <form action="login_pull.php" method="post">
        <h3>Username</h3><input type="text" name="username"/>
        <h3>Password</h3><input type="password" name="password"/>
        <input type="submit" placeholder="Login to CMS"/>
    </form>

</section>
</body>

</html>