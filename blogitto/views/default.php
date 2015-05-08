<!DOCTYPE html>
<html>
<head>
    <title><?php echo \Core\Config::get('site_name');?></title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="/css/blogitto.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><?php echo \Core\Config::get('site_name');?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a <?php  if(\Core\App::getRouter()->getController() == 'posts') { ?> class='active'<?php }?>
                        href="/posts">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template">
        <?= $data['content']?>
        <br/>
        <br/>
        <?php echo(__('lng.test', 'Default localization text')); ?>
    </div>

</div>
</body>
</html>