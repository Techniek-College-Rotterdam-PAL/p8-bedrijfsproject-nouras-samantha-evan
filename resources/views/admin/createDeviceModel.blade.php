


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Device Model</title>
</head>
<body>
    <div class="container">
        <h1>Create Device Model</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.storeDeviceModel') }}" method="POST">
            @csrf
            <div>
                <label for="name">Model Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="type_id">Device Type:</label>
                <select name="type_id" id="type_id" required>
                    <option value="">Select a type</option>
                    @foreach ($deviceTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Create Model</button>
        </form>
    </div>
</body>
</html>
