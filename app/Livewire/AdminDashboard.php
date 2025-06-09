<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Component
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
