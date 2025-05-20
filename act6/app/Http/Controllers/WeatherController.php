<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weather(Request $request)
    {
        $city1 = $request->query('c1', 'London');
        $city2 = $request->query('c2', 'London');
        $city3 = $request->query('c3', 'London');

        $cities = [$city1, $city2, $city3];
        $apiKey = env('OPENWEATHER_API_KEY');
        $weatherData = [];

        foreach ($cities as $city) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $weatherData[] = [
                    'city' => $city,
                    'temperature' => $data['main']['temp'],
                    'description' => $data['weather'][0]['description'],
                    'humidity' => $data['main']['humidity']
                ];
            } else {
                $weatherData[] = [
                    'city' => $city,
                    'error' => 'Could not fetch weather data.'
                ];
            }
        }

        return view('weather.show', ['weatherData' => $weatherData]);
    }
}

