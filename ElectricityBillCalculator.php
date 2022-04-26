<?php
  $amount = '';
  if (isset($_POST['submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
      $bill   = calculateElectricityBill($units);
      $amount = $bill === -1 ? "<strong>Please enter a valid value for units</strong>" : "<strong>Your bill for " . $units . " units is </strong>   ₦" .
              number_format($bill, 2, '.', ',');
    }
    
  }
  /**
   * To calculate electricity bill as per unit cost
   *
   * @param $units
   *
   * @return float|int
   */
  function calculateElectricityBill ($units) {
    $price = 0;
    
    // check that units is a valid value
    if ($units < 0 OR !is_numeric($units)) {
      return -1;
    }
    
    // Check that units consumed is less or equal to 50
    if ($units <= 50) {
      return $units * 3.50;
    }
    
    // check that units consumed is less or equal to 150
    if ($units <= 150) {
      $price += (50 * 3.50);
      $units -= 50;
      $price += ($units * 4.00);
      
      return $price;
    }
    
    // check that units consumed is less or equal to 250
    if ($units <= 250) {
      $price += (50 * 3.50);
      $units -= 50;
      $price += (100 * 4.00);
      $units -= 100;
      $price += ($units * 5.20);
      
      return $price;
    }
    
    // for units above 250
    $price += (50 * 3.50);
    $units -= 50;
    $price += (100 * 4.00);
    $units -= 100;
    $price += (100 * 5.20);
    $units -= 100;
    $price += ($units * 6.50);
    
    return $price;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capstone Project for Electricity Bill</title>
  </head>
  
  <body>
    <div class="container">
      <h1>Electricity Bill Calculator</h1>
      <div>
        <h3>Note:</h3>
        <ul>
          <li>For the first 50 units - ₦3.50/unit</li>
          <li>For the next 100 units - ₦4.00/unit</li>
          <li>For the next 100 units - ₦5.20/unit</li>
          <li>For units above 250 - ₦6.50/unit</li>
        </ul>
      </div>
      <div class="form-group">
        <form action="" method="post">
          <div class="form-group">
            <label>
              <input type="number" min="1" name="units" placeholder="Please enter no. of Units consumed"
                     class="form-control" required/>
            </label>
          </div>
          <br>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Calculate Bill"/>
          </div>
        </form>
      </div>
      <div>
        <?php echo '<br />' . $amount; ?>
      </div>
    </div>
  </body>
</html> 