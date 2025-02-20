<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Computation Result</title>

    <style>
        body {
            font-family: Arial, sans-serif; 
        }
        .result-box {
            padding: 10px; 
            font-size: 24px; 
            font-weight: bold; 
            text-align: center; 
            border-radius: 5px; 
            display: inline-block;
            margin-top: 10px; 
        }
        /*  Kulay kapag EVEN number - Green background */
        .even { background-color: #4CAF50; color: white; }

        /*  Kulay kapag ODD number  */
        .odd-blue { color: #0000FF; font-weight: bold; }

        /*  Kulay kapag ODD number  */
        .odd-orange { color: #FFA500; font-weight: bold; }

        /*  Kulay kapag may ERROR  */
        .error { color: #FF0000; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Computation Result</h2> 

    @if(isset($error)) <!-- Check kung may error -->
        <p class="error">{{ $error }}</p> <!--  error message is kulay red -->
    @else
        <p>Value 1: <strong style="color: #FFA500;">{{ $num1 }}</strong></p> <!--  Value 1 - Orange -->
        <p>Value 2: <strong style="color: #0000FF;">{{ $num2 }}</strong></p> <!--  Value 2 - Blue -->
        <p>Operation: <strong>{{ ucfirst($operation) }}</strong></p> <!--  Operation na ginamit -->

        <p>Result:</p> 
        <div class="result-box 
            @if($result % 2 == 0) even 
            @elseif($num1 % 2 != 0 || $num2 % 2 != 0) odd-blue 
            @else odd-orange 
            @endif">
            {{ $result }} <!--  Ipapakita yung result -->
        </div>
    @endif

</body>
</html>
