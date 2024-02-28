<?php

namespace App\Http\Livewire\Departure;

use Livewire\Component;

class DepartureList extends Component
{

    public function createDeparture()
    {
        $this->emit('resetInputFields');
        $this->emit('openDepartureModal');
    }

    public function render()
    {
        return view('livewire.departure.departure-list');
    }
}
