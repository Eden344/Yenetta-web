<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>YENETTA CODE-ATTENDANCE REPORT</title>
</head>
<body>


    <header class="h-16 bg-dark w-full">
        <div class="justify ml-4">

            <img src="/img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

    <div class="flex h-screen">
        <div class="sidebar bg-fossil shadow-dark shadow-xlflex flex-col">

            <ul class="flex flex-col mt-6">
                <a href="/"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-chart-line"></i>Dashboard</a></li>
                <a href="/students"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                <a href="/schedules"> <li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                 <a href="/attendance/mark"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                <a href="/logout"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li>
            </ul>
        </div>


        <div class="flex flex-col w-full ml-5 mt-10 mr-0 space-y-10 ">

            <div>
                <h1 class="font bold font-serif text-4xl mb-4 text-dark uppercase">Attendance Report</h1>
                @if (session()->has('success'))
                <div>{{session('success')}}</div>
                @endif
            </div>

        <table class="w-full mt-4 ">
            <thead  class="bg-gray-50 border-b-2 border-fossil">
                <tr class="w-12 p-3">
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">First Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Middle Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Last Name</th>
                    @foreach ($dates as $date)
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">{{ $date }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="p-3 text-sm text-gray-700">
                        <td class="p-3 text-sm text-gray-700">{{ $student->firstname }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->middlename }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->lastname }}</td>
                        @foreach ($dates as $date)
                            <td class="p-3 text-sm text-gray-700">
                                {{ $attendanceStatus[$student->id][$date] }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
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




