<?php

class PostsController
{
    public function index()
    {
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    public function getdata()
    {
        $posts = Post::get_data_to_table();
        require_once('views/posts/index.php');
    }
}