<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNEED-IT</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="Your one-stop solution for all your IT needs.">
    <meta name="keywords" content="IT, repair, services, phones, laptops, PCs">
    @vite(["resources/css/app.ccs"])
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="img/logo.png" alt="UNEED-IT Logo">
            </div>
            <nav class="nav">
                <ul>
                    <x-navLinks>{{$slot}}</x-navLinks>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- here is the content for the index -->
    {{$slot}}

    <footer>
        <div class="container">
            <p>&copy; 2024 UNEED-IT. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>