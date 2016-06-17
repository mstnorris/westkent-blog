# Instructions

1. Create a new folder/directory, give it a name, let's use your full name.

2. Within that directory create a file called "index.php"

3. Add the following code to the newly created _index.php_ file.

    ```html
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>West Kent</title>
    </head>
    <body>
        
    </body>
    </html>
    ```

4. The above code right now, is purely HTML. So yes, we could have used the `.html` extension and it would be viewable in the browser without any further configuration however we will soon be adding PHP code and that requires a server to run it - hence why we jumped the gun and are using the `.php` file extension.

5. Next, to make our blog look awesome on any browser, we'll grab **Bootstrap** from a [CDN (Content Delivery Network)](https://www.bootstrapcdn.com/alpha/). Add the following within the `<head></head>` tags in your `index.php` file.

    ```html
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
```

6. Now add the accompanying JavaScript file just before the closing `</body>` tag.

    ```html
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    ```

7. Lastly, we'll grab some cool icons [FontAwesome](http://fontawesome.io/icons/) from the [same CDN](https://www.bootstrapcdn.com/fontawesome/) as above. Place this code underneath your previous `<link>` tag.

    ```html
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    ```

8. Hopefully you've followed along up until now, but just incase you're not sure. Here's the code we've written so far in full.

    ```html
    <!DOCTYPE html>
    <html>
        <head>
            <title>West Kent</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        </head>
        <body>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
        </body>
    </html>
    ```

9. Moving onto the MySQL, first we need to connect via the command line (replace [USERNAME] with the username, defaults to 'root')

    ```sh
    mysql -u[USERNAME] -p
    ```

10. When prompted enter the password, it might be 'root', 'password', or an empty string ''.

    ```sh
    password
    ```

11. You should see the MySQL command prompt, it looks like this:

    ```mysql
    mysql> 
    ```

12. We're good to go, now let's create the database, called 'westkent'

    ```sql
    CREATE DATABASE westkent;
    ```

13. Create your user account, this will create a new user, that we'll only give access to our database that we created above.

    ```sql
    CREATE USER 'westkent' IDENTIFIED BY 'westkent';
    ```

14. Let's give our new user access to our database:

    ```sql
    GRANT ALL PRIVILEGES ON westkent.* TO 'westkent'
    ```

15. Now we need to create our `posts` table, we do this from the command line.

    ```sql
    CREATE TABLE `posts` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `title` varchar(255) NOT NULL DEFAULT '',
      `content` text NOT NULL,
      `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
    ```

16. We need to connect to our database from PHP now, to do this we will create a separate file so that the code can be reused. We do this to avoid repitition. We'll call this file `mysql_connection.php`

    ```php
    <?php

    $servername = "localhost";
    $username = "westkent";
    $password = "westkent";
    $database = "westkent";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Connection was successful
    } catch(PDOException $e) {
        // Connection failed
    }
    ```

17. Now let's add the code to display the blog posts themselves, we'll call this file `blog_posts.php`

    ```php
    <?php

    include('mysql_connection.php');

    try {
        $stmt = $conn->prepare("SELECT title, content, published_at FROM posts ORDER BY published_at DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card'><div class='card-block'>";
            echo "<h4 class='card-title'>" .$row['title'] . "</h4>";
            echo "<p class='card-text'>" . $row['content'] . "</p>";
            echo "<p class='card-text text-xs-right'><small class='text-muted'>" . $row['published_at'] . "</small></p>";
            echo "</div></div>";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ```

18. The code above on it's own doesn't look good at all, as it won't be formatted correctly. We'll include it in a bigger layout file (parent) that will help style it. Duplicate your _index.php_ file and rename it to `blog.php`. Within the `<body></body>` tags insert the following code.

    ```php
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6 col-xs-12">
                <h1 class="display-4">West Kent Blog</h1>
                <?php
                include('blog_posts.php');
                ?>
            </div>
        </div>
    </div>
    ```

19. Now let's create our navigation. Instead of duplicating the navigation in each and every file we create (which would look like this):

    ```html
    <nav class="navbar navbar-dark bg-inverse" style="background-color: #B62536;">
        <a class="navbar-brand" href="/"><i class="fa fa-fw fa-university"></i>&nbsp;West Kent</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/"><i class="fa fa-fw fa-home"></i>&nbsp;Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/blog.php"><i class="fa fa-fw fa-newspaper-o"></i>&nbsp;Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/write.php"><i class="fa fa-fw fa-pencil-square-o"></i>&nbsp;Write</a>
            </li>
        </ul>
    </nav>
    ```

    We'll instead create a separate file called `nav.php`. The reason we do this so that there is only one file that needs to be updated as and when our site grows. If we started with two pages, we'd have to edit the navigation in just two pages - that's OK! But, if instead we had nine pages, and we wanted to add a tenth, we'd have to edit all ten pages and it starts to get really messy. Below is the `nav.php`

    ```php
    <?php
        $uri = $_SERVER['REQUEST_URI'];
    ?>
    <nav class="navbar navbar-dark bg-inverse" style="background-color: #B62536;">
        <a class="navbar-brand" href="/"><i class="fa fa-fw fa-university"></i>&nbsp;West Kent</a>
        <ul class="nav navbar-nav">
            <li class="nav-item <?php if (strlen($uri) == 1) echo('active'); ?> ">
                <a class="nav-link" href="/"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a>
            </li>
            <li class="nav-item <?php if (strpos($uri, 'blog')) echo('active'); ?> ">
                <a class="nav-link" href="/blog.php"><i class="fa fa-fw fa-newspaper-o"></i>&nbsp;Blog <span class="sr-only">(current)</span></a>
            </li>
            
        </ul>
    </nav>
    ```

20. Let's include the navigation in our `index.php` and `blog.php` pages. Add this after the `<container>` tag, before the first `<div class="row">` tag.

    ```php
    <div class="row">
        <div class="col-xs-12">
            <?php include('nav.php') ?>
        </div>
    </div>
    ```

    Your `blog.php` file should now look like this in it's entirety.

    ```php
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
    ```

21. We now need to add a page so that we can write a new blog post, let's again duplicate our `index.php` page and rename it to `write.php`. Then, add this between the `<container></container>` tags. Notice that we haven't got any navigation. We'll add this next.

    ```php
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
    ```

22. Add our `nav.php` to our `write.php` page. Add the following after the opening `<container>` tag and before the first `<div class="row">` tag.

    ```php
    <div class="row">
        <div class="col-xs-12">
            <?php include('nav.php') ?>
        </div>
    </div>
    ```

23. You'll notice that we don't yet have a link to the `write.php` page from our navigation, so we'll add that now. Add this just after the last closing `</li>` tag within `nav.php`.

    ```php
    <li class="nav-item <?php if (strpos($uri, 'write')) echo('active');?> ">
        <a class="nav-link" href="/write.php"><i class="fa fa-fw fa-pencil-square-o"></i>&nbsp;Write</a>
    </li>
    ```
