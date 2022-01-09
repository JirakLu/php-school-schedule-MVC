<?php

class LessonWrapper
{

    public array $lessons;
    private int $column;
    private int $row;

    public function __construct(array $lessons, int $column, int $row)
    {
        $this->column = $column;
        $this->row = $row + 1;

        foreach ($lessons as $lesson){
            if ($lesson != 'free') {
                $room = '';
                $subject = '';
                $group = '';
                $change = '';
                $teacher = '';
                $week = '';
                if (array_key_exists('room',$lesson)) {
                    $room = str_replace(["(", ")"], "", $lesson["room"]);
                }
                if (array_key_exists('subject',$lesson)) {
                    $subject = str_replace(["(", ")"], "", $lesson["subject"]);
                }
                if (array_key_exists('group',$lesson)) {
                    $group = str_replace(["(", ")"], ["S", ""], $lesson["group"]);
                }
                if (array_key_exists('change',$lesson)) {
                    $change = $lesson["change"] == "change";
                }
                if (array_key_exists('teacher',$lesson)) {
                    $teacher = $lesson["teacher"];
                }
                if (array_key_exists('week',$lesson)) {
                    $week = str_replace(" ","",$lesson["week"]);
                }
                $this->lessons[] = new Lesson($room, $subject, $group, $change, false, $teacher, $week);
            } else {
                $this->lessons[] = new Lesson('','','','',true,'','');
            }
        }

    }

    public function createHtml(): string
    {
        $html = "<div class='lesson-wrapper' style='grid-row: " . $this->row + 1 . "; grid-column: " . $this->column + 2 . "'>";
        foreach ($this->lessons as $lesson) {
            $html .= $lesson->createHtml();
        }
        $html .= "</div>";
        return $html;
    }
}
