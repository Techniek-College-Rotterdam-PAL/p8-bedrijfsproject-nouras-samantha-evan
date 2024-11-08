@extends('components.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Beheer gebruikers</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('admin.manageUsers') }}" class="mb-4">
            <input type="text" name="email" placeholder="Search by email" value="{{ request('email') }}" class="border border-gray-300 rounded p-2 mr-2">
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Zoeken</button>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b border-gray-300 text-left">ID</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Naam</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Email</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Role</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <form action="{{ route('admin.updateUserRole', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <select name="role_id" required class="border border-gray-300 rounded p-1">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="ml-2 bg-blue-500 text-white rounded px-3 py-1">Update Role</button>
                                </form>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <!-- Additional action buttons can be added here -->
                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Weet jij zeker dat je deze gebruiker wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-2 bg-red-500 text-white rounded px-3 py-1">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
@endsection
