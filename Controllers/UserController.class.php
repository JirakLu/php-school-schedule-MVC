<?php

class UserController extends AController
{

    function process($params)
    {
        $this->headers = array(
            'title' => 'user page',
            'keyWords' => 'user',
            'description' => 'schedule for users'
        );

        $status = GeneratorModel::getData($params[0]);
        if ($status) $this->view = 'schedule';
        if (!$status) $this->redirect('/rozvrhProject/error');
    }
}
