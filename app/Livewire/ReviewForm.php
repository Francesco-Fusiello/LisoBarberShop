<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewForm extends Component
{
    public $name, $content, $rating;

    protected $rules = [
        'name' => 'required|min:2',
        'content' => 'required|min:10',
        'rating' => 'required|integer|min:1|max:5',
    ];

    public function submit()
    {
        $this->validate();

        Review::create([
            'name' => $this->name,
            'content' => $this->content,
            'rating' => $this->rating,
            'is_approved' => false,
        ]);

        
        session()->flash('message', "Grazie la vostra opinione è fondamentale per noi! Sarà visibile dopo l'approvazione dei nostri amministratori");

       
        $this->reset(['name', 'content', 'rating']);
        
        
        $this->dispatch('closeModal');
        

    }

    public function render()
    {
        return view('livewire.review-form')->layout('components.layout');
    }
}
