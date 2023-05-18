<?php

// Retrieve the form data
$username=$_POST['username'];
$phonenumber=$_POST['phonenumber'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=$_POST['password'];

$confirmer=$_POST['confirmer'];


//database connection
$db = oci_connect('scott', 'moustaidyoussef', '/USERS');
if (!$db) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare and execute the SQL statement
$statement = oci_parse($db, 'INSERT INTO users (username, phone,day,month,year,gender,email,password) VALUES (:username, :phonenumber,:phonenumber,:day,:month,:year,.gender,:email,:password)');
oci_bind_by_name($statement, ':username', $username);
oci_bind_by_name($statement, ':phonenumber', $phonenumber);
oci_bind_by_name($statement, ':day', $day);
oci_bind_by_name($statement, ':month', $month);
oci_bind_by_name($statement, ':year', $year);
oci_bind_by_name($statement, ':gender', $gender);
oci_bind_by_name($statement, ':email', $email);
oci_bind_by_name($statement, ':password', $password);
oci_execute($statement);

// Close the database connection
oci_close($db);

?>