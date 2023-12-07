<?php

    require_once("../models/random.php");
    require_once("../models/address.php");
    require_once("../models/user.php");
    require_once("../models/roleOfUser.php");

    $address = new Address();
    $user = new User();
    $roleOfUser = new RoleOfUser();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // ---------  ADDRESS PROPS --------- //
        
        $city = $_POST['city'];
        $district = $_POST['district'];
        $street = $_POST['street'];
        $codePostal = $_POST['codePostal'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        // ---------  USER PROPS --------- //

        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $nationality = $_POST['nationality'];
        $gendre = $_POST['gendre'];
        $agencyId = $_POST['agency'];

        // ---------  ROLE PROPS --------- //

        $roleId = $_POST['role'];

    // ---------=  EDIT =--------- //

        if(isset($_POST['submit']) && $_POST['submit'] == 'Edit') {

            $id = $_POST['id'];
            $currentUser = $user->search($id);
            $currentAddressId = $currentUser['address_id'];

            $address->edit($currentAddressId, $city, $district, $street, $codePostal, $email, $telephone);

            $user->edit($id, $username, $password, $nationality, $gendre, $agencyId);

            $roleOfUser->add($id, $userId, $roleId);

            $transaction->edit($id, $type, $amount, $account);

    // ---------=  ADD =--------- //

        } else if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {

            $random = new Random();

            $id = $random->get();
            $address->add($id, $city, $district, $street, $codePostal, $email, $telephone);
            $lastAddress = $address->getLast();
            $addressId = $lastAddress['id'];

            $id = $random->get();
            $user->add($id, $username, $password, $nationality, $gendre, $addressId, $agencyId);
            $lastUser = $user->getLast();
            $userId = $lastUser['id'];

            $id = $random->get();
            $roleOfUser->add($id, $userId, $roleId);
        }

        header("Location: ../../admin/");
    }

    // ---------=  DELETE =--------- //

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(isset($_GET['id'])) {

            $id = $_GET['id'];
            $user->delete($id);
            $user->delete($id);

            header("Location: ../../admin/");
        }

    }

    // ---------=  DISPLAY =--------- //
    
    $users = $user->displayAll();


?>