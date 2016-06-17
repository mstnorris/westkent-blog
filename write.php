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
                <div class="col-sm-6 col-md-offset-6 col-xs-12">
                    <h1 class="display-4">Write Post</h1>
                    <form class="form-horizontal" action="/post.php" method="post">
                        <fieldset class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            <small class="text-muted">Give your post a title.</small>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="5" placeholder="Content"></textarea>
                            <small class="text-muted">Write the post content.</small>
                        </fieldset>
                        <button type="submit" class="btn btn-primary pull-xs-right">Post</button>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    </body>
</html>
