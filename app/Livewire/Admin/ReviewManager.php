<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Review;

class ReviewManager extends Component
{
    public function toggleApproval($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = !$review->is_approved;
        $review->save();
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();
    }

    public function render()
    {
        $reviews = Review::latest()->get();
        return view('livewire.admin.review-manager', compact('reviews'));
    }
}

