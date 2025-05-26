<?php 
    
    require_once "config/db-connect.php";
    $id = $_GET['id'];

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: cars.php");
    exit();
  };

  if(($_GET['id'] >1000)) {
    header("Location: cars.php");
    exit();
  }; 

    $sql = "SELECT * FROM cars WHERE  car_id= ? ";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$id]);
    $selectedCar=$stmt->fetch(PDO::FETCH_ASSOC);


 
    /*
    [
        [
        'id' => 1,
        'make' => 'toyota',
        'model' => 'corolla',
        'year' => '2020',
        'daily_rate' => '$30',
        'status' => 'available',
        ],


        [
        'id' => 2,
        'make' => 'Honda',
        'model' => 'civic',
        'year' => '2015',
        'daily_rate' => '$20',
        
        'status' => 'available',
        ],

        [
        'id' => 3,
        'make' => 'benz c-30',
        'model' => 'mercedes',
        'year' => '2018',
      
        'daily_rate' => '$40',
        'status' => 'rented',
        ],

        [
        'id' => 4,
        'make' => 'accord',
        'model' => 'civic',
        'year' => '2011',
       
        'daily_rate' => '$40',
        'status' => 'available',
        ],

        [
        'id' => 5,
        'make' => 'camaro',
        'model' => 'chevrolet',
        'year' => '2021',
        
        'daily_rate' => '$40',
        'status' => 'rented',
        ],

        [
        'id' => 6,
        'make' => 'Tesla',
        'model' => 'X',
        'year' => '2021',
       
        'daily_rate' => '$40',
        'status' => 'available',
        
        ],


    ];

    */


/* if(array_filter($cars, fn($car) =>
    $car['id'] >1000));
    header("Location: cars.php");
    exit();

 */
 // $selectedCar = array_filter($cars, function($car) { 
//  return $car['id']== $_GET['id'];

 // });
  

  // $selectedCar = reset($selectedCar);
 // echo $_GET['id'];
 //  var_dump($selectedCar)

 if(!$selectedCar) {
    header("Location: cars.php");
    exit();
 }
 
 $today = date('Y-m-d');
 $max_date = date('Y-m-d', strtotime('+7days'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car View</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
 
<div class="container">
  <h1 class= "display-4 mb-4 mt-4 " style="text-align:center"> Welcome to Car View</h1>
   
  <div class="">

       <h2 class="mb-4 "><?= $selectedCar['car_make']?> </h2>
    <ul>
     
     <li> <strong>Car Model:</strong><?= $selectedCar['car_model']?></li> 
     <li> <strong>Year:</strong><?= $selectedCar['year']?> </li>
     <li> <strong>Daily_rate:</strong><?= "$" . $selectedCar['daily_rate']?> </li>
     <li> <strong>status:</strong><?= $selectedCar['status']?> </li>
  </ul>
  </div>
</div>

  <div class="container mt-5">
    <form action="processes/hire-process.php" method="POST">
  
     <input type="date" name="return_date" placeholder="car id" class="form-control shadow-sm mt-3" required max="<?= $max_date; ?>" min="<?= $today; ?>">

     <input type="number" name="car_id" placeholder="car id" value="<?php echo $selectedCar['car_id'] ?>" class="form-control shadow-sm mt-3" hidden>
     
     <input type="hidden" name="daily_rate"  value="<?php echo $selectedCar['daily_rate'] ?>" class="form-control shadow-sm mt-3">
 
     <input type="text" name="first_name" placeholder="Enter First Name" class="form-control shadow-sm mt-3">
 
     <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control shadow-sm mt-3">
    
     <input type="tel" name="phone" placeholder="Enter phone number" class="form-control shadow-sm mt-3">
      
     <input type="email" name="email" placeholder="Enter email" class="form-control shadow-sm mt-3">
     <input type="submit" name="hire" value="Hire" class="btn btn-primary mt-3">


    </form>
  </div>

</body>
</html>