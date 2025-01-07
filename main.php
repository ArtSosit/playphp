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
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>
    </div>

    <!-- Cart Section -->
    <div id="cart" class="w-2/2 bg-white shadow-lg rounded-lg p-4 h-100 sticky top-10 overflow-y-auto">
      <h2 class="text-lg font-bold text-blue-700 mb-4">Your Cart</h2>
      <p class="text-gray-600">Your cart is empty.</p>
      <div class="space-y-4">
      </div>
    </div>
  </div>
</body>

</html>