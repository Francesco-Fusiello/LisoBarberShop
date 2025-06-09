<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Review;

class ReviewManager extends Component
{
    public $filter = 'all';

    public function setFilter($value)
    {
        $this->filter = $value;
    }

    public function toggleApproval($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = !$review->is_approved;
        $review->save();

        session()->flash('message', 'Lo stato della recensione è stato aggiornato.');
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();
        session()->flash('message', 'Recensione eliminata con successo.');
    }

    public function render()
    {
        $query = Review::query()->latest();

        if ($this->filter === 'approved') {
            $query->where('is_approved', true);
        } elseif ($this->filter === 'unapproved') {
            $query->where('is_approved', false);
        }

        $reviews = $query->get();

        return view('livewire.admin.review-manager', compact('reviews'));
    }
}
