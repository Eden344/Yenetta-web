<!-- resources/views/students/edit.blade.php -->

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
                <a href="/"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-chart-line"></i>Dashboard</li></a>
                <a href="/students"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                <a href="/schedules"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                <a href="/attendance/mark"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                <a href="/logout"> <li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"> <i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>

    <div class=" flex justify-center items-center h-screen ml-20 w-3/4">
        <div class=" w-3/4 p-6 shadow-lg bg-dark shadow-fossil rounded-md">
            <h1 class=" text-3xl text-center text-white uppercase block font-bold">Edit Student</h1>
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

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex">

            <div class="my-5 border-r-4 border-r-white">
                <h1 class="text-white text-center text-2xl font-bold">PARENT INFORMATION</h1>
                    <div class="my-6 mx-4">
                    <h1 class="mx-4 my-2 text-white font-bold">Parent's Full Name </h1>
                    <div class="flex gap-5">
                        <input type="text" name="parent_first_name" class="border border-gray-400 px-2 py-1 w-1/2 rounded-md" value="{{ $student->parent_first_name }}" placeholder="First Name">
                        <input type="text" name="parent_last_name" class="border border-gray-400 px-2 py-1 w-1/2 rounded-md" value="{{ $student->parent_last_name }}" placeholder="Last Name">
                    </div>

                </div>

                <div class="my-6 mx-4">
                    <h1 class="mx-4 my-2 text-white font-bold">Parent's Contact Information </h1>
             <div class="flex gap-5">
                <input type="email" name="parent_email" class="border border-gray-400 px-2 py-1 w-1/2 rounded-md" value="{{ $student->parent_email }}" >
                <input type="text" name="phonenumber1" class="border border-gray-400 px-2 py-1 w-1/2 rounded-md" value="{{ $student->phonenumber1 }}" >
             </div>

                </div>

                </div>


                <div class="my-5">
                    <h1 class="text-white text-center text-2xl font-bold">STUDENT INFORMATION</h1>
                <div class="my-6">
                    <h1 class="mx-4 my-2 text-white font-bold">Full Name </h1>
                    <div class="flex gap-5 mx-4">
                        <input type="text" name="firstname" class="border border-gray-400 px-2 py-1 w-1/3 rounded-md" value="{{ $student->firstname }}">
                        <input type="text" name="middlename" class="border border-gray-400 px-2 py-1 w-1/3 rounded-md" value="{{ $student->middlename }}">
                        <input type="text" name="lastname" class="border border-gray-400 px-2 py-1 w-1/3 rounded-md" value="{{ $student->lastname }}">

                    </div>
                </div>


                <div class="my-6">
                    <h1 class="mx-4 my-2 text-white font-bold">Contact Information</h1>
                    <div class="flex gap-5 mx-4">
                        <input type="email" name="email" class="border w-1/2  px-2 py-1 border-gray-400 rounded-md" value="{{ $student->email }}">

                        <input type="text" name="phonenumber2" class="border w-1/2  px-2 py-1 border-gray-400 rounded-md" value="{{ $student->phonenumber2 }}">

                    </div>
                </div>


              <div class="my-6">
                <h1 class="mx-4 my-2 text-white font-bold">Personal Information</h1>
                <div class="flex gap-5 mx-4">

                    <select name="gender" class="border w-1/2  px-2 py-1 border-gray-400 rounded-md">>
                        <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>

                    <input type="number" name="age" class="border w-1/2  px-2 py-1 border-gray-400 rounded-md " value="{{ $student->age }}">

                </div>
              </div>



              <div class="flex gap-5 m-4">
                <input type="text" name="school" class="border w-1/3 px-2 py-1 border-gray-400 rounded-md " value="{{ $student->school }}">
                <input type="text" name="address" class="border w-1/3 px-2 py-1 border-gray-400 rounded-md " value="{{ $student->address }}">
                <input type="number" name="fee" class="border w-1/3 px-2 py-1 border-gray-400 rounded-md " value="{{ $student->fee }}">

              </div>


                <div class="mx-4 mb-16">
                    <select name="schedule_id" id="schedule_id" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md" required>
                        <option value="">Select Schedule</option>
                        @foreach($schedules as $schedule)
                            <option value="{{ $schedule->id }}" {{ $student->schedule_id == $schedule->id ? 'selected' : '' }}>
                                {{ $schedule->name }} ({{ $schedule->time_in }} - {{ $schedule->time_out }})
                            </option>
                        @endforeach
                    </select>
                </div>
                </div>


            </div>

            <div class="h-6">
                <button type="submit"  class="bg-over text-dark rounded-md font-bold hover:border-over w-full hover:bg-dark hover:text-over text-center h-8 ">Update</button>
            </div>

        </form>
    </div>

            </div>
        </div>
    </div>






</body>
</html>


