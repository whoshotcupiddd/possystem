<!-- editStaff.blade.php -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Staff Details</title>
        <link rel="stylesheet" href="{{ asset('css/editStaff.css') }}">
    </head>
    <body>
        <div class="navbar">
        <a href="{{ route('staff.index') }}">Manage Staff</a>
        <a href="{{ route('staff.index') }}">Manage Products</a>
        <a href="{{ route('staff.index') }}">Profile</a>
    </div>
        <div class = "main-wrapper">
            <a href="{{ url('staff') }}" class="back-button">Back</a>
            <h2>Edit Staff Details</h2><br />
            <form method="post" action="{{ route('staff.update', $staffMember->id) }}">

                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                    <label for="staffCode">Staff Code: </label>
                    <input type="text" name="staffCode" value="{{ $staffMember->staffCode }}">
                </div>
                <div class="form-group">
                    <label for="staffName">Staff Name: </label>
                    <input type="text" name="staffName" value="{{ $staffMember->staffName }}">
                </div>
                <div class="form-group">
                    <label for="staffPassword">Staff Password: </label>
                    <input type="password" name="staffPassword" >
                </div>
                <div class="form-group">
                    <label for="staffType">Staff Type: </label>
                    <input type="text" name="staffType" value="{{ $staffMember->staffType }}">
                </div>
                <div class="form-group">
                    <label for="staffEmail">Staff Email: </label>
                    <input type="email" name="staffEmail" value="{{ $staffMember->staffEmail }}">
                </div>
                <div class="form-group">
                    <label for="deploymentDate">Deployment Date: </label>
                    <input type="date" name="deploymentDate" value="{{ $staffMember->deploymentDate }}">
                </div>
<!--                <div class="form-group">
                    <label for="image">Staff Image: </label>
                    <input type="file" name="image">
                </div>-->
                <p>
                    <button type="submit" style="margin-left: 38px">Update</button>
                    <button type="reset">Cancel</button>
                </p>
            </form>
        </div>
    </body>
</html>
