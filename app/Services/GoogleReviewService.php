<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\GoogleReview;
use App\Models\GoogleReviewStat;

class GoogleReviewService
{
    public function fetch(): void
    {
        $placeId = config('services.google.place_id');
        $apiKey  = config('services.google.api_key');

        $response = Http::get(
            'https://maps.googleapis.com/maps/api/place/details/json',
            [
                'place_id' => $placeId,
                'fields'   => 'reviews,rating,user_ratings_total',
                'language' => 'it',
                'key'      => $apiKey,
            ]
        )->json();

        if (!isset($response['result'])) {
            return;
        }

        $result = $response['result'];

        /* =====================================================
         |  STATISTICHE GLOBALI (SEMPRE)
         |===================================================== */
        GoogleReviewStat::updateOrCreate(
            ['id' => 1],
            [
                'total_reviews'  => (int) ($result['user_ratings_total'] ?? 0),
                'average_rating' => (float) ($result['rating'] ?? 0),
            ]
        );

        /* =====================================================
         |  RECENSIONI (SOLO SE ESISTONO)
         |===================================================== */
        if (!empty($result['reviews'])) {
            GoogleReview::truncate();

            foreach (array_slice($result['reviews'], 0, 5) as $review) {
                GoogleReview::create([
                    'review_id'     => hash('sha256', $review['author_name'].$review['time']),
                    'author_name'   => $review['author_name'],
                    'rating'        => $review['rating'],
                    'text'          => $review['text'] ?? null,
                    'profile_photo' => $review['profile_photo_url'] ?? null,
                    'relative_time' => $review['relative_time_description'],
                    'from_google'   => true,
                ]);
            }
        }
    }
}
