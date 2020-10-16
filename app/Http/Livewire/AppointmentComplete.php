<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentComplete extends Component
{
    public $appointmentId;

    public function render()
    {
        return view('livewire.appointment-complete');
    }

    public function toggle()
    {
        $appointment = Appointment::find($this->appointmentId);
        $appointment->toggle();
        $appointment->save();
    }
}
