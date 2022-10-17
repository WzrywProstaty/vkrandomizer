<?php

/*
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
*/

require ("TextMassive.php");

require ("Randomizer.php");

require ("RequestLogger.php");

require ('photorandom.php');

//------------------datazzz---------------//
$apikey = "";

$confirmtoken = '';
//------------------end of datazzz--------//


function vk_msg_send($chat_id, $keyboard, $text){
	
	global $apikey;
	
	$request_params = array(
		'peer_id'		=>	$chat_id, 
		'random_id'		=>	rand(2, 2*10**9), 
		'message'		=>	$text, 
		'access_token'	=>	$apikey,
		'v'				=>	'5.92',
		'keyboard'		=>	$keyboard
	);
	$get_params = http_build_query($request_params); 
	
	file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
}

#vk_msg_send (1, $TextPaste); //ВОТ ТУТ ОТПРАВЛЯЕТСЯ ТЕКСТ РАНДОМНЫЙ

$input_data = json_decode(file_get_contents('php://input'));

switch ($input_data -> type)
	{
		case "confirmation":
			echo $confirmtoken;
		break;
		
		case "message_new":
			
			$message_text = $input_data -> object -> text;
			
			$peer_id = $input_data -> object -> peer_id;
			
				if ($message_text == "1")
					{
						vk_msg_send($peer_id, null, $TextPaste);
					};
					
				if ($input_data -> object -> attachments[0] -> type == "photo")
					{		
							vk_msg_send($peer_id, null, "ты отправил(а) мне фотку, сейчас её обработаем!");
							
							$photolinkload = $input_data -> object -> attachments[0] -> photo -> sizes[6] -> url;
							
							vk_msg_send($peer_id, null, PhotoCommand($photolinkload));
					}
				
		echo 'ok';
		break;
	}



#echo 'ok';

?>