<?php 
    $cars = [
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
        'image' => 'https://images.app.goo.gl/sCJHHkmxfxtEpCqs6'
        ],


    ];

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: cars.php");
    exit();
  };

  if(($_GET['id'] >1000)) {
    header("Location: cars.php");
    exit();
  }
   ; 
/* if(array_filter($cars, fn($car) =>
    $car['id'] >1000));
    header("Location: cars.php");
    exit();

 */
  $selectedCar = array_filter($cars, function($car) { 
  return $car['id']== $_GET['id'];

  });
  

   $selectedCar = reset($selectedCar);
 // echo $_GET['id'];
 //  var_dump($selectedCar)

 if(!$selectedCar) {
    header("Location: cars.php");
    exit();
 }
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
<h1 class= "display-4 mb-4 mt-4" style="text-decoration: underline; text-align:center"> Welcome to Car View</h1>
   
<div class="">
    <h2 class=""> Car Make:<?= $selectedCar['make']?> </h2>
    <h2> Car Model:<?= $selectedCar['model']?></h2> 
    <h2>  Year:<?= $selectedCar['year']?> </h2>
    <h2> Daily_rate:<?= $selectedCar['daily_rate']?> </h2>
    <h2> status:<?= $selectedCar['status']?> </h2>
  <!--  <img src="<?= $selectedCar['image']?>" alt="car.jpg"/> -->

</div>
</div>
  

</body>
</html>