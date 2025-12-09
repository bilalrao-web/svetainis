<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;

class Contact extends Component
{
    // Form fields
    public $name;
    public $email;
    public $message;

    // Success message property
    public $successMessage;

    // Validation rules
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    /**
     * This function runs when the form is submitted.
     */
    public function submitForm()
    {
        // Validate the form fields
        $this->validate();
        // Create a new entry in the database
        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Reset the form fields
        $this->reset(['name', 'email', 'message']);

        // Set the success message
        $this->successMessage = __('messages.message_sent_success');
    }

    /**
     * Render the component view.
     */
    public function render()
    {
        return view('livewire.contact')->layout('layouts.app');
    }
}

