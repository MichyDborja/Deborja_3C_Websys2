<?php

namespace App\Http\Controllers; //  Para mahanap ng Laravel yung controller

use Illuminate\Http\Request; //  Kailangan para makuha yung data galing sa URL

class MathController extends Controller
{
    // Function para sa computation based sa operation na pinili
    public function calculate($operation, $num1, $num2)
    {
        $num1 = (int) $num1; 
        $num2 = (int) $num2; 
        $error = null; //  Dito ilalagay yung error message kung may mali
        $result = null; //  Dito ilalagay yung sagot sa computation

       
        switch ($operation) {
            case 'add': 
                $result = $num1 + $num2;
                break;
            case 'subtract': 
                $result = $num1 - $num2;
                break;
            case 'multiply': 
                $result = $num1 * $num2;
                break;
            case 'divide': 
                if ($num2 == 0) { //  Hindi pwede mag-divide sa zero, error!
                    $error = 'Error: Cannot be divided by Zero!';
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default: //  Kapag hindi valid yung operation, error message
                $error = 'Error: Invalid operation!';
        }

        //  Ibalik sa view file (Blade template)
        return view('result', [
            'operation' => $operation, //   (add, subtract, multiply, divide)
            'num1' => $num1, 
            'num2' => $num2, 
            'result' => $result, // Sagot sa computation
            'error' => $error // Error message 
        ]);
    }
}
