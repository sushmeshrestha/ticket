<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppor Ticket Information</title>
</head>
<body>
    <p>
        Thank you {{ ucfirst($user->name) }} for contacting our support team. A support ticket has been opened for you. You will be notified when a response is made by email. The details of your ticket are shown below:
    </p>


    <p>
        You can view the ticket at any time at {{ url('tickets/') }}
    </p>



<a href="http://127.0.0.1:8000/users">Username</a>

</body>
</html>
