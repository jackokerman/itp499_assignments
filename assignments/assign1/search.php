<!DOCTYPE html>
<html>
    <head>
        <title>Movie Database - Search</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Movie Database Search</h1>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <form method="get" action="results.php" >
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Movie Title" name="title">
                        <span class="input-group-btn">
                            <input class="btn btn-default" type="submit" value="Submit">
                        </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>