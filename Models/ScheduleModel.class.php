<?php

class ScheduleModel {

    static function getScheduleAPI(string $class){
        return FetchData::fetch($class);
    }

}