<!DOCTYPE html>
<html>
    <head>
        <title>Movie Database - Results</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Movie Database Search</h1>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php
                        $host = "itp460.usc.edu";
                        $dbname = "dvd";
                        $user = "student";
                        $pass = "ttrojan";

                        $title = $_GET['title'];
                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

                        $sql = "
                          SELECT title, rating, genre, format
                          FROM dvd_titles
                          INNER JOIN ratings
                          ON dvd_titles.rating_id = ratings.id
                          INNER JOIN genres
                          ON dvd_titles.genre_id = genres.id
                          INNER JOIN formats
                          ON dvd_titles.format_id = formats.id
                          WHERE title LIKE ?
                        ";

                        $statement = $pdo->prepare($sql);

                        $like = "%".$title."%";
                        $statement->bindParam(1, $like);

                        $statement->execute();
                        $titles = $statement->fetchAll(PDO::FETCH_OBJ);
                    ?>

                    <?php if(count($titles) > 0) : ?>
                        <div class="alert alert-info">
                            Here are the search results for <strong>'<?php echo $title ?>'</strong>.
                            Back to <a href="search.php" class="alert-link">Search</a>.
                        </div>
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Rating</th>
                                <th>Genre</th>
                                <th>Format</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($titles as $title) : ?>
                                <tr>
                                    <td><?php echo $title->title ?></td>
                                    <td><?php echo $title->genre ?></td>
                                    <td><?php echo $title->rating ?></td>
                                    <td><?php echo $title->rating ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert alert-danger">
                            Your search - <strong><?php echo $title ?></strong> - did not match any movies in the database.
                            Back to <a href="search.php" class="alert-link">Search</a>.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>