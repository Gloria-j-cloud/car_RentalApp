 <?php 

    require_once "config/db-connect.php";
     
    $sql = "SELECT * FROM cars";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
    /*
    = [
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


    ]

    */
    ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Hire App</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
    
    <div class= "container  mt-5 mb-5">
    <table class="table">
      <thead>
        <th>id</th>
        <th>make</th>
        <th>model</th>
        <th>year</th>
        <th>daily_rate</th>
        <th>status</th>
        <th>View</th>
      </thead>

      <?php foreach($cars as $car) {?>
      <tr>
        
        <td><?= $car['car_id'] ?></td>
        <td><?= $car['car_make'] ?></td>
        <td><?= $car['car_model'] ?></td>
        <td><?= $car['year'] ?></td>
        <td><?= $car['daily_rate'] ?></td>
        <td>
              <?php if($car['status']==='available'){?>
            <button class="btn btn-success"><?= $car['status'] ?></button>
            <?php }else {?>
               <button class="btn btn-danger btn-lg"><?= $car['status'] ?></button>
            <?php }?>

        </td>
        
        
        <td>
         

         <?php if($car['status'] ==='available'){?>
         <a class="btn btn-primary btn-lg" href="car.php?id=<?=$car['car_id'] ?>";>View Car</a>

           <?php } else {?>
        <a class="btn btn-secondary" disabled>Unavailable</a>
         <?php } ?>
        </td>
       
      </tr>

     <?php } ?>
   </table>

</div>

 <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
 <?php

?>
</body>
</html>