<!DOCTYPE html>
<html>
    <head>
        <title>West Kent</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php include('nav.php') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6 col-xs-12">
                    <h1 class="display-4">West Kent Blog</h1>
                    <?php
                    include('blog_posts.php');
                    ?>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    </body>
</html>
