<?php
function filterCars($cars, $filters)   {



  if (!empty($filters['transmission'])) 
  
  
  
  {
      $cars = array_filter($cars, function ($car) use ($filters) {
          return $car['transmission'] === $filters['transmission'];
      }
    
    
    );
  }

  if (!empty($filters['passengers'])
  )
   {
      $cars = array_filter($cars, function ($car) use ($filters) 
      {
          return $car['passengers'] >= $filters['passengers'];
      
      
        }
    );
  }

  if (!empty($filters['price_min'])) {
      $cars = array_filter($cars, function ($car) use ($filters) {
          return $car['daily_price_huf'] >= $filters['price_min'];
      });
  }

  if (!empty($filters['price_max'])) {
      $cars = array_filter($cars, function ($car) use ($filters) {
          return $car['daily_price_huf'] <= $filters['price_max'];
      });
  }

  return $cars;
}


function findCarById($cars, $id) {
  foreach ($cars as $car) {
    if ($car['id'] == $id) {
      return $car;
    }
  }
  return null;
}

function isLoggedIn()       {
  if (session_status() === PHP_SESSION_NONE) 
  
  
  {
      session_start();
  
  
    }
  return isset($_SESSION['user']);
}

function displayCars($cars) 



{
  $carItems = [];

  foreach ($cars as $car) 
  
  
  
  
  {
      $carItems[] = 
      
      
      [
          'image' => htmlspecialchars($car['image']),
          'model' => htmlspecialchars($car['model']),
          'brand' => htmlspecialchars($car['brand']),
          'year' => htmlspecialchars($car['year']),
          'transmission' => htmlspecialchars($car['transmission']),
          'fuel_type' => htmlspecialchars($car['fuel_type']),
          'daily_price_huf' => htmlspecialchars($car['daily_price_huf']),
          'id' => htmlspecialchars($car['id'])


      ];}

  return $carItems;}
?>
