<?php
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
   
     function store(Request $req)
    {
        $data=$req->validate([
            'hospital' => 'required',
            'doctor'   => 'required',
            'date'     => 'required',
            'time'     => 'required',
            'name'     => 'required',
            'phone'    => 'required',
        ]);                                    

        Appointment::create($request->all());

        return redirect()->back()->with('success', 'Appointment Booked Successfully!');
    }

//      function register(Request $req){
//         $data=$req->validate([
//             'name'=>"required",
//             'email'=>"required|email|unique:users,email",
//             'password'=>"required",
           

//         ]);


//         $user=user::create($data);
//         if($user){
//             return redirect()->route('login')->with('success','Registration Successful');
//         }else{
//             return back()->with('fail','Something went wrong');
//     }
    
// }
}
