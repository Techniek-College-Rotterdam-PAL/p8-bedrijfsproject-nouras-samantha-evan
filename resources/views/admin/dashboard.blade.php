<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <ul>
            <li><a href="{{ route('admin.repairRequests') }}">View Repair Requests</a></li>
            <li><a href="{{ route('admin.manageUsers') }}">Manage Users</a></li>
        </ul>
    </div>
</body>
</html>
