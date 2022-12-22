<?php
include 'db.php';

if(isset($_POST['wallet'])){
$wallet = $_POST['wallet']; 
$id_order = $_POST['order']; 
$data = R::findOne('orders', 'id_order  = ?', [$id_order]);

$idd = $data['id'];
$status = $data['status'];
if((isset($idd)) AND ($status == 2)){
  $data = R::load('orders', $idd);
$data->ton = $wallet;
R::store($data);  
    
  
echo 'Успешно! Ожидайте перевода в течении нескольких минут.'; 



$data = 
    [
"order"=>$id_order,
"success"=>"True"
];
     $ch = curl_init('https://cnet.store/post.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);

}

    
}

