

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    
<div class="container mt-5">
<form action="processes/register-process.php" method="POST">
  
   <input type="text" name="first_name" placeholder="Enter First Name" class="form-control shadow-sm mt-3">
 
   <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control shadow-sm mt-3">
    
   <input type="tel" name="phone" placeholder="Enter phone number" class="form-control shadow-sm mt-3">
      
   <input type="email" name="email" placeholder="Enter email" class="form-control shadow-sm mt-3">
   <input type="submit" name="submit" value="submit" class="btn btn-primary mt-3">


</form>
</div>


</body>

</html>