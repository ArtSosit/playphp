<?php
include('db.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Fetch the user from the database
  $sql = "SELECT * FROM user WHERE username='$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $username;
      echo "<script>alert('Login successful!');
      window.location.href='main.php';</script>";
    } else {
      echo "<script>alert('Invalid password!');</script>";
    }
  } else {
    echo "<script>alert('No user found with that username!');</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    rel="stylesheet" />
</head>

<body
  class="bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 flex items-center justify-center h-screen">
  <div class="w-full max-w-xs">
    <form class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4" method="POST">
      <div class="mb-4">
        <label
          class="block text-blue-800 text-sm font-bold mb-2"
          for="username">
          Username
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-800 leading-tight focus:outline-none focus:shadow-outline"
          id="username"
          name="username"
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
          name="password"
          placeholder="******************" />
      </div>
      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit">
          Sign In
        </button>
    </form>
    <a
      class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
      href="">
      Forgot Password?
    </a>
  </div>
  <div class="text-center mt-4">
    <p class="text-white text-sm">
      Don't have an account?
      <a href="./register.php" class="text-white hover:text-blue-800 font-bold">
        Sign up
      </a>
    </p>
  </div>

  </div>
</body>

</html>