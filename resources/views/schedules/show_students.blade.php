<!-- resources/views/schedules/schedule_students.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"> </script>
    @extends('layouts.app')
    <style>
        .sidebar {
            width: 16rem;
        }
        .content {
            margin-left: 16rem;
        }
    </style>
    @vite ('resources/css/app.css')
    <title>YENETTA CODE-SCHEDULE DETAILS</title>

</head>
<body>

    <header class="h-16 bg-dark w-full">
        <div class="justify ml-4">

            <img src="/img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>


    <div class="flex h-screen">
        <div class="sidebar bg-fossil shadow-dark shadow-xl flex flex-col">

            <ul class="flex flex-col mt-6">
                 <a href="/"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-chart-line"></i>Dashboard</a></li>
                 <a href="/students"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                 <a href="/schedules"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                 <a href="/attendance/mark"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                 <a href="/logout"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>




    <div class="flex flex-col w-full ml-5 mt-10 mr-0 space-y-5 ">

        <div>
            <h1 class="font bold font-serif text-4xl mb-4 text-white uppercase">Schedule Detail</h1>

        </div>


        <!-- Display Schedule Information -->
        <div class="mt-10">
                <h2 class="font-serif font-bold uppercase text-dark text-3xl">{{ $schedule->name }}</h2>
        </div>

        <!-- Display List of Students in This Schedule -->
        <span class="p-1 mx-1 text-xs font-medium uppercase tracking-wider text-white bg-parakeet rounded-lg bg-opacity-50  ">
            <h3 class="font-serif font-bold">Students Enrolled in This Schedule</h3>
        </span>

        @if(count($schedule->students) == 0)
        <div class="text-ruby font-medium">No students are enrolled.</div>
        @else
        <table class="w-full mt-4">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr class="w-12 p-3">
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">First Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Middle Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Last Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Email</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Phone Number</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Gender</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Age</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Time In</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left"> Time Out</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($schedule->students as $student)
                <tr class="p-3 text-sm text-gray-700">
                    <td class="p-3 text-sm text-gray-700">{{ $student->firstname }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $student->middlename }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $student->lastname }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $student->email }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $student->phonenumber }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $student->gender }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->age }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $schedule->time_in }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $schedule->time_out }}</td>
                    </tr>
                    @endforeach
                    @endif

            </tbody>
        </table>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var rows = document.querySelectorAll ('tr');
          rows.forEach(function(row, index) {
            if (index % 2 == 0) {
              row.classList.add('bg-gray-300');
            }
          });
        });
      </script>
</body>
</html>
