<?php

namespace App\Console\Commands;

use App\Mail\CustomerAppointments;
use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAppointmentEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_appointment:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email listing all of the customer call appointments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $appointments = Appointment::where('complete', 0)->get();
        Mail::to('markmurrin@mail.com')->send(new CustomerAppointments($appointments));
    }
}
