<?php
include 'cnx.php';

if (isset($_POST['edit_role'])) {
    $id = $_POST['edit_role'];

    // Fetch the role record based on the ID
    $selectRole = "SELECT * FROM role WHERE id = ?";
    $statement = $conn->prepare($selectRole);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $role = $result->fetch_assoc();

    // Now you can display a form with the role details for editing
    echo "<form action='insertRole.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $role['id'] . "'>";
    echo "<input type='text' name='updated_name' value='" . $role['name'] . "' required>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}


// ************************************************************************************************************************

if (isset($_POST['edit_account'])) {
    $id = $_POST['edit_account'];

    // Fetch the account record based on the ID
    $selectAccount = "SELECT * FROM account WHERE id = ?";
    $statement = $conn->prepare($selectAccount);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $account = $result->fetch_assoc();

    // Now you can display a form with the account details for editing
    echo "<form action='insertAccount.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $account['id'] . "'>";

    // Add fields for rib, devise, balance, and user_id
    echo "<label for='updated_rib'>RIB:</label>";
    echo "<input type='text' name='updated_rib' value='" . $account['rib'] . "' required><br>";

    echo "<label for='updated_devise'>Devise:</label>";
    echo "<input type='text' name='updated_devise' value='" . $account['devise'] . "' required><br>";

    echo "<label for='updated_balance'>Balance:</label>";
    echo "<input type='number' name='updated_balance' value='" . $account['balance'] . "' required><br>";

    echo "<label for='updated_user_id'>User ID:</label>";
    echo "<input type='number' name='updated_user_id' value='" . $account['user_id'] . "' required><br>";

    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}

// ************************************************************************************************************************




if (isset($_POST['edit_adresse'])) {
    $id = $_POST['edit_adresse'];

    // Fetch the address record based on the ID
    $selectAdresse = "SELECT * FROM adresse WHERE id = ?";
    $statement = $conn->prepare($selectAdresse);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $adresse = $result->fetch_assoc();

    // Now you can display a form with the address details for editing
    echo "<form action='insertAdresse.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $adresse['id'] . "'>";
    echo "<input type='text' id='updated_ville' name='updated_ville' placeholder='Updated Ville' value='" . $adresse['ville'] . "' required>";
    echo "<input type='text' id='updated_quartier' name='updated_quartier' placeholder='Updated Quartier' value='" . $adresse['quartier'] . "' required>";
    echo "<input type='text' id='updated_rue' name='updated_rue' placeholder='Updated Rue' value='" . $adresse['rue'] . "' required>";
    echo "<input type='text' id='updated_code_postal' name='updated_code_postal' placeholder='Updated Code Postal' value='" . $adresse['code_postal'] . "' required>";
    echo "<input type='email' id='updated_email' name='updated_email' placeholder='Updated Email' value='" . $adresse['email'] . "' required>";
    echo "<input type='tel' id='updated_telephone' name='updated_telephone' placeholder='Updated Telephone' value='" . $adresse['telephone'] . "' required>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}


// ************************************************************************************************************************




if (isset($_POST['edit_agence'])) {
    $id = $_POST['edit_agence'];

    // Fetch the agence record based on the ID
    $selectAgence = "SELECT * FROM agence WHERE id = ?";
    $statement = $conn->prepare($selectAgence);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $agence = $result->fetch_assoc();

    // Now you can display a form with the agence details for editing
    echo "<form action='insertAgence.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $agence['id'] . "'>";
    echo "<input type='text' id='updated_longitude' name='updated_longitude' placeholder='Updated Longitude' value='" . $agence['longitude'] . "' required>";
    echo "<input type='text' id='updated_latitude' name='updated_latitude' placeholder='Updated Latitude' value='" . $agence['latitude'] . "' required>";
    echo "<input type='text' id='updated_adresse' name='updated_adresse' placeholder='Updated Adresse' value='" . $agence['adresse'] . "' required>";
    echo "<input type='text' id='updated_bank_id' name='updated_bank_id' placeholder='Updated Bank ID' value='" . $agence['bank_id'] . "' required>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}




// ************************************************************************************************************************


// Handling the Edit button
if (isset($_POST['edit_bank'])) {
    $id = $_POST['edit_bank'];

    // Fetch the role record based on the ID
    $selectRole = "SELECT * FROM bank WHERE id = ?";
    $statement = $conn->prepare($selectRole);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $role = $result->fetch_assoc();

    // Now you can display a form with the role details for editing
    echo "<form action='insertBank.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $role['id'] . "'>";
    echo "<input type='text' name='updated_name' value='" . $role['name'] . "' required>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}


// ************************************************************************************************************************




if (isset($_POST['edit_distributeur'])) {
    $id = $_POST['edit_distributeur'];

    // Fetch the distributeur record based on the ID
    $selectDistributeur = "SELECT * FROM distributeur WHERE id = ?";
    $statement = $conn->prepare($selectDistributeur);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $distributeur = $result->fetch_assoc();

    // Now you can display a form with the distributeur details for editing
    echo "<form action='insertDistributeur.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $distributeur['id'] . "'>";
    echo "<input type='text' name='updated_longitude' value='" . $distributeur['longitude'] . "' placeholder='longitude' required>";
    echo "<input type='text' name='updated_latitude' value='" . $distributeur['latitude'] . "' placeholder='latitude' required>";
    echo "<input type='text' name='updated_adresse' value='" . $distributeur['adresse'] . "' placeholder='adresse' required>";
    echo "<input type='number' name='updated_agence_id' value='" . $distributeur['agence_id'] . "' placeholder='agence_id' required>";
    echo "<input type='submit' name='update_btn' value='Update'>";
    echo "</form>";
}


// ************************************************************************************************************************



if (isset($_POST['edit_transaction'])) {
    $id = $_POST['edit_transaction'];

    // Fetch the transaction record based on the ID
    $selectTransaction = "SELECT * FROM transaction WHERE id = ?";
    $statement = $conn->prepare($selectTransaction);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $transaction = $result->fetch_assoc();

    // Now you can display a form with the transaction details for editing
    echo "<form action='insertTransaction.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $transaction['id'] . "'>";
    echo "<select name='updated_type' required>";
    echo "<option value='credit' " . ($transaction['type'] == 'credit' ? 'selected' : '') . ">Credit</option>";
    echo "<option value='debit' " . ($transaction['type'] == 'debit' ? 'selected' : '') . ">Debit</option>";
    echo "</select>";
    echo "<input type='number' name='updated_amount' value='" . $transaction['amount'] . "' required>";
    echo "<input type='text' name='updated_account_id' value='" . $transaction['account_id'] . "' required>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}


// ************************************************************************************************************************





if (isset($_POST['edit_user'])) {
    $id = $_POST['edit_user'];

    // Fetch the user record based on the ID
    $selectUser = "SELECT * FROM user WHERE id = ?";
    $statement = $conn->prepare($selectUser);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();

    // Now you can display a form with the user details for editing
    echo "<form action='insertUser.php' method='post'>";
    echo "<input type='hidden' name='update_id' value='" . $user['id'] . "'>";
    echo "<input type='text' name='updated_usersnames' placeholder='User Name' value='" . $user['usersnames'] . "' required>";
    echo "<input type='password' name='updated_passwords' placeholder='User Password'>";
    echo "<input type='number' name='updated_adresse_id' placeholder='Id-Adresse' value='" . $user['adresse_id'] . "' required>";
    echo "<input type='number' name='updated_agence_id' placeholder='Id-agence' value='" . $user['agence_id'] . "' required>";
    echo "<input type='number' name='updated_role_id' placeholder='Id-role' value='" . $user['role_id'] . "' required>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}
