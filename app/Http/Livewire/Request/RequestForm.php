<?php

namespace App\Http\Livewire\Request;


use App\Models\Request;

use Livewire\Component;
use App\Models\Borrower;

class RequestForm extends Component
{
    public $requestId, $user_id, $staff_id, $status_id;
    public $action = '';  //flash
    public $message = '';  //flash
    public $search = '';
    public $requestOption = '';

    protected $listeners = [
        'requestId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function requestId($requestId)
    {
        $this->requestId = $requestId;
        $request = Request::whereId($requestId)->first();
       
        $this->staff_id = $request->staff_id;
        $this->status_id = $request->status_id;
        // if ($request->tool_keys != null) {
        //     $this->toolItems = collect($request->tool_keys)->map(function ($toolKey) {
        //         return ['toolId' => $toolKey->tool_id];
        //     })->toArray();
        // } else {
        //     // If no branches are associated with the user, initialize an empty array
        //     $this->toolItems = [];
        // }
    }

    //store
    public function store()
    {
        // $data = $this->validate([
        //     'user_id' => 'nullable',
        //     'borrower_id' => 'required',
            
        // ]);
        // // Include the 'user_id' in the data array
        // $data['user_id'] = auth()->user()->id;
      

    //     if ($this->requestId) {
    //         $request = Request::whereId($this->requestId)->first()->update($data);

    //         $this->updateToolRequest($request);
    //         $action = 'edit';
    //         $message = 'Successfully Updated';
    //     } else {
    //         // When creating a new tool, set the 'user_id'
    //         $data['user_id'] = auth()->user()->id;
          

    //         // Update the tool status to 'Requested' (assuming 2 represents 'Requested')
    //         foreach ($this->toolItems as $item) {
    //             $toolId = isset($item['toolId']) ? $item['toolId'] : null;
    //             Tool::where('id', $toolId)->update(['status_id' => 2]);
    //         }

    //         $request = Request::create($data);

    //         $this->createToolRequest($request);

    //         $action = 'store';
    //         $message = 'Successfully Created';
    //     }

    //     $this->emit('flashAction', $action, $message);
    //     $this->resetInputFields();
    //     $this->emit('closeRequestModal');
    //     $this->emit('refreshParentRequest');
    //     $this->emit('refreshTable');
    }

    public function render()
    {
        
        // if (empty($this->search)) {
        //     $tools  = Tool::all();
        // } else {
        //     $tools  = Tool::where('brand', 'LIKE', '%' . $this->search . '%')->get();
        // }
        // //$tools = Tool::where('status_id', 1)->get();
        // $tools = Tool::all();
        // $borrowers = Borrower::all();
        return view('livewire.request.request-form', [
           
        ]);
    }

  

    
    // public function deleteTool($toolIndex)
    // {
    //     unset($this->toolItems[$toolIndex]);
    //     $this->toolItems = array_values($this->toolItems);
    // }

    // public function getToolIds()
    // {
    //     return array_map(function ($item) {
    //         return ['tool_id' => $item['toolId']];
    //     }, $this->toolItems);
    // }
}
