<?php 
include 'pay/lib/rb.php';

R::setup( 'mysql:host=localhost;dbname=u1652110_payq','u1652110_payqusr', 'jY5dM9cM4n' , false);  
if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}
if(($_GET['myorder'])){
    
  $order_id = (int)$_GET['myorder'];  
    
  $data = R::findOne('orders', 'id_order  = ?', [$order_id]);  
  //echo 'Счёт номер '.$_GET['myorder'].' оплачен в ближайшее время мы что-нибудь сделаем.';  
  $status_order = $data['status'];
  $wallet = $data['ton'];
  if($wallet == 'no'){
  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Успешная оплата</title>

<style>

form {
    border: 3px solid #f1f1f1;
    max-width: 450px;
    display: inline-block;
    margin: 0 auto;
}

/* Full-width inputs */
input[type=text], input[type=password] {
   width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
} 
</style>


  </head>
  <body>

<div style = "width: 100%; text-align: center;display: flex;">



 <form id="Sform">
  <input type = "hidden" name = "order" value = "<?php echo $order_id; ?>">
  <div class="container">
    <label for="psw"><b>Адрес TON-кошелька</b></label>
    <input type="text" placeholder="" name="wallet" required> 
       <div id="content_area"></div>
    <button type="button" onclick="ajaxSubmitForm()">Отправить</button>    
  </div>
</form> 
<script type="text/javascript">

function ajaxSubmitForm() {
  const form = document.getElementById( "Sform" );
{document.getElementById("content_area").innerHTML = "<img style = 'width: 120px;max-height: 50px;' src='pay/load.gif'>";}

  if (form.reportValidity()) {
    const FD = new FormData( form );
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() { if (this.readyState == 4 && this.status == 200) { document.getElementById("content_area").innerHTML = this.responseText; } };
    xhttp.open("POST","pay/final_order.php",true);
    xhttp.send( FD );
  }
}
</script>

</div>
  </body>
</html>
  
  <?php
  }else{
  ?>
  
  
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Успешная оплата</title>

<style>

form {
    border: 3px solid #f1f1f1;
    max-width: 450px;
    display: inline-block;
    margin: 0 auto;
}

/* Full-width inputs */
input[type=text], input[type=password] {
   width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
} 
</style>


  </head>
  <body>

<div style = "width: 100%; text-align: center;display: flex;">



 <form id="Sform">
    <label for="psw"><b>Оплата прошла успешно ожидайте перевода.</b></label>
    
</form> 


</div>
  </body>
</html> 
  
  
  
  
 <?php 
  }
  ?>
  
  
 <?php   
}
?>
