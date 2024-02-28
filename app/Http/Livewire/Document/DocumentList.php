<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;

class DocumentList extends Component
{

    public function createDocument()
    {
        $this->emit('resetInputFields');
        $this->emit('openDocumentModal');
    }

    public function render()
    {
        return view('livewire.document.document-list');
    }
}
