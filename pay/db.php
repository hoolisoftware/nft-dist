<?php
include 'lib/rb.php';

R::setup( 'mysql:host=localhost;dbname=u1652110_payq','u1652110_payqusr', 'jY5dM9cM4n' , false);  
if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}
