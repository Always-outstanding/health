<?php

include "../connect.php";

$username = filterRequest("username");
$id_number = filterRequest("id_number");
$mobile = filterRequest("mobile");
$birth = filterRequest("birth");
$email = filterRequest("email");
$password = sha1("password");
$veriyfiycode = "0";

$stmt = $con->prepare("SELECT * FROM users WHERE user_id_number = ? OR user_mobile = ?")
$stmt->execute(array($id_number , $mobile))
$count =$stmt->rowCount();
if($count > 0){
    printFailure("رقم الهوية او رقم الهاتف موجود سابقا");
}else{
    $data =array(
        "user_name" => $username,
        "user_id_number	" => $id_number,
        "user_mobile" => $mobile,
        "user_birth" => $birth,
        "user_email" => $email,
        "user_pass" => $password,
        "user_veriyfiycode" => "0",

    );

    insertData("users" , $data)
}

?>