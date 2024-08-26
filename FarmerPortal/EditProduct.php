<?php
// Assuming you have a database connection established

if (isset($_POST['submit'])) {
    $productId = $_POST['product_title'];
    $productName = $_POST['product_stoke(In kg)'];
    $productcategories = $_POST['product_categories'];
    $productType = $_POST['product_type'];
    $productImage = $_POST['product_image'];
    $productPrice = $_POST['product_MRP(Per kg)'];
    $productDescription = $_POST['product_description'];
    

    
    // Perform validation and sanitize inputs here
    
    // Update the product in the database
    $sql = "UPDATE products SET product_stoke(Inkg)= '$productStoke(In kg)', product_categories = '$productCategories' WHERE product_title = '$producttitle',";
    
    if (mysqli_query($conn, $sql)) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}

// Retrieve the product details from the database
$producttitle = $_GET['product_title'];
$sql = "SELECT * FROM products WHERE product_title = '$productTitle'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $productStoke = $row['product_stoke'];
    $productCategories = $row['product_categories'];
?>

<!-- HTML form to edit the product -->
<form method="POST" action="">
    <input type="hidden" name="product_title" value="<?php echo $productTitle; ?>">
    <label for="product_stoke">Product Stoke:</label>
    <input type="text" name="product_stoke" value="<?php echo $productStoke; ?>">
    <br>
    <label for="product_categories">Product Categories:</label>
    <input type="text" name="product_categories" value="<?php echo $productCategories; ?>">
    <br>
    <input type="submit" name="submit" value="Update Product">
</form>

<?php
} else {
    echo "Product not found.";
}

// Close the database connection
mysqli_close($conn);
?>