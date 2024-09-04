<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"> </script>
    <style>
        .sidebar {
            width: 250px;
        }
        .content {
            margin-left: 16rem;
        }
    </style>
    @vite ('resources/css/app.css')
    <title>YENETTA CODE-MARK ATTENDANCE</title>
</head>
<body class="bg-white">

    <header class="h-16 bg-dark w-full ">
        <div class="justify ml-4">

            <img src="/img/logo.png" alt="Your Image" class="h-16 w-24">
        </div>

    </header>

    <div class="flex h-screen">
        <div class="sidebar  h-[110vh] bg-over shadow-dark shadow-xl flex flex-col">

            <ul class="flex flex-col mt-6">
                <a href="/"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-chart-line"></i>Dashboard</li></a>
                <a href="/students"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-user-graduate"></i>Students</li></a>
                <a href="/schedules"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-calendar-days"></i>Schedule</li></a>
                <a href="/attendance/mark"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-clipboard-user"></i>Attendance</li></a>
                <a href="/logout"><li class="px-4 py-5 font-bold text-dark hover:bg-cloud "><i class="fa-solid px-3 fa-right-from-bracket"></i>Logout</li></a>
            </ul>
        </div>


        <div class="flex flex-col w-full ml-5 mt-10 mr-0 space-y-10 ">
            <div>
                <h1 class="font bold font-serif text-4xl mb-4 text-dark">Mark Attendance</h1>
            </div>


            <form action="{{ route('attendance.mark') }}"  method="POST">
                @csrf
                <table class="w-full mt-4">
                    <thead class="bg-dash border-b-2 ">
                        <tr class="w-12 p-3">
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">First Name</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Middle Name</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Last Name</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Present</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr class="p-3 text-sm text-gray-700">
                                <td class="p-3 text-sm text-gray-700">{{ $student->firstname }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $student->middlename }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $student->lastname }}</td>
                                <td class="p-3 text-sm text-gray-700"><input type="date" name="attendance[{{ $student->id }}][date]" value="{{ today()->toDateString() }}"></td>
                                <td class="p-3 text-sm text-gray-700"><input type="checkbox" name="attendance[{{ $student->id }}][present]" value="1"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-6">
                    <button type="submit" class="bg-dark rounded-md text-over text-center font-bold border-2 border-dark
                     hover:bg-over hover:text-dark w-16 h-9  hover:border-dark">Submit</button>
                </div>

            </form>

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
