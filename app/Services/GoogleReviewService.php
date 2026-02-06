<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\GoogleReview;

class GoogleReviewService
{
    public function fetch()
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
            'place_id' => config('services.google.place_id'),
            'fields'   => 'reviews',
            'language' => 'it',
            'key'      => config('services.google.api_key'),
        ]);

        $reviews = $response['result']['reviews'] ?? [];

        foreach ($reviews as $review) {
            GoogleReview::updateOrCreate(
                ['review_id' => hash('sha256', $review['author_name'].$review['time'])],
                [
                    'author_name'   => $review['author_name'],
                    'rating'        => $review['rating'],
                    'text'          => $review['text'] ?? null,
                    'profile_photo' => $review['profile_photo_url'] ?? null,
                    'relative_time' => $review['relative_time_description'],
                ]
            );
        }
    }
}
