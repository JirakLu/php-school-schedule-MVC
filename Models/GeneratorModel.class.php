<?php

class GeneratorModel {
    public static function getData($url) {
        try {
            $schedule = ScheduleModel::getScheduleAPI($url);
            $scheduleClass = new Schedule($schedule);
            $_SESSION['schedule'] = $scheduleClass->getWeek();
            $_SESSION['timeStamps'] = $scheduleClass->getTimeStamps();
            $_SESSION['login'] = $url;
            return true;
        } catch (Error) {
            return false;
        }
    }
}
