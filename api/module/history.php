<!DOCTYPE html>
<html lang="pl">

    <head>
        <title></title>
        <link rel="stylesheet" href="history.css" />
        <meta charset="UTF-8" />
    </head>

    <body>

<?php

if(!isset($_GET['token'])){

}else{
	
if ($_GET['token']==213344||$_GET['token']=="213344"){
	

foreach (glob('../history/*') as $f) {
    
    echo '<h1>'.basename($f).'</h1>';
    
    $data = file($f, FILE_IGNORE_NEW_LINES);
    echo '<table>';
    foreach ($data as $e) {
        $d = explode('&', $e);
        echo '<tr>'
               // .'<td>'.date('H:i:s', (int)$d[0]).'</td>'
                .'<td>'.$d[0].'</td>'
                .'<td>'.$d[1].'</td>'
                .'<td>'.$d[2].'</td>'
                .'<td>'.$d[3].'</td>'
                
            .'</tr>';
    }
    echo '</table>';
 }

} elseif($_GET['token']==213344||$_GET['token']=="2133"){
        foreach (glob('../history/history.txt') as $f) {
            echo '<h1>'.basename($f).'</h1>';
            $data = file($f, FILE_IGNORE_NEW_LINES);
            echo '<table>';
            foreach ($data as $e) {
                $d = explode('&', $e);
                echo '<tr>'
                       // .'<td>'.date('H:i:s', (int)$d[0]).'</td>'
                        .'<td>'.$d[0].'</td>'
                        .'<td>'.$d[1].'</td>'
                        .'<td>'.$d[2].'</td>'
                        .'<td>'.$d[3].'</td>'
                        
                    .'</tr>';
            }
            echo '</table>';
         }  


}

//-------------- Dtabs

if (!isset($_GET['us'])&&!isset($_GET['pw'])||!isset($_POST['us'])&&!isset($_POST['pw'])){
	include("../404.html");
}else{

foreach (glob('../history/history.txt') as $f) {
    $data = file($f, FILE_IGNORE_NEW_LINES);
    foreach ($data as $e) {
        $d2 = explode('&', $e);
		//login chk
       	if($_GET['us']==$d2[1]){
			
		 if($_GET['pw']==$d2[2]){
			 $cmd="d1";
			 
		 }
		 
	    }else{
			
		}
        // signup chk
    }

 }
if(!isset($cmd)){
	echo "d0";
}elseif(isset($cmd)){
	breaks($cmd);
}


}
}



function breaks($cmd){
	echo $cmd;

}

?>
    
    </body>
</html>