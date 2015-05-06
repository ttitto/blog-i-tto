<?php
\Core\Config::set('site_name', 'Blog-i-tto');
\Core\Config::set('languages', array('en', 'bg'));

\Core\Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_',
    'user' => 'user_'
));

\Core\Config::set('default_route', 'default');
\Core\Config::set('default_language', 'en');
\Core\Config::set('default_controller', 'Posts');
\Core\Config::set('default_action', 'index');