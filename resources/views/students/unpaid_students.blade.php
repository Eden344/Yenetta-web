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
    <style>
        .sidebar {
            width: 16rem;
        }
        .content {
            margin-left: 16rem;
        }

    </style>
    <title>YENETTA CODE</title>
</head>
<body class="bg-white">

    <header class="h-16 bg-dark">
        <div class="justify ml-4">

            <img src="img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

    <div class="flex h-screen">
        <div class="sidebar bg-fossil shadow-dark shadow-xl flex flex-col">


            <ul class="flex flex-col mt-6">
               <a href="/">  <li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-chart-line"></i>Dashboard </li></a>
             <a href="/students"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
               <a href="/schedules"> <li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                 <a href="/attendance/mark"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                  <a href="/logout"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>

        <div class=" flex justify-center items-center h-screen ml-20 w-3/4">
            <div class=" w-3/4 p-6 shadow-lg bg-dark shadow-fossil rounded-md">
                <h1 class=" text-2xl text-center block font-bold text-white uppercase">NAMES OF STUDENTS WHO HAVEN'T PAID</h1>
                <hr class="mt-3 text-white">
                <div class="mt-3">

                    <ul class="m-4">
                        @foreach ($students as $student)
                        @if (is_null($student->fee) || (int)$student->fee === 0)
                            <li class="text-white font bold uppercase text-xl text-center">{{ $student->firstname . " " . $student->middlename . " " . $student->lastname.":-".$student->phonenumber1 }}</li>
                        @endif
                        @endforeach

                    </ul>



                </div>



            </div>



        </div>


    </div>





</body>
</html>
