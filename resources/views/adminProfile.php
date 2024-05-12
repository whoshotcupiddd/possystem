<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            h1 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }
            .profile-details {
                margin-top: 20px;
            }
            .profile-details table {
                width: 100%;
                border-collapse: collapse;
            }
            .profile-details th, .profile-details td {
                padding: 8px;
                border-bottom: 1px solid #ddd;
            }
            .profile-details th {
                text-align: left;
                background-color: #f2f2f2;
            }

            table {
                font-size: 15px;
                border-collapse: collapse;
                background-color: white;
                width: 100%;
                box-shadow: 0 5px 10px;
                background-color: white;
                text-align: left;
                backdrop-filter: blur(7px);
                box-shadow: 0 .4rem .8rem #0005;
                border-radius: .8rem;
                overflow: hidden;
                margin-top: 5px;
            }

            th, td {
                padding: 1rem;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                font-weight: 700;
                border: none;
            }

            tr:nth-child(even) {
                background-color:#f0f6f6;
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
        </style>
    </head>
    <body>
        <div class="navbar">
            <!--            <a href="{{ route('staff.index') }}">Manage Staff</a>
                        <a href="{{ url('/profile/1') }}">Profile</a>-->
<!--            <a href="{{ route('admin.login') }}">Logout</a>-->
            <a >Manage Staff</a>
            <a>Profile</a>
            <a >Logout</a>
        </div>
        <div class="container">
            <h1>Profile</h1>
            <div class="profile-details">
                <table>
                    <tr>
                        <th>ID</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Staff Code</th>
                        <td>A100</td>
                    </tr>
                    <tr>
                        <th>Staff Name</th>
                        <td>PONG LO</td>
                    </tr>
                    <tr>
                        <th>Staff Type</th>
                        <td>admin</td>
                    </tr>
                    <tr>
                        <th>Staff Email</th>
                        <td>example@gmail.com</td>
                    </tr>
                    <tr>
                        <th>Deployment Date</th>
                        <td>2024-05-06</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
