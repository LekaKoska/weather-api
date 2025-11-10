**Weather App**

Weather App is a simple application that allows users to search for the current weather in a city. It fetches live data from a third-party Weather API and displays the current temperature and basic weather information.

Installation: 
1. **Clone the repository**:
```laravel
git clone https://github.com/your-username/weather-app.git
cd weather-app
```
2. **Install PHP dependencies**:
```laravel
composer install
```
3. **Copy .env file**:
```laravel
cp .env.example .env
```
4. **Set your Weather API key in .env**:
   
Find your key here: https://openweathermap.org/api
```laravel
WEATHER_API_KEY=your_api_key_here
```
5. **Generate Laravel application key**:
```laravel
php artisan key:generate
```
6. **Run database migrations**:
```laravel
php artisan migrate
```
7. **Start the local server**:
```laravel
php artisan serve
```

   
   
