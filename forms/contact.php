<?php
  $receiving_email_address = 'info@amazingpayment.fr';
  
        $message = [
            'Messages' => [ [
                'From' => [
                  'Email' => $_POST['email'],
                  'Name' => $_POST['name'],
                ],
                'To' => [
                     [
                    'Email' => $receiving_email_address,
                    'Name' => "Contact form",
                  ],
                ],
                'Subject' => $_POST['subject'].' '.time(),
                'TextPart' => 'Greetings from Amazing payment',
                'HTMLPart' =>$_POST['message'],
               
              ],
            ],
          ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailjet.com/v3.1/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type' => 'application/json',
        ]);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, '6d30483b9e5a95c53cd1227125bfb39e:12b7bbe501daadf5f6e87bf7dd00f0a7');
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($message));

        $response = curl_exec($ch);

        curl_close($ch);
        $response=json_decode($response,true);
        if(isset($response['Messages'])){
          echo "ok";
        }else{
          echo "error";
        }
  
?>
