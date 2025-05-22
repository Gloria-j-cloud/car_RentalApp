<?php
session_start();

$_SESSION['first_name'];
$_SESSION['last_name'];
$_SESSION['email'];
$_SESSION['phone'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center text-primary mb-4">User Details</h1>
    <table class="table table-sm">

    <th>Name</th>
    <th>Email</th>
    <th>Phone number</th>

    <tr>
        <td><?= $_SESSION['first_name']. " " . $_SESSION['last_name'];?> </td>
        <td><?= $_SESSION['email'];?> </td>
        <td><?= $_SESSION['phone'];?> </td>
    </tr>
    </table>
</div>
</body>
</html>