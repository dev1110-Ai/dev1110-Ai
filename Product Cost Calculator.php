<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $shipping = $_POST['shipping'];
    $tax = 10; // Example tax percentage
    $payments = 12; // Example number of monthly payments

    // Calculate total cost
    $total = $price * $quantity;
    $total = $total + $shipping;
    $total = $total - $discount;

    // Determine tax rate
    $taxrate = $tax / 100;
    $taxrate = $taxrate + 1;
   
    // Apply tax rate
    $total = $total * $taxrate;

    // Calculate monthly payment
    $monthly = $total / $payments;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Product Cost Calculator</title>
    <style>
        .number { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Product Cost Calculator</h2>
    <form method="post">
        <p>Price: <input type="number" name="price" required></p>
        <p>Quantity: <input type="number" name="quantity" value="1" required></p>
        <p>Discount: <input type="number" name="discount" value="0"></p>    
        <p>Shipping:
            <select name="shipping">
                <option value="5">Slow Rs. 5</option>
                <option value="12.2">Fast Rs. 12.2</option>
                <option value="20">Super fast Rs. 20</option>
            </select>
        </p>
        <input type="submit" value="Calculate">
    </form>

    <?php if (isset($total)) { ?>
        <h3>You have selected to purchase:</h3>
        <p><span class="number"><?php echo $quantity; ?></span> widget(s) at <br>
        Rs. <span class="number"><?php echo $price; ?></span> each plus <br>
        Rs. <span class="number"><?php echo $shipping; ?></span> shipping cost <br>
        After Rs. <span class="number"><?php echo $discount; ?></span> discount, the total cost is <br>
        Rs. <span class="number"><?php echo number_format($total, 2); ?></span>.</p>
        <p>Monthly Payment: Rs. <span class="number"><?php echo number_format($monthly, 2); ?></span> per month.</p>
    <?php } ?>
</body>
</html>
