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
    <title>YENETTA CODE</title>
    <script src="https://cdn.tailwindcss.com"> </script>
    @vite ('resources/css/app.css')
    <style>
        .sidebar {
            width: 16rem;
        }
        .content {
            margin-left: 16rem;
        }
        .container{
            max-width: none;

        }
    </style>



</head>
<body>
    <header class="h-16 bg-dark">
        <div class="justify ml-4">

            <img src="img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

    <div class="flex h-screen">
        <div class="sidebar bg-fossil flex shadow-dark shadow-xl flex-col">


            <ul class="flex flex-col mt-6">
                <a href="/"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-chart-line"></i>Dashboard</li></a>
                <a href="/students"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                <a href="/schedules"> <li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                <a href="/attendance/mark"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                <a href="/logout"><li class="px-4 py-5 text-white hover:bg-cloud hover:text-fossil"><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>

        <div class="flex flex-col w-full ml-5 mt-10 mr-0 space-y-5 ">
            <div >
                <h1 class="font bold font-serif text-4xl mb-2 text-dark">STUDENT LIST</h1>
            </div>
            <div class=" ml-70 flex  justify-end ">
                <button class="rounded bg-dark h-8 w-48">
                    <a href="{{ route('students.create') }}" class="text-center font-serif text-white">Add New Student</a>
                </button>
            </div>
            @if ( $message = Session::get('success'))
            <div class=" mt-3">
                <span class="p-1 mx-1 text-xs font-medium uppercase tracking-wider text-white bg-parakeet rounded-lg bg-opacity-50 ">
                {{ $message }}
                </span>
            </div>
        @endif

        <table class="w-full mt-4">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr class="w-12 p-3">
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">First Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Last Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Gender</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Age</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Schedule</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Parent_Phone</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="bg-white mb-2 h-12">
                        <td class="p-3 text-sm text-gray-700">{{ $student->firstname }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->lastname }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->gender }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->age }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->schedule->name ?? 'No Schedule' }} ({{ $student->schedule->time_in ?? '' }} - {{ $student->schedule->time_out ?? '' }})</td>
                        <td class="p-3 text-sm text-gray-700">{{ $student->phonenumber1 }}</td>

                        <td class="p-3 text-sm text-gray-700">
                            <span class="p-1 mx-1 text-xs font-medium uppercase text-center tracking-wider text-cyber bg-bee rounded-lg bg-opacity-50 ">
                            <a href="{{ route('students.show', $student->id) }}" class="hover:underline"><i class="fa-solid fa-eye"></i></a>
                            </span>

                            <span class="p-1 mx-1 text-xs font-medium uppercase text-center tracking-wider text-royal bg-cobalt rounded-lg bg-opacity-50 ">
                            <a href="{{ route('students.edit', $student->id) }}" class="hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>
                            </span>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <span class="p-1 mx-1 text-xs font-medium uppercase text-center tracking-wider text-fossil bg-coin rounded-lg bg-opacity-50 ">
                                <button type="submit" class="hover:underline" onclick="return confirm('Are you sure you want to delete this student?')"><i class="fa-solid fa-trash"></i></button>
                                </span>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
