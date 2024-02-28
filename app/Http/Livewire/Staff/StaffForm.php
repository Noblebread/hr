<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Gender;
use App\Models\Staff;


class StaffForm extends Component
{
    public $staffId, $name, $address, $gender_id, $birthdate;
    
    public $action = '';  //flash
    public $message = '';  //flash
    
    protected $listeners = [
        'staffId',
        'resetInputFields',
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    
     //edit
     public function staffId($staffId)
     {
         $this->staffId = $staffId;
         $staff = Staff::whereId($staffId)->first();

         $this->name = $staff->name;
         $this->address= $staff->address;
         $this->gender_id = $staff->gender_id;
         $this->birthdate = $staff->birthdate;
        
     }
 
     //store
     public function store()
     {
         $data = $this->validate([
            
             'name' => 'required',
             'address' => 'required',
             'gender_id' => 'required',
             'birthdate' => 'nullable',
             
         ]);

         $bday = Carbon::parse($this->birthdate);
         $today = Carbon::now();
         $dif = $bday->diff($today);
         $data['age'] = $dif->y;
 
         if ($this->staffId) {
             Staff::whereId($this->staffId)->first()->update($data);
             $action = 'edit';
             $message = 'Successfully Updated';
         } else {
             Staff::create($data);
             $action = 'store';
             $message = 'Successfully Created';
         }
 
         $this->emit('flashAction', $action, $message);
         $this->resetInputFields();
         $this->emit('closeBorrowerModal');
         $this->emit('refreshParentStaff');
         $this->emit('refreshTable');
     }
 
    public function render()
    {
        $genders = Gender::all();
        return view('livewire.staff.staff-form',[
                'genders' => $genders
        ]);          
    }
}
