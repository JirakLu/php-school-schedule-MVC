<?php

use JetBrains\PhpStorm\Pure;

class Day
{

    public array $day;

    public function __construct(array $day, int $row)
    {

        for ($i = 0; $i < 12; $i++) {
            if (array_key_exists($i,$day)) {
                $this->day[] = new LessonWrapper($day[$i], $i, $row);
            } else {
                $this->day[] = new LessonWrapper(['free'], $i, $row);
            }
        }
    }

    public function createHtml(): string
    {
        $html = "";
        foreach ($this->day as $lesson) {
            $html .= $lesson->createHtml();
        }
        return $html;
    }

}
