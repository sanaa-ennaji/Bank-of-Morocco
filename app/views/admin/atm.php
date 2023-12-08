<?php

    // require(__DIR__ ."/../../controllers/atm.php");
    require("components/check.php");
    require("components/admin.php");

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
    <section id="form-wrapper" class="h-[20vh] w-[30%] m-auto bg-white rounded flex justify-center items-center absolute top-2/4 left-2/4 translate-x-[-50%] translate-y-[-50%] z-20 scale-0 transition ease-in-out delay-15">
        <form id="add-form" action="" method="post" class="w-[80%] h-[90%] flex flex-col justify-evenly" autocomplete="off" enctype="multipart/form-data">
            <div class="flex justify-between">
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>longitude:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="longitude" id="longitude">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>latitude:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="latitude" id="latitude">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>address:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="address" id="address">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>bank_id:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="bank_id" id="bank_id">
                    <!-- waaaaaa rayane select hna  -->
                </div>
            </div>
            <div class="flex flex-col">
                <!-- <button id="edit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button>
                <button id="submit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button> -->
                <input id="submit" type="submit" value="SUBMIT">
            </div>
        </form>
        
        <form id="edit-form" action="" method="post" class="w-[80%] h-[90%] flex flex-col justify-evenly" autocomplete="off" enctype="multipart/form-data">
            <div class="flex justify-between">
                <input class="bg-gray-300 rounded p-1" type="hidden" name="id" id="edit-id">
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>longitude:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="longitude" id="edit-longitude">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>latitude:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="latitude" id="edit-latitude">
                </div>
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>address:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="address" id="edit-address">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>bank_id:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="bank_id" id="edit-bank_id">
                    <!-- waaaaaa rayane select hna  -->
                </div>
            </div>
            <div class="flex flex-col">
                <!-- <button id="edit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button>
                <button id="submit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button> -->
                <input id="submit" type="submit" value="EDIT">
            </div>
        </form>
    </section>
    <!-- FORM -->

    <main class="w-[85%]">

        <!--  HEADER  -->
            <?php include("components/header.html") ?>
        <!--  HEADER  -->
        <section class="w-full h-[90%] bg-gray-200 flex justify-center items-center">
            <button id="add" type="button" class="w-14 h-[80%] bg-black text-white text-center rounded-l-lg">
                <i class="fa-solid fa-plus"></i>
            </button>
            <div class="w-[80%] h-[80%] bg-white rounded-r-lg p-8">
                <table id="table" class="w-[90%] mx-auto text-center py-4 cell-border">
                    <thead class="bg-black text-white">
                        <tr>
                            <th class="border-2 border-black">ID</th>
                            <th class="border-2 border-black">longitude</th>
                            <th class="border-2 border-black">latitude</th>
                            <th class="border-2 border-black">address</th>
                            <th class="border-2 border-black">bank_id</th>
                            <th class="border-2 border-black">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </main>
</body>
<script src="../public/assets/javascript/main.js"></script>
<script src="../public/assets/javascript/atm.js"></script>
</html>