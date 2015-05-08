<?php

namespace Blogitto;

use Core\Model;

class Post extends Model{
    public function getPosts(){
        $sql = "select * from posts";

        $result = $this->db->query($sql);
        return $result;
    }

    public  function  getById($id){
        $id = $this->db->escape($id);
        $sql = "select * from posts where id='{$id}' limit 1";
        $result = $this->db->query($sql);

        return isset($result[0]) ? $result[0]: null;
    }
} 