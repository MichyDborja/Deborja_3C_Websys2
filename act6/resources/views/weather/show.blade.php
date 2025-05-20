<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather in 3 Cities</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 40px;
        color: #333;
    }

    .row {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 40px;
        flex-wrap: wrap;
    }

    .card {
        width: 300px;
        padding: 25px;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .card h2 {
        margin-top: 0;
        color: #007BFF;
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .card p {
        margin: 8px 0;
        font-size: 1rem;
        color: #555;
    }

    @media (max-width: 900px) {
        .row {
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 80%;
        }
    }
</style>

</head>
<body>
    <h1 style="text-align:center;">Weather in 3 Cities</h1>
    <div class="row">
        @foreach($weatherData as $data)
            <div class="card">
                <h2>{{ $data['city'] }}</h2>
                @if(isset($data['error']))
                    <p>{{ $data['error'] }}</p>
                @else
                    <p><strong>Temperature:</strong> {{ $data['temperature'] }} °C</p>
                    <p><strong>Description:</strong> {{ $data['description'] }}</p>
                    <p><strong>Humidity:</strong> {{ $data['humidity'] }}%</p>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
