<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    public function showForm(){
        return view('personal-info');
    }

    public function handleForm(Request $request)
    {
        $validate=$request->validate([
            'fname'=> 'required|string|max:50',
            'lname'=> 'required|string|max:50',
            'sex' => ['required', Rule::in(['Male', 'Female'])],
            'mobile' => ['required', 'regex:/^(0998|0999)-\d{3}-\d{3}$/'],
            'tel' => ['required', 'numeric'], 
            'birthdate' => ['required', 'date', 'date_format:Y-m-d'],
            'address' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'website' => ['required', 'url']

        ],
        [
            'fname.required' => 'The first name field is required.',
            'mobile.regex' => 'The mobile number format should be 0998-XXX-XXX or 0999-XXX-XXX.',
            'birthdate.date_format' => 'The birthdate must be in YYYY-MM-DD format.',
            'email.email' => 'Please enter a valid email address.',
            'website.url' => 'Please enter a valid website URL.',
        ]
    
    );

        $fname = $request -> input('fname');
        $lname = $request -> input ('lname');
       // return view('output',compact('fname'));

       return response()->json([
        'success' => true,
        'message' => 'Form submitted successfully',
        'data' => $validate
            ]);
    }
}
