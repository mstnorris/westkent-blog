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
                    <nav class="navbar navbar-dark bg-inverse" style="background-color: #B62536;">
                        <a class="navbar-brand" href="/"><i class="fa fa-fw fa-university"></i>&nbsp;West Kent</a>
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/blog.php"><i class="fa fa-fw fa-newspaper-o"></i>&nbsp;Blog <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/write.php"><i class="fa fa-fw fa-pencil-square-o"></i>&nbsp;Write</a>
                            </li>
                        </ul>
                    </nav>
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
