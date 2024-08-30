<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite ('resources/css/app.css')
</head>
<body>
    <header class="bg-green-400 w-full h-14">
        YENETTA CODE
    </header>
    <main class=" flex w-full h-screen bg-indigo-600">
        <button> <a href="/login">Login</a></button>
       

        <button>
            <a href="/register">register</a>
        </button>
       
    </main>
    <footer>&copy; {{date('Y')}} Yenetta Code. All rights reserved.</footer>
</body>
</html>
