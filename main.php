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
          <a href="./index.html" class="text-white hover:text-gray-200 px-3"
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
    <div class="container mx-auto px-20 py-10 flex gap-8">
      <!-- Product Grid -->
      <div class="w-3/4">
        <h2 class="text-2xl font-bold text-blue-700 mb-5">Products</h2>
        <div
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
        ></div>
      </div>

      <!-- Cart Section -->
<div
  id="cart"
  class="w-2/2 bg-white shadow-lg rounded-lg p-4 h-100 sticky top-10 overflow-y-auto"
>
  <h2 class="text-lg font-bold text-blue-700 mb-4">Your Cart</h2>
  <p class="text-gray-600">Your cart is empty.</p>
  <div class="space-y-4">
    </div>
  </body>

  <script>
    // Sample Products
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
    ];

    // Render Products
    const container = document.querySelector(".grid");
    products.forEach((product) => {
      const productCard = `
        <div class="bg-white shadow-lg rounded-lg overflow-hidden ">
          <img class="w-full h-48 object-cover" src="${product.image}" alt="Product Image" />
          <div class="p-4">
            <h2 class="text-xl font-bold text-blue-700">${product.title}</h2>
            <p class="text-gray-600 mt-2">${product.description}</p>
            <div class="flex items-center justify-between mt-4">
              <span class="text-blue-600 font-bold">${product.price}</span>
              <button 
                class="add-to-cart bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500"
                data-title="${product.title}"
                data-description="${product.description}"
                data-price="${product.price}"
                data-image="${product.image}">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      `;
      container.innerHTML += productCard;
    });

    // Add to Cart
    document.addEventListener("DOMContentLoaded", () => {
      document.querySelectorAll(".add-to-cart").forEach((button) => {
        button.addEventListener("click", function () {
          const product = {
            title: this.dataset.title,
            description: this.dataset.description,
            price: this.dataset.price,
            image: this.dataset.image,
          };

          fetch("script.html", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ product }),
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success") {
                alert("Product added to cart");
                loadCart();
              } else {
                alert("Failed to add product to cart");
              }
            })
            .catch((error) => {
              console.error("Error:", error);
              alert("An error occurred.");
            });
        });
      });
    });

    // Load Cart
    function loadCart() {
    fetch("script.html")
      .then((response) => response.json())
      .then((data) => {
        const cartContainer = document.getElementById("cart");
        if (data.cart && data.cart.length > 0) {
          cartContainer.innerHTML =
            `<h2 class="text-xl font-bold text-blue-700 mb-4">Your Cart</h2>` +
            data.cart
              .map(
                (item, index) => `
               <div class="flex justify-between items-center text-sm">
                <div>
                  <h4 class="font-bold text-sm">${item.title}</h4>
                  <p class="text-xs text-gray-600">${item.description}</p>
                  <span class="text-blue-600 font-bold">${item.price}</span>
                </div>
                <div class="flex items-center">
                  <img
                    class="w-12 h-12 rounded mr-3 object-cover"
                    src="${item.image}"
                    alt="${item.title}"
                  />
                  <button
                    class="remove-item bg-red-400 text-white text-xs px-2 py-1 rounded hover:bg-red-500"
                    data-index="${index}"
                  >
                    Remove
                  </button>
                </div>
              </div>
              `
              )
              .join("");
        } else {
          cartContainer.innerHTML =
            '<p class="text-gray-600">Your cart is empty.</p>';
        }

        // Attach event listeners for remove buttons
        document.querySelectorAll(".remove-item").forEach((button) => {
          button.addEventListener("click", function () {
            const index = this.dataset.index;
            removeItem(index);
          });
        });
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
   // Function to remove an item from the cart
  function removeItem(index) {
    fetch("script.html", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ action: "remove", index }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert("Item removed from cart");
          loadCart();
        } else {
          alert("Failed to remove item from cart");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

    // Initial Load of Cart
    loadCart();
  </script>
</html>
