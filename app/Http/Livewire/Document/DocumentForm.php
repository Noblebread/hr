<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;

class DocumentForm extends Component
{


    public function createRequest()
    {
        $this->emit('resetInputFields');
        $this->emit('openRequestModal');
    }
    
    public function render()
    {
        return view('livewire.document.document-form');
    }
}
