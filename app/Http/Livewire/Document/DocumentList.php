<?php

namespace App\Http\Livewire\Document;

use App\Models\Document;
use Livewire\Component;

class DocumentList extends Component
{
    public $documentId;
   public $search = '';
   public $action = ''; //flash
   public $message = ''; //flash

    protected $listeners = [
        'refreshParentDocument' => '$refresh',
        'deleteDocument',
        'editDocument',
        'deleteConfirmDocument',
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createDocument()
    {
        $this->emit('resetInputFields');
        $this->emit('openDocumentModal');
    }
    
    public function editDocument($documentId)
    {
        $this->documentId = $documentId;
        $this->emit('documentId', $this->documentId);
        $this->emit('openDocumentModal');
    }

    public function deleteDocument($documentId)
    {
        Document::destroy($documentId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }
    

    public function render()
    {
        if (empty($this->search)) {
            $documents  = Document::all();
        } else {
            $documents  = Document::where('name', 'LIKE', '%' . $this->search . '%')->get();
        }
        
        return view('livewire.document.document-list', [
            'documents' => $documents,
        ]);
    }
}
