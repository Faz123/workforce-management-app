<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Dice | Workforce Management App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="antialiased mx-auto">
        <header class="bg-gradient-to-r from-purple to-purple-lighter">
            <div class="flex justify-between mx-auto max-w-screen-2xl py-6 px-2 md:px-0">
                <h1 class="text-5xl text-white">Dice</h1>
                @if (Route::has('login'))
                    <div class="py-4">
                        @auth
                            <a href="{{ url('/home') }}" class="text-l bg-white text-purple p-3 mx-2.5 rounded-md">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-l bg-white text-purple p-3 mx-2.5 rounded-md">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-l bg-white text-purple p-3 mx-2.5 rounded-md">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        <div class="py-4">
            <div class="mx-auto max-w-screen-2xl py-6 px-2 md:px-0">
                <h2 class="text-white text-4xl md:text-8xl py-2 antialiased font-bold ">Schedule.</h2>
                <h2 class="text-white text-4xl md:text-8xl py-2 antialiased font-bold " >Plan.</h2>
                <h2 class="text-white text-4xl md:text-8xl py-2 antialiased font-bold ">Work Together.</h2>
            </div>
        </div>
        </header>
        <main class="py-4">
            <h3 class="text-black text-3xl md:text-6xl py-8 md:py-8 text-center antialiased font-bold ">Workforce Management Software</h3>
            <div class="container xl:container mx-auto py-6 flex flex-col md:flex-row justify-between centre"> 
                <div class="flex-initial md:w-1/4 flex flex-col justify-between">
                    <img class="max-h-72" src="{{url('/images/home_image_1.svg')}}" alt="Image"/>
                    <div class="bg-purple rounded my-8">
                        <p class="text-white text-center text-2xl p-5 my-2 antialiased">
                            Manage your weekly timesheets. Have the right people, in the right place, at the right time.  
                        </p>
                    </div>
                </div>
                <div class="flex-initial md:w-1/4 flex flex-col justify-between">
                    <img src="{{url('/images/home_image_2.svg')}}" alt="Image"/>
                    <div class="bg-purple rounded my-8">
                        <p class="text-white text-center text-2xl p-5 my-2 antialiased">
                            Manage staff holiday time at the push of a button.
                        </p>
                    </div>
                </div>
                <div class="flex-initial md:w-1/4 flex flex-col justify-between">
                    <img src="{{url('/images/home_image_3.svg')}}" alt="Image"/>
                    <div class="bg-purple rounded my-8">
                        <p class="text-white text-center text-2xl p-5 my-2 antialiased">
                            Export timesheets to save time labouring over spreadsheets
                        </p>
                    </div>
                </div>
            </div>  
        </main>
        <footer>
            <div class="text-white text-center bg-gray-400">
                <p class="text-2xl py-6">Dice - Workforce Management Software</p>
            </div>
            <div class="bg-gray-800 py-8">
            <ul class="text-white text-2xl px-8 py-8">
                <li>link</li>
                <li>link</li>
                <li>link</li>
                <li>link</li>
            </ul>
            </div>
        </footer>
    </body>
</html>
