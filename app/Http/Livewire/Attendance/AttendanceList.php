<?php

namespace App\Http\Livewire\Attendance;

use Livewire\Component;

class AttendanceList extends Component
{
    public function createAttendance()
    {
        $this->emit('resetInputFields');
        $this->emit('openAttendanceModal');
    }

    public function render()
    {
        return view('livewire.attendance.attendance-list');
    }
}
