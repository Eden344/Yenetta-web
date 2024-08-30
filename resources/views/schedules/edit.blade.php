<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @extends('layouts.app')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"> </script>
    <style>
        .sidebar {
            width: 16rem;
        }
        .content {
            margin-left: 16rem;
        }
    </style>
    @vite ('resources/css/app.css')

    <title>YENETTA CODE</title>

</head>
<body>

    <header class="h-16 bg-dark w-full">
        <div class="justify ml-4">

            <img src="/img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

    <div class="flex h-screen">
        <div class="sidebar bg-fossil flex shadow-dark shadow-xl flex-col">

            <ul class="flex flex-col mt-6">
                <a href="/"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-chart-line"></i>  Dashboard</li></a>
                <a href="/students"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-user-graduate"></i>   Students</li></a>
                <a href="/schedules"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                <a href="/attendance/mark"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                <a href="/logout"> <li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"> <i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>

            <div class=" flex justify-center items-center h-screen ml-36 w-1/2">
                <div class=" w-3/4 p-6 shadow-lg bg-dark shadow-fossil rounded-md">
                    <h1 class=" text-3xl text-center text-white uppercase block font-bold">Edit Schedule</h1>
                     <hr class="mt-3 text-white">
                     <div class="mt-3">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="p-1 mx-1 text-xs font-medium uppercase text-white bg-candy rounded-lg bg-opacity-50 ">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group flex gap-3 my-5">
                            <label for="name" class="text-white">Schedule Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $schedule->name) }}" class="px-2 py-4 rounded-md h-8 w-auto border-1 border-over" required>
                        </div>

                        <div class="form-group my-5">
                            <label for="time_in" class="text-white">Time In:</label>
                            <input type="time" id="time_in" name="time_in" value="{{ old('time_in', $schedule->time_in) }}" class="px-2 py-2 rounded-md h-10 w-auto border-1 border-over " required>
                        </div>

                        <div class="form-group my-5">
                            <label for="time_out" class="text-white">Time Out:</label>
                            <input type="time" id="time_out" name="time_out" value="{{ old('time_out', $schedule->time_out) }}" class="px-2 py-2 rounded-md h-10 w-auto border-1 border-over" required>
                        </div>


                        <div class=" mt-5  ">
                            <button type="submit" class="uppercase rounded-md w-full py-1 bg-over hover:bg-dark text-dark hover:text-over font bold">Update Schedule</button>
                        </div>

                    </form>
                </div>





                     </div>

                </div>

        </div>
    </div>

</body>
</html>










