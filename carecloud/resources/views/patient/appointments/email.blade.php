<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Appointment Confirmed</h2>

<p>Dear {{ $appointment->name }},</p>

<p>Your appointment has been confirmed.</p>

<p>
Doctor: {{ $appointment->doctor->name }} <br>
Date: {{ $appointment->date }} <br>
Time: {{ $appointment->time }}
</p>

<p>Thank you!</p>

</body>
</html>