<?php

namespace App\Http\Livewire\Staff;

use App\Models\Department;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Gender;
use App\Models\Staff;
// use App\Models\Status;

class StaffForm extends Component
{
    public $staffId, $id_no, $first_name, $middle_name, $last_name, $contact_number, $gender_id, $birthdate, $age, $department_id;
    // public $status_id;
    
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
        $this->id_no = $staff->id_no;
        $this->first_name = $staff->first_name;
        $this->middle_name = $staff->middle_name;
        $this->last_name = $staff->last_name;
        $this->contact_number = $staff->contact_number;
        $this->gender_id = $staff->gender_id;
        $this->birthdate = $staff->birthdate;
        $this->age= $staff->age;
        $this->department_id = $staff->department_id;
        // $this->status_id = $staff->status_id;
     
            
     }
    
     //store
     public function store()
     {
         $data = $this->validate([
            
            'id_no' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'contact_number' => 'required',
            'gender_id' => 'required',
            'birthdate' => 'required',
            'age' => 'nullable',
            'department_id' => 'required',
            // 'status_id' => 'nullable',
             
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
        $departments = Department::all();
        // $statuses = Status::all();

        return view('livewire.staff.staff-form',[
                'genders' => $genders,
                'departments' => $departments
                // 'statuses' => $statuses
        ]);          
    }
}
