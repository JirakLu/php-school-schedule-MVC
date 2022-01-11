<?php

class Lesson
{

    public string $room;
    public string $teacher;
    public string $subject;
    public string $group;
    public string $week;
    public string $class;
    public bool $change;
    public bool $free;

    public function __construct(string $room, string $subject, string $group, string $class, bool $change, bool $free, string $teacher, string $week)
    {
        $this->room = $room;
        $this->teacher = $teacher;
        $this->subject = $subject;
        $this->group = $group;
        $this->change = $change;
        $this->class = $class;
        $this->free = $free;
        $this->week = $week;
    }

    public function createHtml(): void
    {
        $free = $this->free ? 'free' : '';
        $change = $this->change ? 'change' : '';
        $combined = $this->week.$this->subject;

        echo "<div class='lesson $free $change'>";

            if (!empty($combined)) echo "<p class='subject'>$combined</p>";
            if (!empty($this->room)) echo "<p class='room'>$this->room</p>";
            if (!empty($this->teacher)) echo "<p class='teacher'>$this->teacher</p>";
            if (!empty($this->group)) echo "<p class='group'>$this->group</p>";
            if (!empty($this->class)) echo "<p class='tryda'>$this->class</p>";

        echo '</div>';
    }


}
