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
        <li class="nav-item <?php if (strpos($uri, 'write')) echo('active');?> ">
            <a class="nav-link" href="/write.php"><i class="fa fa-fw fa-pencil-square-o"></i>&nbsp;Write</a>
        </li>
    </ul>
</nav>