<?php
session_start();
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="login.css" />
</head>
<body>
<section class="form">

    <form action="login_pull.php" method="post">
        <input type="text" name="username"/>
        <input type="password" name="password"/>
        <input type="submit" />
    </form>

</section>
</body>

</html>