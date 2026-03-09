<?php

$conn=mysqli_connect("localhost","root","","expense_tracker");

$action=$_GET['action'];

if($action=="register"){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$budget=$_POST['budget'];

$sql="INSERT INTO users(name,email,password,budget)
VALUES('$name','$email','$password','$budget')";

mysqli_query($conn,$sql);

echo "registered";

}

if($action=="login"){

$email=$_POST['email'];
$password=$_POST['password'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");

if(mysqli_num_rows($result)>0){

$user=mysqli_fetch_assoc($result);

echo json_encode($user);

}else{

echo "fail";

}

}

if($action=="addExpense"){

$user=$_POST['user'];
$amount=$_POST['amount'];
$category=$_POST['category'];
$date=$_POST['date'];

mysqli_query($conn,"INSERT INTO expenses(user_id,amount,category,date)
VALUES('$user','$amount','$category','$date')");

echo "added";

}

if($action=="getExpenses"){

$user=$_GET['user'];

$result=mysqli_query($conn,"SELECT * FROM expenses WHERE user_id='$user'");

$data=[];

while($row=mysqli_fetch_assoc($result)){

$data[]=$row;

}

echo json_encode($data);

}

?>
