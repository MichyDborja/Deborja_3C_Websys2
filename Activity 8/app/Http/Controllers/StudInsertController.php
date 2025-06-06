<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class StudInsertController extends Controller
{
    public function insertform(){
        return view('stud_create');
    }

    public function insert(Request $request){
        $name = $request->input('stud_name');
        DB::insert('insert into student (name) values(?)',[$name]);
        echo "Record inserted Successfully.<br>";
        echo '<a href> = "?insert"> Click Here</a> to go back.';
    }
}