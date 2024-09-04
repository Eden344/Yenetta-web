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
@vite ('resources/css/app.css')
    @extends('layouts.app')


    <style>
        .sidebar {
            width: 250px;

        }
        .content {
            margin-left: 16rem;
        }
    </style>

    <title>YENETTA CODDE-SCHEDULES</title>
</head>
<body>

    <header class="h-16 bg-dark w-full">
        <div class="justify ml-4">

            <img src="img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

    <div class="flex h-screen">
        <div class="sidebar  h-[110vh] bg-over flex shadow-dark shadow-xl flex-col">

            <ul class="flex flex-col mt-6">
                <a href="/"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-chart-line"></i>Dashboard</a></li>
                 <a href="/students"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                <a href="/schedules"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                 <a href="/attendance/mark"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                <a href="/logout"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>


    <div class="flex flex-col w-full ml-5 mt-10 mr-0 space-y-5">
        <div>
            <h2 class="font bold font-serif text-2xl mb-4 text-dark uppercase">Schedules</h2>

        </div>
        <div class=" Schedule Detail ml-70 flex  justify-end ">

                <a href="{{ route('schedules.create') }}" class="text-center font-serif text-white"><button class="rounded bg-dark h-8 w-48">
                    Create Schedule  </button></a>


        </div>


        <table class="w-full mt-4">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr class="w-12 p-3">
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Time In</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Time Out</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                </tr>
            </thead>
            @if($schedules->isEmpty())
            <span class="p-1 mx-1 text-xs font-medium uppercase tracking-wider text-white bg-parakeet rounded-lg bg-opacity-50 ">
        <p>No schedules available.</p>
            </span>
    @endif
            <tbody>
                @foreach($schedules as $schedule)
                <tr class="bg-white mb-2 h-12">
                    <td class="p-3 text-sm text-gray-700">{{ $schedule->name }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $schedule->time_in }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $schedule->time_out }}</td>
                    <td class="p-3 text-sm text-gray-700">

                        <span class="p-1 mx-1 text-xs font-medium uppercase tracking-wider text-royal bg-cobalt rounded-lg bg-opacity-50 ">
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="hover:underline"> <i class="fa-solid fa-pen-to-square"></i>

                        </a>
                        </span>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <span class="p-1 mx-1 text-xs font-medium uppercase tracking-wider text-fossil bg-coin rounded-lg bg-opacity-50 ">
                            <button type="submit" class="hover:underline"><i class="fa-solid fa-trash"></i></button>
                            </span>
                        </form>

                        <span class="p-1 mx-1 text-xs font-medium uppercase tracking-wider text-cyber bg-bee rounded-lg bg-opacity-50 ">
                        <a href="{{ route('schedules.students', $schedule->id) }}" class="hover:underline"><i class="fa-solid fa-eye"></i></a>
                        </span>
                    </td>
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






