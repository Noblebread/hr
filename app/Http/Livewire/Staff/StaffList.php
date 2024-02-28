<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Livewire\Component;

class StaffList extends Component
{
    // public $staffId;
    // public $search = '';
   
    // public $action = ''; //flash
    // public $message = ''; //flash

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

    public function render()
    {
        // $staffsQuery = [];
    

        // if (!empty($this->search)) {
        //     $staffsQuery = User::role(['staff'])->where(function ($query) {
        //         $query
        //             ->where('first_name', 'LIKE', '%' . $this->search . '%')
        //             ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
        //     });

        //             $staffs = $staffsQuery->get();
       

        return view('livewire.staff.staff-list', [
          
            // 'staffs' => $staffs,
        ]);
    }
}
