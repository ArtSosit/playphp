<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Store Website</title>
  <!-- เชื่อมโยงไฟล์ CSS -->
  <link rel="stylesheet" href="styles.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    rel="stylesheet" />
</head>

<body>
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div>
        <label>Store</label>
        <a href="#" class="hover">Home</a>
        <a href="./index.php" class="hover">Log Out</a>
      </div>
      <div class="flex items-center">
        <span>Username</span>
        <img class="avatar" src="https://via.placeholder.com/150" alt="Avatar" />
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container main-content">
    <div class="product-grid">
      <h2>Products</h2>
      <div class="grid">
        <?php
        $sql = "SELECT id, title, descrip, price FROM product";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='product-card'>";
            echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
            echo "<p>" . htmlspecialchars($row["descrip"]) . "</p>";
            echo "<p>$" . htmlspecialchars($row["price"]) . "</p>";
            echo "</div>";
          }
        } else {
          echo "<p>No products found.</p>";
        }
        ?>
      </div>
    </div>

    <!-- Add Product Form -->
    <div class="add-product">
      <h2>Add Product</h2>
      <form method="POST" action="">
        <label for="product_name">Product Name</label>
        <input id="product_name" name="product_name" type="text" placeholder="Product Name">

        <label for="product_price">Product Price</label>
        <input id="product_price" name="product_price" type="text" placeholder="Product Price">

        <label for="description">Description</label>
        <input id="description" name="description" type="text" placeholder="Description">

        <button type="submit">Add Product</button>
      </form>
    </div>
  </div>
</body>

</html>