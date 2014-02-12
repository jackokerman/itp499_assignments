<?php

require __DIR__ . "/vendor/autoload.php";

use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard Login</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h2>Login</h2>
                    <?php
                        $message = $session->getFlashBag()->get("statusMessage");
                        if (count($message) > 0)
                            echo "<div class='alert alert-danger'>$message[0]</div>";
                    ?>
                    <form method="post" action="login-process.php">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

