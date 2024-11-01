<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair Requests</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Repair Requests</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Device Model</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($repairRequests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->deviceModel->name }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <form action="{{ route('admin.updateRepairRequestStatus', $request->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status">
                                    <option value="in behandeling" {{ $request->status == 'in behandeling' ? 'selected' : '' }}>In Behandeling</option>
                                    <option value="voltooid" {{ $request->status == 'voltooid' ? 'selected' : '' }}>Voltooid</option>
                                </select>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
