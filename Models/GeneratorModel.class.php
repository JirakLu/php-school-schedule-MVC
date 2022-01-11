<?php

class GeneratorModel {
    public static function getData($url): bool
    {
        $schedule = ScheduleModel::getScheduleAPI($url);
        if (is_array($schedule)) {
            $scheduleClass = new Schedule($schedule);
            $_SESSION['schedule'] = $scheduleClass->getSchedule();
            $_SESSION['timeStamps'] = $scheduleClass->getTimeStamps();
            $_SESSION['login'] = $url;
            return true;
        }
        return false;
    }
}
