<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoogleReviewService;

class FetchGoogleReviews extends Command
{
    protected $signature = 'fetch:google-reviews';
    protected $description = 'Fetch Google reviews and stats';

    public function handle(GoogleReviewService $service)
    {
        $this->info('Fetching Google reviews...');
        $service->fetch();
        $this->info('Done!');
    }
}
