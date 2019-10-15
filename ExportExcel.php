<?php 
ExportExcel($data);

function ExportExcel($data) {
    try {
        $url = '119.23.12.200:8001/api.php';

        $sendData['method'] = 'recodeAnyData';
        $sendData['data'] = $data;

        $sendData = json_encode($sendData);

        $res = gethttpcnt($url, $sendData);
        var_dump($res);
        exit;

        if (!$res) {
            throw Exception('Error！！');
        }

        $res = json_decode($res, true);
        
        if ($res['code'] == 200) {
            return true;
        }else{
            throw Exception('Error！！');
        }
    } catch (Exception $e) {
        var_dump($e);
        return $e->getMessage();
    }
}


function gethttpcnt($url,$data = array(),$username = '',$password = '',$timeout = 30, $mode = "POST"){
    try{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        if($username && $password){
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
        }
        $cnt = curl_exec($ch);
        curl_close($ch);
    }catch(Exception $e){
        throw new Exception($e -> getMessage());
    }
    return $cnt;
}

 ?>