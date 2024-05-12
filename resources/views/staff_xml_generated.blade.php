<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Staff Report</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            h1 {
                background-color: #007bff;
                color: white;
                padding: 10px;
                text-align: center;
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

            .back-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #3a71a9;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
                margin-bottom: 20px;
            }

            .back-button:hover {
                background-color: #76bfb6;
            }
        </style>
    </head>
    <body>
        <div class="main-wrapper">
            <a href="{{ url('staff') }}" class="back-button">Back</a>
            <div></div>
            <!--    <h1>Staff XML Generated Successfully</h1>-->
            <!--    <a href="{{ url('/staff.html') }}">View Staff HTML</a>-->
            <iframe src="{{ url('/staff.html') }}" style="width: 100%; height: 600px;"></iframe>
        </div>
    </body>
</html>
