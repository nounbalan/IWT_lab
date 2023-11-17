<!DOCTYPE html>
<html>
<head>
    <title>Weather Application</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        #weatherInfo {
            width: 300px;
            margin: 0 auto;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input {
            width: 200px;
            padding: 5px;
        }

        button {
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        #weatherIcon {
            font-size: 48px;
        }
    </style>
</head>
<body>
    <h1>Weather Information</h1>
    
    <label for="cityInput">Enter City:</label>
    <input type="text" id="cityInput">
    <button id="searchButton">Search</button>
    
    <div id="weatherInfo">
        <p>City: <span id="city"></span></p>
        <p>Temperature: <span id="temperature"></span>°C</p>
        <p>Weather: <span id="description"></span> <i id="weatherIcon" class="fas"></i></p>
        <p>Humidity: <span id="humidity"></span>%</p>
        <p>Pressure: <span id="pressure"></span> hPa</p>
        <p>Wind Speed: <span id="windSpeed"></span> m/s</p>
        <p>Min Temperature: <span id="minTemperature"></span>°C</p>
        <p>Max Temperature: <span id="maxTemperature"></span>°C</p>
        <p>Sunrise: <span id="sunrise"></span></p>
        <p>Sunset: <span id="sunset"></span></p>
    </div>

    <script>
        $(document).ready(function () {
            $("#searchButton").click(function () {
                var city = $("#cityInput").val();
                getWeatherData(city);
            });

            function getWeatherData(city) {
                var apiKey = "42383d184f4123ac6c9940dacaeda4bb";
                var apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

                $.ajax({
                    url: apiUrl,
                    method: "GET",
                    success: function (data) {
                        $("#city").text(data.name);
                        $("#temperature").text(data.main.temp);
                        $("#description").text(data.weather[0].description);
                        $("#humidity").text(data.main.humidity);
                        $("#pressure").text(data.main.pressure);
                        $("#windSpeed").text(data.wind.speed);
                        $("#minTemperature").text(data.main.temp_min);
                        $("#maxTemperature").text(data.main.temp_max);
                        
                        // Set the weather icon based on the weather condition
                        var iconClass = getWeatherIconClass(data.weather[0].icon);
                        $("#weatherIcon").addClass(iconClass);

                        // Display sunrise and sunset times
                        var sunriseTime = new Date(data.sys.sunrise * 1000).toLocaleTimeString();
                        var sunsetTime = new Date(data.sys.sunset * 1000).toLocaleTimeString();
                        $("#sunrise").text(sunriseTime);
                        $("#sunset").text(sunsetTime);
                    },
                    error: function (error) {
                        alert("City not found. Please try again.");
                    }
                });
            }

            function getWeatherIconClass(iconCode) {
                var iconMap = {
                    "01d": "fa-sun",
                    "01n": "fa-moon",
                    "02d": "fa-cloud-sun",
                    "02n": "fa-cloud-moon",
                    "03d": "fa-cloud",
                    "03n": "fa-cloud",
                    "04d": "fa-cloud",
                    "04n": "fa-cloud",
                    "09d": "fa-cloud-showers-heavy",
                    "09n": "fa-cloud-showers-heavy",
                    "10d": "fa-cloud-sun-rain",
                    "10n": "fa-cloud-moon-rain",
                    "11d": "fa-bolt",
                    "11n": "fa-bolt",
                    "13d": "fa-snowflake",
                    "13n": "fa-snowflake",
                    "50d": "fa-smog",
                    "50n": "fa-smog",
                };

                return iconMap[iconCode] || "fa-question";
            }
        });
    </script>
</body>
</html>