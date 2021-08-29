<?php 

function decrypt($data, $key) {
    return openssl_decrypt(base64_decode($data), 'aes-128-ecb', $key, OPENSSL_PKCS1_PADDING);
}

 function parsing_react_api($v)
{
    //date---parsing
     $data['dateIndex']=strpos($v, '/');
     $data['dateValue']=substr($v,0,  $data['dateIndex']);
        $rest=substr($v, $data['dateIndex']+1);
    //level---parsing
     $data['levelIndex']=strpos($rest, '/');
     $data['levelValue']=substr($rest,0,  $data['levelIndex']);
    //seerialpayment---parsing
     $rest=substr($rest, $data['levelIndex']+1);
     $data['nomorbuktiValue']=$rest;
     if (strlen($data['dateValue'])>14) {
        echo "Encripsi Tiket Bermasalah !!";
         die;
     }else if(strlen($data['dateValue'])<14){
        echo "Encripsi Gagal !! periksa Key AES ECB atau Periksa Krakter Yang Kamu Kirimkan";
        echo "<br>";
        echo $v;
         die;

     }else{

     return $data;
     }
}








?>
