<?php

    // require(__DIR__ ."/../../controllers/agency.php");

?>

<!DOCTYPE html>
<html lang="en">

<!--  HEAD  -->
<head>
    <?php include("components/head.html") ?>
    <title>Banks</title>
</head>
<!--  HEAD  -->

<body class="h-[100vh] w-full flex">

    <!--  SIDEBAR  -->
    <?php include("components/sidebar.html") ?>
    <!--  SIDEBAR  -->

    <!-- OVERLAY -->
    <div id="overlay" class="bg-black w-full h-[100vh] opacity-0 z-[-1] absolute transition ease-in-out delay-15"></div>
    <!-- OVERLAY -->

    <!-- FORM -->
    <section id="form" class="h-[20vh] w-[30%] m-auto bg-white rounded flex justify-center items-center absolute top-2/4 left-2/4 translate-x-[-50%] translate-y-[-50%] z-20 scale-0 transition ease-in-out delay-15">
        <form class="w-[80%] h-[90%] flex flex-col justify-evenly" autocomplete="off" enctype="multipart/form-data">
            <div class="flex justify-between">
                <input class="bg-gray-300 rounded p-1 hidden" type="text" id="id">
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>longitude:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" id="longitude">
                </div>
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>latitude:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" id="latitude">
                </div>
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>bank_id:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" id="bank_id">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>address_id:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" id="address_id">
                </div>
            </div>
            <div class="flex flex-col">
                <button id="edit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button>
                <button id="submit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button>
            </div>
        </form>
    </section>
    <!-- FORM -->

    <main class="w-[85%]">

        <!--  HEADER  -->
            <?php include("components/header.html") ?>
        <!--  HEADER  -->
        <section class="w-full h-[90%] bg-gray-200 flex justify-center items-center">
            <button id="add" type="button" class="w-14 h-[70%] bg-black text-white text-center rounded-l-lg">
                <i class="fa-solid fa-plus"></i>
            </button>
            <div class="w-[80%] h-[70%] bg-white rounded-r-lg p-8">
                <table id="table" class="w-[90%] mx-auto text-center py-4 cell-border">
                    <thead class="bg-black text-white">
                        <tr>
                            <th class="border-2 border-black">ID</th>
                            <th class="border-2 border-black">longitude</th>
                            <th class="border-2 border-black">latitude</th>
                            <th class="border-2 border-black">bank_id</th>
                            <th class="border-2 border-black">address_id</th>
                            <th class="border-2 border-black">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </main>
</body>
<script src="../public/assets/javascript/main.js"></script>
<script src="../public/assets/javascript/bank.js"></script>
</html>