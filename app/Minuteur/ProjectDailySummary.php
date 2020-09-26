<?php

namespace App\Minuteur;

use Carbon\Carbon;

class ProjectDailySummary
{
    /** @var string */
    protected $projectName;

    /** @var int */
    protected $time;

    /** @var \Carbon\Carbon */
    protected $date;

    /** @var string */
    protected $notes;

    public function __construct($projectName, $time, $date, $notes)
    {
        $this->projectName = $projectName;
        $this->time = $time;
        $this->date = Carbon::parse($date);
        $this->notes = $notes;
    }

    public function getProjectName(): string
    {
        return $this->projectName;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function getTimeInDecimalHours(): float
    {
        return round($this->time / 60 / 60, 2);
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function getNotesFormated(): string
    {
        return str_replace(', ', "\n\n", $this->notes);
    }
}
