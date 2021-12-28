<?php

class Schedule
{

    private array $week;
    private array $timeStamps;
    const DAYS = ["Po", "Út", "St", "Čt", "Pá"];

    public function __construct(array $data)
    {
        foreach ($data["items"] as $key => $day) {
            $dayClass = new Day($day, $key);
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

    public function getWeek(): array
    {
        return $this->week;
    }

    public function getTimeStamps(): array
    {
        return $this->timeStamps;
    }



    public function createHtml(): string
    {
        $html = "<div class='schedule'>";
        $html .= $this->createTimeStamps();
        $html .= $this->createDates();
        foreach ($this->week as $week) {
            $html .= $week->createHtml();
        }
        $html .= "</div>";
        return $html;
    }

    private function createTimeStamps(): string
    {
        $stamps = "";
        foreach ($this->timeStamps as $stamp) {
            $order = $stamp["order"] + 2;
            $from = $stamp["from"];
            $to = $stamp["to"];
            $number = $order - 2;
            $stampl = "<div class='timeStamp-wrapper' style='grid-row: 1; grid-column: $order'  >
                    <div class='timeStamp'>
                        <p class='from'>$from</p>
                        <p class='to'>$to</p>
                        <p class='order'>$number</p>
                    </div>
            </div>";
            $stamps .= $stampl;
        }
        return $stamps;
    }

    private function createDates(): string
    {
        $row = 2;
        $days = "";
        foreach (self::DAYS as $day) {
            $days .= "<div class='day-wrapper' style='grid-row: $row; grid-column: 1'>
                <div class='day'>
                    <p class='date'>$day</p>
                </div>
            </div>";
            $row++;
        }
        return $days;
    }

}
