<?php

    require_once(__DIR__ ."/../../controllers/bank.php");

?>

<!DOCTYPE html>
<html lang="en">

<!--  HEAD  -->
<head>
    <?php include("components/head.html") ?>
    <title>Bank</title>
</head>
<!--  HEAD  -->

<body class="h-[100vh] w-full flex">

    <!--  SIDEBAR  -->
    <?php include("components/sidebar.html") ?>
    <!--  SIDEBAR  -->

    <main class="w-[85%]">

        <!--  HEADER  -->
            <?php include("components/header.html") ?>
        <!--  HEADER  -->
        <section class="w-full h-[90%] bg-gray-200 flex justify-center items-center">
            <div class="w-[80%] h-[70%] bg-white rounded-lg p-8">
                <table id="table" class="w-[90%] mx-auto text-center py-4">
                    <thead class="bg-black text-white">
                        <tr>
                            <th class="border-2 border-black">ID</th>
                            <th class="border-2 border-black">Name</th>
                            <th class="border-2 border-black">Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($banks as $bank): ?>
                        <tr>
                            <td class="border-2 border-black"><?=$bank['id']?></td>
                            <td class="border-y-2 border-black"><?=$bank['name']?></td>
                            <td class="border-2 border-black"><?=$bank['logo']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
<style src="../public/assets/javascript/main.js"></style>
</html>