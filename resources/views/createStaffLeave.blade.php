<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add New Staff Leave</title>
    <link rel="stylesheet" href="{{ asset('css/createStaffLeave.css') }}">
</head>
<body>
<div class="navbar">
    <a href="{{ route('staff.index') }}">Manage Staff</a>
    <a href="{{ route('staff.index') }}">Manage Staff Leaves</a>
    <a href="{{ route('staff.index') }}">Profile</a>
</div>
<div class="main-wrapper">
    <a href="{{ url('staff') }}" class="back-button">Back</a>
    <div class="title"><h2>Add New Staff Leave</h2></div>
    <form method="post" action="{{ url('staffleaves') }}">
        @csrf
        <div class="form-group">
            <label for="staffCode">Staff Code:</label>
            <input type="text" name="staffCode" value="{{ old('staffCode') }}">
            @error('staffCode')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="staffName">Staff Name:</label>
            <input type="text" name="staffName" value="{{ old('staffName') }}">
            @error('staffName')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <!-- Add other fields according to the schema -->
        <div class="form-group">
            <label for="leaveType">Leave Type:</label>
            <input type="text" name="leaveType" value="{{ old('leaveType') }}">
            @error('leaveType')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="numberOfLeaveDays">Number of Leave Days:</label>
            <input type="number" name="numberOfLeaveDays" value="{{ old('numberOfLeaveDays') }}">
            @error('numberOfLeaveDays')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fromDate">From Date:</label>
            <input type="date" name="fromDate" value="{{ old('fromDate') }}">
            @error('fromDate')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="toDate">To Date:</label>
            <input type="date" name="toDate" value="{{ old('toDate') }}">
            @error('toDate')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <p>
            <button type="submit">Save</button>
            <button type="reset">Cancel</button>
        </p>
    </form>
</div>
</body>
</html>
