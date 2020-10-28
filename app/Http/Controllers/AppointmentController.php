<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs_links' => ['Businesses' => route('business.index'), 'Appointments' => route('appointments.index')],
            'appointments' => Appointment::incomplete()->get(),
        ];

        return view('appointment.index', $data);
    }
}