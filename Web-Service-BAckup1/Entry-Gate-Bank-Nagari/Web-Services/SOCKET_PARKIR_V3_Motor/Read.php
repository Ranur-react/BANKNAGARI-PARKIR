<?php 
 function Read($connfig)
{
 	 $reply=socket_read($connfig['socket'], 1024);
		$reply=trim($reply);
		return $reply;  
}



 ?>