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
        <input type="text" name="Username"/>
        <input type="password" name="Password"/>
        <input type="submit" />
    </form>

</section>
</body>

</html>