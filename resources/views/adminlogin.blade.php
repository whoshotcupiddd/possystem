<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="{{ asset('css/editStaff.css') }}">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 0;
            }
            .navbar {
                background-color: #FEC883;
                overflow: hidden;
                display: flex;
                justify-content: flex-end;
                font-family: 'Poppins', sans-serif;
                padding: 25px 100px;
            }

            .navbar a {
                color: black;
                text-decoration: none;
                transition: color 0.3s;
                margin-left: 25px; /* Increased margin */
                font-size: 18px; /* Increased font size */
            }

            .navbar a:hover {
                color: #76bfb6;
            }

            .navbar a:first-child {
                margin-left: 0;
            }

            .main-wrapper {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            h2 {
                text-align: center;
                color: #333;
            }
            form {
                margin-top: 20px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                color: #333;
            }
            input[type="email"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            button[type="submit"] {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
            }
            button[type="submit"]:hover {
                background-color: #0056b3;
            }
            .error {
                color: red;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="{{ route('staff.index') }}">Staff Login</a>
            <a href="{{ route('staff.index') }}">Admin Login</a>
        </div>
        <div class="main-wrapper">
            <h2>Admin Login</h2>

            @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div>
                    <label for="staffEmail">Email:</label>
                    <input type="email" id="staffEmail" name="staffEmail" required>
                </div>
                <div>
                    <label for="staffPassword">Password:</label>
                    <input type="password" id="staffPassword" name="staffPassword" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>
