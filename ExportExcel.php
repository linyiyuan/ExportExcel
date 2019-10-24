<?php 
ExportExcel($data);

function ExportExcel($data) {

}


function gethttpcnt($url,$data = array(), $timeout = 30, $mode = "POST"){
    try{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        $cnt = curl_exec($ch);
        curl_close($ch);
    }catch(Exception $e){
        throw new Exception($e -> getMessage());
    }
    return $cnt;
}

 ?>
