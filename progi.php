<!DOCTYPE html>
<html>
<head>
  <title>Car Auction Purchasing Power Calculator</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Car Auction Purchasing Power Calculator</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="budget">Enter Budget:</label>
        <input type="text" class="form-control" id="budget" name="budget">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php
      if ($_POST) {
        $budget = $_POST['budget'];
        $basicFee = min(max(10, 0.1 * $budget), 50);
        $specialFee = 0.02 * ($budget - $basicFee);
        if ($budget <= 500) {
          $associationFee = 5;
        } elseif ($budget <= 1000) {
          $associationFee = 10;
        } elseif ($budget <= 3000) {
          $associationFee = 15;
        } else {
          $associationFee = 20;
        }
        $storageFee = 100;
        $vehicleAmount = $budget - $basicFee - $specialFee - $associationFee - $storageFee;
    ?>
    <table class="table table-bordered">
      <tr>
        <td>Vehicle Amount</td>
        <td><?php echo $vehicleAmount; ?></td>
      </tr>
      <tr>
        <td>Basic Fee</td>
        <td><?php echo $basicFee; ?></td>
      </tr>
      <tr>
        <td>Special Fee</td>
        <td><?php echo $specialFee; ?></td>
      </tr>
      <tr>
        <td>Association Fee</td>
        <td><?php echo $associationFee; ?></td>
      </tr>
      <tr>
        <td>Storage Fee</td>
        <td><?php echo $storageFee; ?></td>
      </tr>
      <tr>
        <td>Total Amount</td>
        <td><?php echo $budget; ?></td>
      </tr>
    </table>
    <?php
      }
    ?>
  </div>
</body>
</html>
