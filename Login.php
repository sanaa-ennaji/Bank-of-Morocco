<?php

session_start();
include('cnx.php');

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    


    if (empty($username) || empty($password)) {
        echo "<script>window.alert('Please fill in both email and password.')</script>";
    } else {

        $query = "SELECT * FROM user WHERE usersnames = ? ";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        if ($row && password_verify($password, $row['passwords'])) {
            
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['usersnames'];
            $_SESSION['user_type'] = $row['role_id'];
            
            if ($row['role_id'] == 2) {
                
                $_SESSION['user_id'] = $row['id'];
                header("Location: Admin/index.php");
            } else if ($row['role_id'] === 1) {
                $_SESSION['user_id'] = $row['id'];

                header("Location: Client/Client.php");
                exit;
            } 
        }
        else {
                echo "<script>window.alert('USERNAME or PASSWORD incorrect');</script>";
            }
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login Page</title>
</head>
<body>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <form  method="POST" class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <input id="email" name="username" type="text" placeholder="username" class="block w-full rounded-md border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <div class="errorMessage px-4 mt-2 bg-red-600 text-white rounded mb-4"></div>
            
            <input id="password" name="password" type="password" placeholder="Password" class="px-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <div class="errorMessage px-4 mt-2 bg-red-600 text-white rounded  mb-8"></div>

            <button type="submit" name="login" class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </form>
    </div>


    <!-- SCRIPT -->
    <script>
        
    </script>

</body>
</html>