<?php
include 'db.php';

$responseJson_str = file_get_contents('php://input');
$responseJson = '[' . $responseJson_str . ']';
$responseJson = $responseJson_str;
$response = json_decode($responseJson, true);
$siteId = $response['bill']['siteId'];
$billId = $response['bill']['billId'];
$amountv= $response['bill']['amount']['value'];
$cur= $response['bill']['amount']['currency'];
$status = $response['bill']['status']['value'];
if($status == 'PAID'){
$data_order = R::findOne('orders', 'id_order = ?', [$billId]);
if(isset($data_order)){
$book = R::load('orders',$data_order->id);
$book->status = 2;
R::store($book); 
}

}
