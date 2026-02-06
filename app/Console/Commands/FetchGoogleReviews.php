<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\GoogleReview;
use App\Models\GoogleReviewStat;

class GoogleReviewService
{
    public function fetch()
    {
        $placeId = env('GOOGLE_PLACE_ID');
        $apiKey = env('GOOGLE_MAPS_KEY');
        $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&fields=reviews,rating,user_ratings_total&language=it&key={$apiKey}";

        $response = Http::get($url)->json();

        if(isset($response['result']['reviews'])) {
            $reviews = $response['result']['reviews'];

            // svuota vecchie recensioni
            GoogleReview::truncate();

            // salva le ultime 5 recensioni
            foreach(array_slice($reviews, 0, 5) as $review) {
                GoogleReview::create([
                    'review_id' => $review['author_url'] ?? $review['time'],
                    'author_name' => $review['author_name'],
                    'rating' => $review['rating'],
                    'text' => $review['text'] ?? null,
                    'profile_photo' => $review['profile_photo_url'] ?? null,
                    'relative_time' => $review['relative_time_description'],
                    'from_google' => true,
                ]);
            }

            // aggiorna statistiche globali
            GoogleReviewStat::updateOrCreate(
                ['id' => 1],
                [
                    'total_reviews' => $response['result']['user_ratings_total'] ?? count($reviews),
                    'average_rating' => $response['result']['rating'] ?? collect($reviews)->avg('rating'),
                ]
            );
        }
    }
}
