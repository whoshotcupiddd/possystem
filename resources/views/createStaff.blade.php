<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add New Product</title>
    <link rel="stylesheet" href="{{asset('css/createStaff.css')}}">
</head>
<body>
<div class="navbar">
    <a href="{{ route('staff.index') }}">Manage Staff</a>
    <a href="{{ route('staff.index') }}">Manage Products</a>
    <a href="{{ route('staff.index') }}">Profile</a>
</div>
<div class="main-wrapper">
    <a href="{{ url('staff') }}" class="back-button">Back</a>
    <div class="title"><h2>Add New Staff</h2></div>
    <form method="post" action="{{ url('staff') }}">
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
        <div class="form-group">
            <label for="staffPassword">Staff Password:</label>
            <input type="password" name="staffPassword">
            @error('staffPassword')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="staffType">Staff Type:</label>
            <input type="text" name="staffType" value="{{ old('staffType') }}">
            @error('staffType')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="staffEmail">Staff Email:</label>
            <input type="email" name="staffEmail" value="{{ old('staffEmail') }}">
            @error('staffEmail')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deploymentDate">Deployment Date:</label>
            <input type="date" name="deploymentDate" value="{{ old('deploymentDate') }}">
            @error('deploymentDate')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
<!--        <div class="form-group">
            <label for="image">Staff Image:</label>
            <input type="file" name="image">
            @error('image')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>-->
        <p>
            <button type="submit">Save</button>
            <button type="reset">Cancel</button>
        </p>
    </form>
</div>
</body>
</html>
