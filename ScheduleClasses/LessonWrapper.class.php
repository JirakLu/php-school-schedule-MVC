<?php

class LessonWrapper
{

    public array $lessons;

    public function __construct(array $lessons)
    {

        foreach ($lessons as $lesson) {
            if ($lesson === 'free'){
                $this->lessons[] = new Lesson('','','','', '',true,'','');
            } else {
                $this->lessons[] = new Lesson(
                    array_key_exists('room',$lesson) ? str_replace(["(", ")"], "", $lesson["room"]) : '',
                    array_key_exists('subject',$lesson) ? str_replace(["(", ")"], "", $lesson["subject"]) : '',
                    array_key_exists('group',$lesson) ? str_replace(["(", ")"], ["S", ""], $lesson["group"]) : '',
                    array_key_exists('cls', $lesson) ? $lesson['cls'] : '',
                    array_key_exists('change', $lesson) && $lesson["change"] == "change",
                    false,
                    array_key_exists('teacher',$lesson) ? $lesson["teacher"] : '',
                    array_key_exists('week',$lesson) ? str_replace(" ","",$lesson["week"]) : ''
                );
            }
        }

    }

}
