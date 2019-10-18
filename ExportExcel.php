<?php 
ExportExcel($data);

function ExportExcel($data) {
    try {
        $url = '127.0.0.1';

        $sendData['method'] = 'recodeAnyData';
        $sendData['data'] = $data;

        $sendData = json_encode($sendData);

        $res = gethttpcnt($url, $sendData);
        if (!$res)  throw Exception('Error！！');

        $res = json_decode($res, true);
        
        if ($res['code'] == 200)  return true;
            
        throw Exception('Error！！');
    } catch (Exception $e) {
        return $e->getMessage();
    }
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
