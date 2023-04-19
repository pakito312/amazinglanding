<?php
  $receiving_email_address = 'contact@amazingpayment.io';
        $body="Salut,\n\nNous vous remercions de vous être inscrit à notre newsletter. Vous recevrez bientôt des nouvelles et des offres spéciales de notre part.\n\nCordialement,\nL'équipe de Amazing payment";
        $file = 'emails.txt';
        $email = $_POST["email"];
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $message = [
            'Messages' => [ [
                'From' => [
                  'Email' => 'info@amazingpayment.fr',
                  'Name' => 'Amazing Payment',
                ],
                'To' => [
                     [
                    'Email' => $_POST['email'],
                    'Name' => "",
                  ],
                ],
                'Subject' => "Confirmation d'inscription a la newletter ".time(),
                'TextPart' => 'Greetings from Amazing payment',
                'HTMLPart' => $body,
               
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
          echo "OK";
        }else{
          echo "error";
        }
  