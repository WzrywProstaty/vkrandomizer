<?php

function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
		{
        $income_ip = $_SERVER['HTTP_CLIENT_IP'];
		}
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
        $income_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
    else
		{
        $income_ip = $_SERVER['REMOTE_ADDR'];
		}
    return $income_ip;
}

$loglocal = $_SERVER["DOCUMENT_ROOT"] . "/requestlogs/r_log_1.log";

$tolog = get_ip() . " " . date("d.m.Y - \(G:i:s P e\)") . " \"" . file_get_contents('php://input') . "\" " . ";\n";

$fw = fopen($loglocal, 'a');
fwrite ($fw, $tolog);
fclose ($fw);

?>