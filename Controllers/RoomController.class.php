<?php

class RoomController extends AController
{

    function process($params)
    {
        $this->headers = array(
            'title' => 'teachers page',
            'keyWords' => 'teachers',
            'description' => 'schedule for teachers'
        );

        $status = GeneratorModel::getData($params[0]);
        if ($status) $this->view = 'schedule';
        if (!$status) $this->redirect('/rozvrhProject/error');

    }
}