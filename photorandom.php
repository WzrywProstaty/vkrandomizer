<?php


function PhotoFilter()
	{	
		$brighcont	=	"-brightness-contrast" . " " . rand(-20.5, 20.5) . "x" . rand(-20.5, 20.5) . "%";
		$modulate	=	"-modulate" . " " . "100" . "," . rand(70, 130) . "," . rand(85, 115);		
		$rotate 	=	"-rotate" . " " . rand(-2.51, 2.51);
		
		$filterarg = $brighcont . " " . $modulate . " " . $rotate;
		
		return $filterarg;
	}
	
	
function PhotoCommand($photolink)
	{
		shell_exec("wget $photolink -O ImageDownload.jpg && mv ImageDownload.jpg /home/BotDownloads/");
		
		shell_exec("convert /home/BotDownloads/ImageDownload.jpg " . PhotoFilter() . " ImageConvert.jpg && mv ImageConvert.jpg /home/yandex-disk/");
		
		$uploadedurl =  shell_exec("sudo yandex-disk publish /home/yandex-disk/ImageConvert.jpg");
		
		return($uploadedurl);
	}

function PhotoRemove()
	{
		shell_exec("rm /home/BotDownloads/ImageDownload.jpg && rm /home/BotDownloads/ImageConvert.jpg");
	}

?>