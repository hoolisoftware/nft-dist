<?php
include 'db.php';
if (!class_exists('Curl\Curl')) {
    require_once 'lib/Curl.php';
}
require_once ("lib/BillPaymentsException.php");
require_once ("lib/BillPayments.php");

$secretkey = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6IjNzaGpheC0wMCIsInVzZXJfaWQiOiI3OTM4MTQyMDUzNyIsInNlY3JldCI6IjVmNmJjNzcwOWI2ZDU4NjJmNGUzMzdmYzU2MDRkNTU3NjYyYjc5NDZhMzVmMWNmMzBkNTE4YWUwNzc5M2Y3ZmMifX0=';
$publickkey = '48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iP4xAdkDJUAcJQa4DR5CQQC8oTtywtYbjcA4Y9bE6hCxKNE7vz3vh3vu467KHjjEJLyeDmWa8DMrKPBp2oHM3XL82vBD8JvQanoWkiAShKP';

$cur = 'RUB';
$comment = 'Платёж';
define('SECRET_KEY_Q',$secretkey);
define('PUBLIC_KEY_Q', $publickkey);

$billPayments = new Qiwi\Api\BillPayments(SECRET_KEY_Q);

$tok = 0;

$amount = 0;

$wallet = '';
$mylo = '';
if(isset($_POST['count'])){$tok = (int)$_POST['count'];
if(isset($_POST['mylo'])){$mylo = $_POST['mylo'];}
if((isset($_POST['wallets'])) AND ($_POST['wallets'] !=='')){$wallets = $_POST['wallets']; }  else{$wallets = 'no';}
    $amount = $tok*8000;
    $billId= time();
  $dat = date('Y-m-d H:i:s');  
 $surl ="https://".$_SERVER['HTTP_HOST']."/success.php?myorder=".$billId."";  
 
$datas = R::dispense('orders');
$datas->id_order = $billId;
$datas->amount =  $amount;
$datas->date_order = $dat;
$datas->email =  $mylo;
$datas->ton = $wallets;
$datas-> status = 1;
R::store($datas);
 
 
    
$exp= $billPayments->getLifetimeByDay(); 
 
$fields = [
  'PublicKey' => PUBLIC_KEY_Q, 
  'BillId'=>$billId,
  'amount' => $amount,
  'currency' => $cur,
  'comment' => $comment,
  'expirationDateTime' => $exp,
  'themeCode'=> '',
  'email' => '',
  'account' => '',
  'successUrl' => $surl
]; 
 
 $response = $billPayments->CreateBill($billId,$fields);
 sleep(2);
 echo '<meta http-equiv="refresh" content="1;URL='.$response['payUrl'].'">';   
    
    
    
    
    
}else{
    
    print_r($_POST);
    echo 'Error';
    exit;
}




