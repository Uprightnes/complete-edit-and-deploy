<!-- resources/views/staff/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
</head>
<body>
    <h1>Staff List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->surname }}</td>
                    <td>{{ $s->gender }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <form action="{{ route('staff.deploy') }}" method="POST">
    @foreach($staff as $s)
        @csrf
        <input type="hidden" name="staffId" value="{{ $s->id }}">
        <button type="submit">Deploy</button>
        @endforeach
    </form>
</body>
</html>
