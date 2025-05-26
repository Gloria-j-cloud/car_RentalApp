<?php 

  session_start();

  require "../config/db-connect.php";

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'] ?? " ";
  $email = $_POST['email'];
  
  
    $return_date = $_POST['return_date'];
    $rental_date = Date('Y-m-d');
    $car_id = $_POST['car_id'];
    $daily_rate = $_POST['daily_rate'];
    $rental_date_object = new DateTime($rental_date);
    $return_date_object = new DateTime($return_date);
    $interval = $rental_date_object->diff($return_date_object);
    $days = $interval->days;
    $total_cost = $daily_rate * $days;
    echo "$". number_format($total_cost, 2);
   
   

    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['days'] = $days;
    
    // customer existence validation
    $sql = "SELECT * FROM customers WHERE email= ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if($customer){
       $customer_id = $customer['customer_id'];
       $sql = "INSERT INTO rentals (customer_id, car_id, rental_date, return_date, total_cost) VALUES(?,?,?,?,?)";
       $stmt = $pdo->prepare($sql);
       $stmt->execute([$customer_id, $car_id, $rental_date, $return_date, $total_cost]);

       // Toggle car status
       $sql = "UPDATE cars SET `status` = 'rented' WHERE car_id= ?";
       $stmt = $pdo->prepare($sql);
       $stmt->execute([$car_id]);

       header("Location: ../cars.php");
    }else{
      //insert into customers record
      $sql = "INSERT INTO customers(first_name, last_name, phone, email)VALUES(?,?,?,?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$first_name, $last_name, $phone, $email]);
      //selecting customer that was just inserted
      $sql = "SELECT * FROM customers WHERE email = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$email]);
      $customer = $stmt->fetch(PDO::FETCH_ASSOC);

      // Inserting customer into rentals
      $customer_id = $customer['customer_id'];
      $sql = "INSERT INTO rentals (customer_id, car_id, rental_date, return_date, total_cost) VALUES(?, ?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$customer_id, $car_id, $rental_date, $return_date, $total_cost]);

      // toggle car status
      $sql = "UPDATE cars SET `status` = 'rented' WHERE car_id = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$car_id]);

      header("Location: ../cars.php");
    }

     
 
       
/* if(empty($first_name || $last_name)){
   header("Location: ../register.php");
   exit();
  };

 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   header("Location: ../register.php");
   exit();

 };
  
 if(!ctype_digit($phone)){
   
   //echo $msg;
   header("Location: ../register.php");
   exit();
  };

 
   header("Location: ../dashboard.php");
   exit();

  
    
*/
?>