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
    <style>
        .sidebar {
            width: 250px;

        }
        .content {
            margin-left: 16rem;
        }
        .container{
            max-width: none;
        }
    </style>
    @vite ('resources/css/app.css')
    <title>YENETTA CODE-CREATE SCHEDULE</title>
</head>
<body>

    <header class="h-16 bg-dark w-full">
        <div class="justify ml-4">

            <img src="/img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>


    <div class="flex h-screen">
        <div class="sidebar  h-[110vh] bg-over shadow-dark shadow-xl flex flex-col">

            <ul class="flex flex-col mt-6">
                <a href="/"> <li class="px-4 py-5 font-bold text-fossil hover:bg-cloud "><i class="fa-solid px-3 fa-chart-line"></i>Dashboard</a></li>
                <a href="/students"><li class="px-4 py-5 font-bold text-fossil hover:bg-cloud "><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                <a href="/schedules"><li class="px-4 py-5 font-bold text-fossil hover:bg-cloud "><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                <a href="/attendance/mark"><li class="px-4 py-5 font-bold text-fossil hover:bg-cloud "><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                <a href="/logout"><li class="px-4 py-5 font-bold text-fossil hover:bg-cloud "><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>


        <div class="flex justify-center items-center h-screen ml-32 w-1/2">
        <div class=" w-1/2 p-6 shadow-lg bg-dark shadow-fossil rounded-md ml-32">
            <h2 class=" text-3xl text-center block font-bold text-white uppercase">Create Schedule</h2>
            <hr class="mt-3 text-white">
            <div class="mt-3">

                <form action="{{ route('schedules.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="block text-base mb-2 text-white ">Schedule Name:</label>
                        <input type="text" class="border border-over w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-over "l" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="time_in" class="block text-base mb-2 text-white">Time In:</label>
                        <input type="time" class="border border-over w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-over "l" id="time_in" name="time_in" required>
                    </div>
                    <div class="form-group mb-6">
                        <label for="time_out" class="block text-base mb-2 text-white ">Time Out:</label>
                        <input type="time" class="border border-over w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-over "l" id="time_out" name="time_out" required>
                    </div>
                    <div>
                        <button type="submit" class="border-2 border-over bg-over text-dark
                        py-1 w-full rounded-md hover:bg-dark hover:text-over font-semibold">Create Schedule</button>
                    </div>

                </form>

            </div>
        </div>


        </div>
        </div>


</body>
</html>






