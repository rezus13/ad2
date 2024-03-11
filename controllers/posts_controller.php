<?php

class PostsController
{
    public function index()
    {
        // we store all the posts in a variable
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    public function getdata()
    {
        // we store all the posts in a variable
        $posts = Post::get_data_to_table();
        require_once('views/posts/index.php');
    }
}