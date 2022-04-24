<?php
  function calculateElectricityBill($units) {
    $price = 0;
    
    if ($units < 0 OR !is_numeric($units)) {
      return -1;
    }
    
    if ($units <= 50) {
      return $units * 3.50;
    }
    
    // If the unit is > 50 and <= 150
    if ($units <= 150) {
      $price += (50 * 3.50);
      $units -= 50;
      $price += ($units * 4.00);
      
      return $price;
    }
    
    // If the unit is > 150 and <= 250
    if ($units <= 250) {
      $price += (50 * 3.50); 
      $units -= 50;
      $price += (100 * 4.00);
      $units -= 100;
      $price += ($units * 5.20);
      
      return $price;
    }

    $price += (50 * 3.50);

    $units -= 50;
    $price += (100 * 4.00);

    $units -= 100;
    $price += (100 * 5.20);

    $units -= 100;
    $price += ($units * 6.50);
        
    return $price;
  }
  
  $price = calculateElectricityBill(200);
  
  echo $price;