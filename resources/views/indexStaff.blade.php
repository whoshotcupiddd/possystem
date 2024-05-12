<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{ asset('css/indexStaff.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('staff.index') }}">Manage Staff</a>
        <a href="{{ url('/profile/1') }}">Profile</a>
    </div>
    <div class="main-wrapper">
    
        
        <div class="title"><h2>Manage Staff List</h2></div>
        
    
         
        <div class="add-button">
            <a href="{{ route('staff.create') }}" class="btn-add">Add New Staff</a>
            <a href="{{ url('generate-staff-xml') }}" class="btn-xml">View Staff Report</a>
                
                </div>
        
            
        <div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Staff Code</th>
                        <th>Staff Name</th>
                        <th>Staff Type</th>
                        <th>Staff Email</th>
                        <th>Deployment Date</th>
<!--                        <th>Image</th>-->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff as $staffMember)
                    <tr>
                        <td>{{ $staffMember->id }}</td>
                        <td>{{ $staffMember->staffCode }}</td>
                        <td>{{ $staffMember->staffName }}</td>
                        <td>{{ $staffMember->staffType }}</td>
                        <td>{{ $staffMember->staffEmail }}</td>
                        <td>{{ $staffMember->deploymentDate }}</td>
<!--                        <td>
                            @if($staffMember->image)
                            <img src="{{ asset($staffMember->image) }}" alt="Staff Image" style="max-width: 100px; max-height: 100px;">
                            @else
                            No Image
                            @endif
                        </td>-->
                        
                        <td>
                            <div class="button-group">
                            <a href="{{ route('staff.edit', $staffMember->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('staff.destroy', $staffMember->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
