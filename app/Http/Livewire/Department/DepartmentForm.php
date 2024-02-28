<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class DepartmentForm extends Component
{

    public $departmentId, $name;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'departmentId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function departmentId($departmentId)
    {
        $this->departmentId = $departmentId;
        $department = Department::whereId($departmentId)->first();
        $this->name = $department->name;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'name' => 'required'
        ]);

        if ($this->departmentId) {
            Department::whereId($this->departmentId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Department::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeDepartmentModal');
        $this->emit('refreshParentDepartment');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.department.department-form');
    }
}
