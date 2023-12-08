<?php

require_once("../app/models/roleOfUser.php");
require_once("../app/models/random.php");

$random = new Random();

$roleOfUser = new roleOfUser();

// $roleOfUser->add("202", "1583461954657328b197a4d7.45803178", "role1");
$id = "58782974565733ff93df342.05906333";

            $roleOfUser->deleteAll($id);
            // some loop through roles in post
            $roleid = $random->get();
            $roleOfUser->add($roleid, $id, 'admin');

?>