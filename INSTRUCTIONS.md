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

