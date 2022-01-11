<?php

class Day
{

    public array $day;

    public function __construct(array $day)
    {
        for ($i = 0; $i < 12; $i++) {
            if (array_key_exists($i,$day)) {
                $this->day[] = new LessonWrapper($day[$i]);
            } else {
                $this->day[] = new LessonWrapper(['free']);
            }
        }
    }
}
