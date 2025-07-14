<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Review;

class ReviewManager extends Component
{
    public $reviewToDelete = null;

    public $filter = 'all';
    public $message;

    public function mount()
    {
        $this->message = null;
    }

    public function setFilter($value)
    {
        $this->filter = $value;
    }

    public function toggleApproval($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = !$review->is_approved;
        $review->save();

        $this->message = 'Lo stato della recensione è stato aggiornato.';
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();
        $this->message = 'Recensione eliminata con successo.';
    }

    public function confirmDelete()
{
    if ($this->reviewToDelete) {
        Review::findOrFail($this->reviewToDelete)->delete();
        $this->message = 'Recensione eliminata con successo.';
        $this->reviewToDelete = null;
    }
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
