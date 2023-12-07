<?php

    // require_once("../app/models/user.php");
    // require_once("../app/models/permission.php");
    // require_once("../app/models/role.php");
    // require_once("../app/models/atm.php");
    // require_once("../app/models/transaction.php");
    require_once("../app/controllers/transaction.php");

    // $transaction = new Transaction();

    // $transactions = $transaction->display();

    // var_dump($transactions);

    // $atm = new Atm();

    // $atm->add(1, "sdwwdwdw", 45451, 45451, 1);

    // $permission = new Permission();

    // var_dump($permission->check(1, "AC"));

    // $role = new Role();

    // $id = 1;
    // $name = "role1";

    // $role->add($name);


    // $user = new User();

    // $id = 3;
    // $username = "user3";
    // $password = "pass1";
    // $nationality = "nat1";
    // $gendre = "gendre1";
    // $address_id = 1;
    // $agency_id = 1;

    // var_dump($user->getLast());

    // print_r($user->getLast()['id']);

    // var_dump($user->displayAll());



    // $todaydate = date('Ymd');
    // $time_utc=mktime(date('G'),date('i'),date('s'));
    // $NowisTime=date('Gis',$time_utc);

    // print_r($NowisTime);

    // echo "<br>";

    // var_dump(gettimeofday());

    // $time = gettimeofday();

    // echo "<br>";

    // echo $time['sec'] . $time['usec'];



    // $time = gettimeofday();
    // $id = $time['sec'] . $time['usec'] . rand(10, 100);
    // var_dump($id);

    // print_r(uniqid(mt_rand(), true));


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $("#table").DataTable({
                'processing': true,
		      	'serverSide': true,
		      	'serverMethod': 'post',
		      	'ajax': {
		          	'url':'datatable.php'
		      	},
		      	'columns': [
		         	{ data: 'id' },
		         	{ data: 'name' },
		         	{ data: 'logo' }
		      	]
            })
        });
    </script> -->

    <script type="text/javascript">
		$(document).ready(function() {
		    $('#table').DataTable();
		} );
	</script>

    

</head>
<body>

    <!-- <div class="container mt-5">
		<table id="table" class="display" style="width:100%">
	        <thead>
	            <tr>
	                <th>id</th>
	                <th>name</th>
	                <th>logo</th>
	            </tr>
	        </thead>
	    </table>
	</div> -->
    
    <!-- <form action="index.php" method="post">
        <select type="text" name="type">
            <option value="credit">Credit</option>
            <option value="debit">Debit</option>
        </select>
        <input type="text" name="amount" placeholder="amount">
        <input type="text" name="account" value="swss3" readonly>

        <select id="select">
            <option value="1" id="1">1</option>
            <option value="2" id="2">2</option>
            <option value="3" id="3">3</option>
        </select>

        <div id="test"></div>

        <input type="submit" name="submit" value="Submit">
    </form> -->

    <div class="container mt-5">
		<table id="table" class="display" style="width:100%">
	        <thead>
	            <tr>
	                <th>id</th>
	                <th>type</th>
	                <th>amount</th>
	                <th>account</th>
	            </tr>
	        </thead>
            <tbody>
                <?php foreach($transactions as $transaction): ?>
                <tr>
                    <td><?=$transaction['id']?></td>
                    <td><?=$transaction['type']?></td>
                    <td><?=$transaction['amount']?></td>
                    <td><?=$transaction['account_id']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
	    </table>
	</div>


    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <script src="main.js"></script>
</body>
</html>
