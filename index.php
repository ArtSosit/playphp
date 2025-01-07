<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    rel="stylesheet" />
</head>

<body
  class="bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 flex items-center justify-center h-screen">
  <div class="w-full max-w-xs">
    <form class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
        <label
          class="block text-blue-800 text-sm font-bold mb-2"
          for="username">
          Username
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-800 leading-tight focus:outline-none focus:shadow-outline"
          id="username"
          type="text"
          placeholder="Username" />
      </div>
      <div class="mb-6">
        <label
          class="block text-blue-800 text-sm font-bold mb-2"
          for="password">
          Password
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-800 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password"
          type="password"
          placeholder="******************" />
      </div>
      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="button"
          onclick="window.location.href='./main.php'">ph
          Sign In
        </button>
        <a
          class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
          href="">
          Forgot Password?
        </a>
      </div>

      <div class="text-center mt-4">
        <p class="text-blue-600 text-sm">
          Don't have an account?
          <a href="./register.php" class="text-blue-500 hover:text-blue-800">
            Sign up
          </a>
        </p>
      </div>
    </form>
  </div>
</body>

</html>