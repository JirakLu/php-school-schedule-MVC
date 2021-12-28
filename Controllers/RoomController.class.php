<?php

class RoomController extends AController
{

    function process($params)
    {
        $this->headers = array(
            'title' => 'room page',
            'keyWords' => 'room',
            'description' => 'schedule for rooms'
        );

        $status = GeneratorModel::getData($params[0]);
        if ($status) $this->view = 'schedule';
        if (!$status) $this->redirect('/rozvrhProject/error');

    }
}