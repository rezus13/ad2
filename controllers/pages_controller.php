<?php

class PagesController
{
    public function home()
    {
        $first_name = 'Peter';
        $last_name = 'Baryshevskiy';
        require_once('views/pages/home.php');
    }

    public function error()
    {
        require_once('views/pages/error.php');
    }
}