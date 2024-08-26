<?php
// Assuming you have a database con established

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    // Perform validation on the form data (e.g., check for empty fields, validate price format, etc.)
    // ...

    // Update the product in the database
    $sql = "UPDATE products SET product_name = '$product_name', product_price = '$product_price', product_description = '$product_description' WHERE product_id = $product_id";
    $result = mysqli_query($con,$sql);

    if ($result) {
        // Product updated successfully
        echo "Product updated successfully.";
    } else {
        // Error updating product
        echo "Error updating product: " . mysqli_error($con);
    }
}

// Retrieve the product details from the database
$product_id = $_GET['id']; // Assuming you pass the product ID as a parameter in the URL
$sql = "SELECT * FROM editproduct WHERE product_id = $product_id";
$result = mysqli_query($conn,$sql);
$product = mysqli_fetch_assoc($result);

// Close the database con
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>"><br><br>
        <label for="product_price">Product Price:</label>
        <input type="text" name="product_price" value="<?php echo $product['product_price']; ?>"><br><br>
        <label for="product_description">Product Description:</label><br>
        <textarea name="product_description"><?php echo $product['product_description']; ?></textarea><br><br>
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
