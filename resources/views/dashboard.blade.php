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
            width: 250px;

        }
        .content {
            margin-left: 16rem;
        }

    </style>
</head>
<body class="bg-white">

    <header class="h-16 bg-dark">
        <div class="justify ml-4">

            <img src="img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

        <div class="flex h-screen">
            <div class="sidebar  h-[110vh] bg-over flex flex-col">


                <ul class="flex flex-col mt-6">
                   <a href="/">  <li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-chart-line"></i>Dashboard </li></a>
                 <a href="/students"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                   <a href="/schedules"> <li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                     <a href="/attendance/mark"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                      <a href="/logout"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
                </ul>
            </div>







            <div class=" flex-1 p-4 mt-8">

                    <h1 class="text-4xl font-bold text-dark mb-16">MY DASHBOARD</h1>


                <div class="flex m-3 items-center justify-between mb-4">
                    <div class="flex flex-wrap items-center ">

                            <div class="  w-72 h-20 text-center items-center  mx-3 my-3 bg-dark ">
                                <p class=" text-white font-bold text-2xl mt-4">
                                   Total students<i class="fa-solid fa-graduation-cap mx-1"></i>: {{ $student_count }}
                               </p></div>

                       <div class=" w-72 h-20 text-center  mx-3 my-3 bg-dark">
                           <p class="text-white font-bold text-2xl mt-4">
                               Total Schedules <i class="fa-solid fa-clock mx-1"></i>: {{ $schedule_count }}
                           </p></div>

                           <div class=" w-72 h-20 text-center  mx-3 my-3 bg-dark">
                               <p class="text-white font-bold text-2xl mt-4">
                                   Total Money Paid <i class="fa-solid fa-coins"></i> : {{$total_cash}}
                               </p>
                           </div>


                           <div class=" w-auto h-20 text-center  mx-3 my-3 bg-dark  ">
                            <p class="text-white font-bold text-2xl mt-4" >
                               Amount of unpaid students: {{$not_paid}}
                            </p>
                          </div>



                          @if($not_paid != 0)
                            <div class=" w-72 h-20 text-center  mx-3 my-3 bg-dark">
                                <a href="/unpaid_students">
                                    <p class="text-white font-bold text-2xl mt-4">
                                        Unpaid Students
                                    </p></a>
                                <br>
                            </div>
                            @else
                            <div class=" w-auto h-20 text-center  mx-3 my-3 bg-dark">
                                <p class="text-white font-bold text-2xl mt-4">All students have paid.</p>
                            </div>
                            @endif

                        </div>









                    </div>
                </div>
            </div>




    <footer></footer>
</body>
</html>
