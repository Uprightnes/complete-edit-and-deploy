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
            <th>Surname</th>
            <th>Othernames</th>
            <th>Gender</th>
            <th>Current Role</th>
            <th>Previous Feeder</th>
            <th>Current Region</th>
            <th>Current Department</th>
            <th>New Role</th>
            <th>New Feeder</th>
            <th>New Region</th>
            <th>Unit</th>
            <th>New Department</th>
            <th>Effective Deployment Date</th>
            <th>Email</th>
            <th>Current Reporting Line</th>
            <th>Current Regional MIS Email</th>
            <th>New Reporting Line Role</th>
            <th>New Reporting Line Email</th>
            <th>New Regional MIS Email</th>
            <th>Redeployment Type</th>
            <th>Relocation Allowance</th>
            <th>Action</th> <!-- New column for Action -->
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->surname }}</td>
                    <td>{{ $s->othername }}</td>
                    <td>{{ $s->gender }}</td>
                    <td>{{$s->currentrole}}</td>
                    <td>{{$s->previousfeeder}}</td>
                    <td>{{$s->currentregion}}</td>
                    <td>{{$s->currentdepartment}}</td>
                    <td>{{$s->newrole}}</td>
                    <td>{{$s->newfeeder}}</td>
                    <td>{{$s->newregion}}</td>
                    <td>{{$s->unit}}</td>
                    <td>{{$s->newdepartment}}</td>
                    <td>{{$s->effectivedeploymentdate}}</td>
                    <td>{{$s->email}}</td>
                    <td>{{$s->currentreportingline}}</td>
                    <td>{{$s->currentregionalmisemail}}</td>
                    <td>{{$s->newreportinglinerole}}</td>
                    <td>{{$s->newreportinglineemail}}</td>
                    <td>{{$s->newregionalmisemail}}</td>
                    <td>{{$s->redeploymenttype}}</td>
                    <td>{{$s->relocationallowance}}</td>
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
