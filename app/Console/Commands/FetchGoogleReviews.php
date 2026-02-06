<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoogleReviewService;

class FetchGoogleReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:google-reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Google reviews and store them in the database';

    /**
     * Execute the console command.
     */
    public function handle(GoogleReviewService $service): void
    {
        $this->info('Fetching Google reviews...');
        $service->fetch();
        $this->info('Google reviews fetched successfully!');
    }
}
