<?php

require __DIR__ . "/vendor/autoload.php";

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Carbon\Carbon;
use ITP\Utilites;

$session = new Session();
$session->start();

// Check to see if user is logged in
if (is_null($session->get("loginTime"))) {
    $response = new RedirectResponse("login.php");
    return $response->send();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title class="text-center">Dashboard</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                  <span class="navbar-brand">Dashboard</span>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    $timeString = Carbon::createFromTimestamp($session->get("loginTime"))->diffForHumans();
                    echo " <li><span class='navbar-text'>{$session->get("username")}</span></li>";
                    echo " <li><span class='navbar-text'>{$session->get("email")}</span></li>";
                    echo " <li><span class='navbar-text'>Last Login: {$timeString}</span></li>";
                ?>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php
                $message = $session->getFlashBag()->get("statusMessage");
                if (count($message) > 0)
                    echo "<div class='alert alert-success text-center'>$message[0]</div>";
                ?>
            </div>
        </div>
        <h2 class="text-center">Songs</h2>
        <div class="row">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $songQuery = new ITP\Songs\SongQuery(Utilites::getPDO());
                $songs = $songQuery
                    ->withArtist()
                    ->withGenre()
                    ->orderBy('title')
                    ->all();

                foreach($songs as $song) {
                    echo "<tr>
                            <td>{$song['title']}</td>
                            <td>{$song['artist_name']}</td>
                            <td>{$song['genre']}</td>
                            <td>{$song['price']}</td>
                         </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
