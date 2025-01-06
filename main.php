<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Store Website</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300">
    <!-- Navbar -->
    <nav class="bg-blue-400 shadow-md">
      <div
        class="container mx-auto px-20 py-4 flex justify-between items-center"
      >
        <div>
          <label class="text-xl font-bold text-white">Store</label>
          <a href="#" class="text-white hover:text-gray-200 px-3">Home</a>
          <a href="./index.php" class="text-white hover:text-gray-200 px-3"
            >Log Out</a
          >
        </div>
        <div class="flex items-center">
          <span class="text-white mr-5">Username</span>
          <img
            class="w-8 h-8 rounded-full"
            src="https://via.placeholder.com/150"
            alt="Avatar"
          />
        </div>
      </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container mx-auto px-20 py-10">
      <!-- Card Container -->
      <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
      >
        <!-- Product cards will be injected here by JavaScript -->
      </div>
    </div>
  </body>
</html>
<script>
  const products = [
    {
      title: "Product 1",
      description: "This is a brief description of product 1.",
      price: "$99.99",
      image: "https://via.placeholder.com/400x300",
    },
    {
      title: "Product 2",
      description: "This is a brief description of product 2.",
      price: "$89.99",
      image: "https://via.placeholder.com/400x300",
    },
    {
      title: "Product 3",
      description: "This is a brief description of product 3.",
      price: "$79.99",
      image: "https://via.placeholder.com/400x300",
    },
    {
      title: "Product 4",
      description: "This is a brief description of product 4.",
      price: "$69.99",
      image: "https://via.placeholder.com/400x300",
    },
    {
      title: "Product 5",
      description: "This is a brief description of product 5.",
      price: "$59.99",
      image: "https://via.placeholder.com/400x300",
    },
    {
      title: "Product 6",
      description: "This is a brief description of product 6.",
      price: "$49.99",
      image: "https://via.placeholder.com/400x300",
    },
    {
      title: "Product 7",
      description: "This is a brief description of product 7.",
      price: "$39.99",
      image: "https://via.placeholder.com/400x300",
    },
  ];

  const container = document.querySelector(".grid");

  products.forEach((product) => {
    const productCard = `
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <img class="w-full h-48 object-cover" src="${product.image}" alt="Product Image" />
        <div class="p-4">
          <h2 class="text-xl font-bold text-blue-700">${product.title}</h2>
          <p class="text-gray-600 mt-2">${product.description}</p>
          <div class="flex items-center justify-between mt-4">
            <span class="text-blue-600 font-bold">${product.price}</span>
            <button class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Add to Cart</button>
          </div>
        </div>
      </div>
    `;
    container.innerHTML += productCard;
  });
</script>
