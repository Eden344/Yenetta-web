<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>YENETTA CODE</title>
    @vite ('resources/css/app.css')
</head>
<body>

    <header class="h-16 bg-dark">
        <div class="justify ml-4">

            <img src="img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

    <div class="flex justify-center items-center h-screen bg-white ">
        <div class=" w-96 p-6 shadow-lg bg-dark rounded-md">
            <h1 class=" text-3xl text-center block font-bold text-white"><i class="fa-solid fa-user"></i> WELCOME!!</h1>
            <hr class="mt-3 text-white">
            <div class="mt-3">

                <form action="/register-validation" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="username" class="block text-base mb-2 text-white ">Username</label>
                        <input type="text" name="username"
                        class="border border-coin w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-over "
                         value="{{ old('username') }}" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                        <label for="email" class="block text-base mb-2 text-white">Email</label>
                        <input type="text" name="email"
                        class="border border-coin w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-over "
                        value="{{ old('email') }}" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label for="password" class="block test-base mb-2 text-white">Password</label>
                        <input type="text" name="password"
                        class="border border-coin w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-over "
                         value="{{ old('password') }}" placeholder="Enter Password">
                    </div>
                    <div class=" mt-3">
                        <button type="submit" class="border-2 border-dark bg-over text-dark
                        py-1 w-full rounded-md hover:bg-dark hover:text-over font-semibold ">Register</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>
