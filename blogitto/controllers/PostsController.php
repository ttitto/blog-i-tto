<?php

namespace Blogitto;

use Core\App;
use Core\Controller;

class PostsController extends Controller
{
    public function  index()
    {
        $this->data['test_content'] = 'All public posts';
    }

    public  function  view(){
        $params = App::getRouter()->getParams();

        if(isset($params[0])){
            $id = strtolower($params[0]);
            $this->data['content'] = "Here will be visualized public post with ID = $id";
        }
    }
} 