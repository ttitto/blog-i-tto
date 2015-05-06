<?php
\Blogitto\Config::set('site_name', 'Blog-i-tto');
\Blogitto\Config::set('languages', array('en', 'bg'));

\Blogitto\Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_',
    'user' => 'user_'
));

\Blogitto\Config::set('default_route', 'default');
\Blogitto\Config::set('default_language', 'en');
\Blogitto\Config::set('default_controller', 'Posts');
\Blogitto\Config::set('default_action', 'index');