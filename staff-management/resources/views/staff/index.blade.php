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
                <th>Action</th> <!-- New column for Action -->
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->surname }}</td>
                    <td>{{ $s->gender }}</td>
                    <td> <!-- New cell for Action -->
                        <form action="{{ route('staff.deploy') }}" method="POST">
                            @csrf
                            <input type="hidden" name="staffId" value="{{ $s->id }}">
                            <button type="submit">Deploy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
