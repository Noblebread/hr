<?php

namespace App\Http\Livewire\Document;

use App\Models\Document;
use App\Models\Type;
use App\Models\Category;
use App\Models\Department;
use Livewire\Component;

class DocumentForm extends Component
{

    public $documentId, $name, $type_id, $department_id;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'documentId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function documentId($documentId)
    {
        $this->documentId = $documentId;
        $document = Document::whereId($documentId)->first();
        $this->name = $document->name;
        $this->type_id = $document->type_id;
        $this->department_id = $document->department_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'name' => 'required',
            'type_id' => 'required',
            'department_id' => 'required'

        ]);

        if ($this->documentId) {
            Document::whereId($this->documentId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Document::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeDocumentModal');
        $this->emit('refreshParentDocument');
        $this->emit('refreshTable');
    }
    
    public function render()
    {
        $types = Type::all();
        $departments = Department::all();
        $categories = Category::all();

        return view('livewire.document.document-form',[
            'types' => $types,
            'departments' => $departments,
            'categories' => $categories
            // 'statuses' => $statuses
    ]);          
    }
}
