<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class FooterComponent extends Component
{
    public $name;
    public $email;
    public $message;

    public function contact(){
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->message = $this->message;
        $contact->save();
    }

    public function render()
    {
        return view('livewire.footer-component');
    }
}
