<!-- resources/views/staff/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Details PDF</title>
</head>
<body>
    <h1>Staff Details</h1>
    <p><strong>ID:</strong> {{ $staff->id }}</p>
    <p><strong>Name:</strong> {{ $staff->name }}</p>
    <p><strong>Surname:</strong> {{ $staff->surname }}</p>
    <p><strong>Gender:</strong> {{ $staff->gender }}</p>
</body>
</html>
