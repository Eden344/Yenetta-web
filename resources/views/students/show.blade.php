<!-- resources/views/students/show.blade.php -->
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


    <title>YENETTA CODE-STUDENT DETAILS</title>
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
             <a href="/logout"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>



    <div class=" flex justify-center items-center h-screen ml-20 w-3/4">
    <div class=" w-3/4 p-6 shadow-lg bg-dark shadow-fossil rounded-md">

        <h1 class=" text-3xl text-center block font-bold text-white uppercase">Student Details</h1>
        <hr class="mt-3 text-white">
        <div class="mt-3">

            <div class="card">
                <div class="card-header text-center text-white uppercase text-3xl font-bold font-serif">
                    {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}
                </div>
                <div class="card-body">
                    <p class="mx-48 text-white my-4"><strong>Email:</strong> {{ $student->email }}</p>
                    <p class="mx-48 text-white my-4"><strong>Phone Number:</strong> {{ $student->phonenumber2 }}</p>
                    <p class="mx-48 text-white my-4"><strong>Gender:</strong> {{ ucfirst($student->gender) }}</p>
                    <p class="mx-48 text-white my-4"><strong>Age:</strong> {{ $student->age }}</p>
                    <p class="mx-48 text-white my-4"><strong>School:</strong> {{ $student->school }}</p>
                    <p class="mx-48 text-white my-4"><strong>Address:</strong> {{ $student->address }}</p>




    <div class="items-center mx-48">
    <span class="p-1 mx-1 text-xs  font-medium uppercase tracking-wider text-cobalt bg-white rounded-lg bg-opacity-50 ">
        <a href="{{ route('students.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
        </span>

        <span class="p-1 mx-1 text-xs  font-medium uppercase tracking-wider text-royal bg-white rounded-lg bg-opacity-50 ">
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square "></i></a>
        </span>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <span class="p-1 mx-1 text-xs  font-medium uppercase tracking-wider text-fossil bg-white rounded-lg bg-opacity-50 ">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')"><i class="fa-solid fa-trash"></i></button>
            </span>
 </div>


                    </form>
                </div>
            </div>
        </div>


        </div>

    </div>
    </div>




</body>
</html>

