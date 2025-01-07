<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    rel="stylesheet" />
</head>

<body class="bg-blue-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-xs mt-8">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
        <label
          class="block text-blue-700 text-sm font-bold mb-2"
          for="username">
          Username
        </label>
        <input
          class="shadow appearance-none border border-blue-400 rounded w-full py-2 px-3 text-blue-800 leading-tight focus:outline-none focus:shadow-outline"
          id="username"
          type="text"
          placeholder="Username" />
      </div>
      <div class="mb-4">
        <label class="block text-blue-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input
          class="shadow appearance-none border border-blue-400 rounded w-full py-2 px-3 text-blue-800 leading-tight focus:outline-none focus:shadow-outline"
          id="email"
          type="email"
          placeholder="Email" />
      </div>
      <div class="mb-6">
        <label
          class="block text-blue-700 text-sm font-bold mb-2"
          for="password">
          Password
        </label>
        <input
          class="shadow appearance-none border border-blue-400 rounded w-full py-2 px-3 text-blue-800 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password"
          type="password"
          placeholder="******************" />
      </div>
      <div class="flex items-center justify-between space-x-10">
        <button
          class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="button">
          Register
        </button>
        <a
          class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800"
          href="login.php">
          Already have an account?
        </a>
      </div>
    </form>
  </div>
</body>

</html>