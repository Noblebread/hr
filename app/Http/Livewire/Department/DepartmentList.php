<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;

class DepartmentList extends Component
{

    public $departmentId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentDepartment' => '$refresh',
        'deleteDepartment',
        'editdepartment',
        'deleteConfirmDepartment'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createDepartment()
    {
        $this->emit('resetInputFields');
        $this->emit('openDepartmentModal');
    }

    public function editDepartment($departmentId)
    {
        $this->departmentId = $departmentId;
        $this->emit('departmentId', $this->departmentId);
        $this->emit('openDepartmentModal');
    }
    
    public function deleteDepartment($departmentId)
    {
        Department::destroy($departmentId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $departments = Department::all();
        } else {
            $departments  = Department::where('name', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.department.department-list',[
            'departments' => $departments
        ]);
    }
}
