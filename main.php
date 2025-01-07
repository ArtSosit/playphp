<?php
include('db.php');

// Add a product to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
  $product_name = $conn->real_escape_string($_POST['product_name']);
  $product_price = $conn->real_escape_string($_POST['product_price']);
  $description = $conn->real_escape_string($_POST['description']);

  $sql = "INSERT INTO product (title, price, descrip) VALUES ('$product_name', '$product_price', '$description')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>console.log('New product added successfully');</script>";
  } else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Store Website</title>
  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    rel="stylesheet" />
</head>

<body class="bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300">
  <!-- Navbar -->
  <nav class="bg-blue-400 shadow-md">
    <div class="container mx-auto px-20 py-4 flex justify-between items-center">
      <div>
        <label class="text-xl font-bold text-white">Store</label>
        <a href="#" class="text-white hover:text-gray-200 px-3">Home</a>
        <a href="./index.php" class="text-white hover:text-gray-200 px-3">Log Out</a>
      </div>
      <div class="flex items-center">
        <span class="text-white mr-5">Username</span>
        <img class="w-8 h-8 rounded-full" src="https://via.placeholder.com/150" alt="Avatar" />
      </div>
    </div>
  </nav>

  <!-- Main Content Container -->
  <div class="container mx-auto px-20 py-10 flex gap-8">
    <!-- Product Grid -->
    <div class="w-3/4">
      <h2 class="text-2xl font-bold text-blue-700 mb-5">Products</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php
        $sql = "SELECT id, title, descrip, price, image FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='bg-white shadow-md rounded-lg p-4'>";
            echo "<h3 class='text-lg font-bold text-blue-700'>" . htmlspecialchars($row["title"]) . "</h3>";
            echo "<p class='text-gray-600'>" . htmlspecialchars($row["descrip"]) . "</p>";
            echo "<p class='text-gray-600'>$" . htmlspecialchars($row["price"]) . "</p>";
            echo "</div>";
          }
        } else {
          echo "<p class='text-gray-600'>No products found.</p>";
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Add Product Section -->
  <div class="container mx-auto px-20 py-10">
    <h2 class="text-2xl font-bold text-blue-700 mb-5">Add Product</h2>
    <form method="POST" action="">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="product_name">Product Name</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_name" name="product_name" type="text" placeholder="Product Name" required>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="product_price">Product Price</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_price" name="product_price" type="text" placeholder="Product Price" required>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="Description"></textarea>
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Add Product
        </button>
      </div>
    </form>
  </div>
</body>

</html>
<?php
$conn->close();
?>