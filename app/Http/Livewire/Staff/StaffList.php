<?php

namespace App\Http\Livewire\Staff;

use App\Models\Staff;

use Livewire\Component;

class StaffList extends Component
{
   public $staffId;
   public $search = '';
   public $action = ''; //flash
   public $message = ''; //flash

    protected $listeners = [
        'refreshParentStaff' => '$refresh',
        'deleteStaff',
        'editStaff',
        'deleteConfirmStaff',
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createStaff()
    {
        $this->emit('resetInputFields');
        $this->emit('openStaffModal');
    }
    
    public function editStaff($staffId)
    {
        $this->staffId = $staffId;
        $this->emit('staffId', $this->staffId);
        $this->emit('openStaffModal');
    }

    public function deleteStaff($staffId)
    {
        Staff::destroy($staffId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
         if (empty($this->search)) {
            $staffs  = Staff::all();
        } else {
            $staffs  = Staff::where('first_name', 'LIKE', '%' . $this->search . '%')->get();
        }
       

        return view('livewire.staff.staff-list', [
            'staffs' => $staffs,
        ]);
    }
}
