<?php

class Schedule
{

    private array $week;
    private array $timeStamps;

    public function __construct(array $data)
    {
        if (!$data["items"]) return false;

        foreach ($data["items"] as $day) {
            $dayClass = new Day($day);
            $this->week[] = $dayClass;
        }

        $stamps = [];
        foreach ($data["hours"] as $key => $hours) {
            $stamp = ["order" => $key, "from" => $hours["from"], "to" => $hours["to"]];
            $stamps[] = $stamp;
        }

        array_pop($stamps);
        $this->timeStamps = $stamps;
    }

    public function getSchedule(): array
    {
        return $this->week;
    }

    public function getTimeStamps(): array
    {
        return $this->timeStamps;
    }

}
