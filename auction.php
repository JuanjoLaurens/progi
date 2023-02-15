<?php

// function to calculate basic user fee
function basicFee($price) {
  $fee = 0.1 * $price;
  return $fee < 10 ? 10 : ($fee > 50 ? 50 : $fee);
}

// function to calculate seller's special fee
function specialFee($price) {
  return 0.02 * $price;
}

// function to calculate association fee
function associationFee($price) {
  if ($price >= 1 && $price <= 500) {
    return 5;
  } else if ($price > 500 && $price <= 1000) {
    return 10;
  } else if ($price > 1000 && $price <= 3000) {
    return 15;
  } else if ($price > 3000) {
    return 20;
  }
}

// function to calculate the maximum vehicle amount
function maxVehicleAmount($budget) {
  $fees = basicFee($budget) + specialFee($budget) + associationFee($budget) + 100;
  $vehicleAmount = $budget - $fees;
  return ceil($vehicleAmount);
}

// Read budget from console
echo "Enter your budget: ";
$budget = (int)fgets(STDIN);

// Calculate the maximum vehicle amount
$vehicleAmount = maxVehicleAmount($budget);

// Calculate the fees
$basicFee = basicFee($vehicleAmount);
$specialFee = specialFee($vehicleAmount);
$associationFee = associationFee($vehicleAmount);
$storageFee = 100;

// Calculate the total amount
$totalAmount = $vehicleAmount + $basicFee + $specialFee + $associationFee + $storageFee;

// Display the result
echo "Maximum Vehicle Amount: $" . $vehicleAmount . PHP_EOL;
echo "Basic Fee: $" . $basicFee . PHP_EOL;
echo "Special Fee: $" . $specialFee . PHP_EOL;
echo "Association Fee: $" . $associationFee . PHP_EOL;
echo "Storage Fee: $" . $storageFee . PHP_EOL;
echo "Total Amount: $" . $totalAmount . PHP_EOL;

?>