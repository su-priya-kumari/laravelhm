<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function indexclinic()
    {
        return view('admin.add_clinic');
    }
    
    public function showClinicUpdatePage()
    {
        $records = Clinic::all();
        return view('admin.update_clinic', compact('records'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'clinic_name'=>'required',
            'address'=>'required',
            'state'=>'required',
            'country'=>'required',
            'contact'=>'required',
            'specialization'=>'required',
        ]);

        Clinic::create([
            'clinic_name'=> $request->clinic_name,
            'address'=> $request->address,
            'state'=> $request->state,
            'country'=> $request->country,
            'contact'=> $request->contact,
            'specialization'=> $request->specialization,
        ]);
        return redirect()->back()->with('message','Inserted Successfully');
    }
}
