<?php

class HomeController extends AController
{
    function process($params)
    {
        $this->headers = array(
            'title' => 'main page',
            'keyWords' => 'main',
            'description' => 'main web'
        );

        $this->view = 'home';
    }
}
