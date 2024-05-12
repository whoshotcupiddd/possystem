<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Staff Leave</title>
    <link rel="stylesheet" href="{{ asset('css/editStaffLeave.css') }}">
</head>
<body>
<div class="navbar">
    <a href="{{ route('staff.index') }}">Manage Staff</a>
    <a href="{{ route('staffleaves.index') }}">Manage Staff Leaves</a>
    <a href="{{ route('staff.index') }}">Profile</a>
</div>
<div class="main-wrapper">
    <a href="{{ url('staffleaves') }}" class="back-button">Back</a>
    <div class="title"><h2>Edit Staff Leave</h2></div>
    <form method="post" action="{{ route('staffleaves.update', $staffLeave->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="staffCode">Staff Code:</label>
            <input type="text" name="staffCode" value="{{ $staffLeave->staffCode }}">
        </div>
        <div class="form-group">
            <label for="staffName">Staff Name:</label>
            <input type="text" name="staffName" value="{{ $staffLeave->staffName }}">
        </div>
        <div class="form-group">
            <label for="leaveType">Leave Type:</label>
            <input type="text" name="leaveType" value="{{ $staffLeave->leaveType }}">
        </div>
        <div class="form-group">
            <label for="numberOfLeaveDays">Number of Leave Days:</label>
            <input type="number" name="numberOfLeaveDays" value="{{ $staffLeave->numberOfLeaveDays }}">
        </div>
        <div class="form-group">
            <label for="fromDate">From Date:</label>
            <input type="date" name="fromDate" value="{{ $staffLeave->fromDate }}">
        </div>
        <div class="form-group">
            <label for="toDate">To Date:</label>
            <input type="date" name="toDate" value="{{ $staffLeave->toDate }}">
        </div>
        <p>
            <button type="submit">Update</button>
            <button type="reset">Cancel</button>
        </p>
    </form>
</div>
</body>
</html>
