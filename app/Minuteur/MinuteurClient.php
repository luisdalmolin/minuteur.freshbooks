<?php

namespace App\Minuteur;

use Exception;
use App\Hr\Summary;
use Freshbooks\FreshBooksApi;
use Illuminate\Support\Facades\Http;

class MinuteurClient
{
    public const PORT = 22507;

    /**
     * Get the a list grouped by date for each project .
     */
    public function summaryFromProjects(): array
    {
        $summary = Http::get(sprintf('http://localhost:%s/api/projects/summary/daily', self::PORT));

        return array_map(function ($item) {
            return new ProjectDailySummary($item['name'], $item['time'], $item['date'], $item['description']);
        }, $summary->json());
    }
}
