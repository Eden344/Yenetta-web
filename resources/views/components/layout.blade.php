<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yenetta Code</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#signin">Sign In</a></li>
                <li><a href="#register">Register</a></li>
            </ul>
        </nav>
    </header>
    {{$slot}}

    <footer>
        <p>&copy; <span id="date"></span> Yenetta Code. All rights reserved.</p>
    </footer>