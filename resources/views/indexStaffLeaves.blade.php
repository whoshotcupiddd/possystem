
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Staff Leaves Index Page</title>
    <link rel="stylesheet" href="{{ asset('css/indexStaffLeave.css') }}">
</head>
<body>
<div class="navbar">
    <a href="{{ route('staff.index') }}">Manage Staff</a>
    <a href="{{ route('staffleaves.index') }}">Manage Staff Leaves</a>
    <a href="{{ route('staff.index') }}">Profile</a>
</div>
<div class="main-wrapper">
    <div class="title"><h2>Manage Staff Leave List</h2></div>
    <div class="add-button">
        <a href="{{ route('staffleaves.create') }}" class="btn-add">Add New Staff Leave</a>
    </div>
    <div class="container">
        <br />
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Staff Code</th>
                    <th>Staff Name</th>
                    <th>Leave Type</th>
                    <th>Number of Leave Days</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffLeaves as $staffLeave)
                <tr>
                    <td>{{ $staffLeave->staffCode }}</td>
                    <td>{{ $staffLeave->staffName }}</td>
                    <td>{{ $staffLeave->leaveType }}</td>
                    <td>{{ $staffLeave->numberOfLeaveDays }}</td>
                    <td>{{ $staffLeave->fromDate }}</td>
                    <td>{{ $staffLeave->toDate }}</td>
                    <td>
                        <a href="{{ route('staffleaves.edit', $staffLeave->id) }}">Edit</a>
                        <form action="{{ route('staffleaves.destroy', $staffLeave->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
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
