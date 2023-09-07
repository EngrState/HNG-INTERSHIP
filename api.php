<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $slack_name= $_GET['slack_name'];
    $track= $_GET['track'];

    // check if the slack name or track is empty
    if(!empty($slack_name) && !empty($track) ){

        $dateTime = new DateTime('now', new DateTimeZone('UTC')); // Create a DateTime object with UTC timezone
        $date=  date("l");
        $time = $dateTime->format("Y-m-d\TH:i:s\Z"); 
      
        //convert the  response to JSON format
        $response = json_encode(['slack_name'=>$slack_name , 
                                    'current_day'=>$date,
                                    'utc_time'=>$time,
                                    'track'=>$track, 
                                    'github_file_url'=>'https://github.com/EngrState/HNG-INTERSHIP/blob/b12c45cabd9064bbba8b634b76d9243fb99a661e/api.php',
                                    'github_repo_url'=>'https://github.com/EngrState/HNG-INTERSHIP.git',
                                    'status_code'=>'200']);
        echo $response;
        return;

            
        
    }else{
        $response = json_encode(['status_code'=>'400','message'=>'input all field']);
            echo $response;
                return;
    }
}else{
    $response = json_encode(['status_code'=>'400','message'=>'The server could not understand the request.']);
            echo $response;
                return;
}
?>
