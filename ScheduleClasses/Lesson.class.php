<?php

class Lesson
{

    public string $room;
    public string $teacher;
    public string $subject;
    public string $group;
    public string $week;
    public bool $change;
    public bool $free;

    private string $file = "./view/templates/lesson.phtml";

    public function __construct(string $room, string $subject, string $group, bool $change, bool $free, string $teacher, string $week)
    {
        $this->room = $room;
        $this->teacher = $teacher;
        $this->subject = $subject;
        $this->group = $group;
        $this->change = $change;
        $this->free = $free;
        $this->week = $week;
    }

    public function createHtml(): string
    {
        $array = ["room" => $this->room, "teacher" => $this->teacher, "subject" => $this->subject, "group" => $this->group, "change" => $this->change];
        extract($array);
        ob_start();
        include($this->file);
        return ob_get_clean();
    }


}
