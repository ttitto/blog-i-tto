<?php

namespace Blogitto;

use Core\App;
use Core\Controller;

class PostsController extends Controller
{
    public   function  __construct($data = array()){
        parent::__construct($data);
        $this->model = new Post();
    }

    public function  index()
    {
        $this->data['posts'] = $this->model->getPosts();
    }

    public  function  view(){
        $params = App::getRouter()->getParams();

        if(isset($params[0])){
            $id = strtolower($params[0]);
            $this->data['post'] =$this->model->getById($id);
        }
    }
} 