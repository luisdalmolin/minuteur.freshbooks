<?php

namespace App\Commands;

use App\Freshbooks;
use App\Minuteur\MinuteurClient;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class PublishToFreshbooksCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'publish';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Publish the hours to freshbooks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Freshbooks $freshbooks, MinuteurClient $minuteurClient)
    {
        $summary = $minuteurClient->summaryFromProjects();
        $freshbooks->postHours($summary);

        $this->info('Hours successfully posted to freshbooks.');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule)
    {

    }
}
