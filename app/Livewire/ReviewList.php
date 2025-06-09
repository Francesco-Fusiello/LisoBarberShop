<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;

class ReviewList extends Component
{
    public function render()
    {
        $reviews = Review::where('is_approved', true)->latest()->get();

        return view('livewire.review-list', compact('reviews'))
            ->layout('components.layout');
    }
}
