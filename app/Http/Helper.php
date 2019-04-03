<?php
function level()
{
    $level=array(
        '0'=>'Administrator',
        '1'=>'Staf Admin',
        '2'=>'Admin Lapangan'
    );
    return $level;
}
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
function sendFCM($title, $message, $firebasedevicetoken)
{
    $curl = curl_init();
    $fields = [
        "notification" => [
            "title" => $title,
            "body" => $message
        ],
        "to" => $firebasedevicetoken
    ];
    $fields = json_encode ( $fields );
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $fields,
      CURLOPT_HTTPHEADER => array(
        "authorization: key=AAAASm7nXdM:APA91bGtcDa6mQvYFNrL_D37-X4r_RVGuUTkHp2ozKAdKczUyt3bAHYfiNfsa5JUVjajRhYl6B3iWehKf12zNYN0nqCOYhaMUqVV0zclhyOpT3AQBJVE7BBCEUEDoLdHAaGqtIzdnu5C",
        "content-type: application/json"
      ),
    ));
    // "authorization: key=AIzaSyAhdCpPHn--6nSxUuv-2Bck2OcIO08iejw",
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
}
?>