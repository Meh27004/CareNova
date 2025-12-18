<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    private $appointments = [
        ['id'=>1, 'patient'=>'Ali Khan', 'doctor'=>'Dr. Ahmed Ali', 'day'=>'Monday', 'time'=>'10:00 AM'],
        ['id'=>2, 'patient'=>'Sara Ahmed', 'doctor'=>'Dr. Sara Malik', 'day'=>'Tuesday', 'time'=>'02:00 PM'],
        ['id'=>3, 'patient'=>'Zara Iqbal', 'doctor'=>'Dr. Imran Khan', 'day'=>'Wednesday', 'time'=>'11:00 AM'],
    ];
 



private $billing = [
    ['id'=>1, 'patient'=>'Samia Khan', 'amount'=>9000, 'status'=>'Pending', 'date'=>'2025-12-01'],
    ['id'=>1, 'patient'=>'Abdul Rehman', 'amount'=>45000, 'status'=>'Pending', 'date'=>'2025-12-01'],
    ['id'=>1, 'patient'=>'Ali Khan', 'amount'=>5000, 'status'=>'Paid', 'date'=>'2025-12-01'],
    ['id'=>2, 'patient'=>'Sara Ahmed', 'amount'=>35000, 'status'=>'Pending', 'date'=>'2025-12-03'],
];
    public function dashboard() {
        return view('admin.dashboard', [
          
            'appointments' => $this->appointments,
        ]);
    }


    public function appointments() {
        return view('admin.appointments', ['appointments' => $this->appointments]);
    }


public function billing() {
    return view('admin.billing', ['billing'=>$this->billing]);
}
}

