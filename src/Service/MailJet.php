<?php

namespace App\Service;

use Mailjet\Client;
use Mailjet\Resources;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class MailJet
{
    
    

    
    
    public function send($key, $secret_key, $to_email, $to_name, $subject, $content,$variables = [] )
    {
        $mj = new Client($key, $secret_key ,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                            [
                                'From' => [
                                            'Email' => "j.antoine971@hotmail.fr",
                                            'Name' => "Tsunami Contact"
                                        ],
                                'To' => [
                                            [
                                                'Email' => $to_email,
                                                'Name' => $to_name
                                            ]
                                        ],
                                'TextPart' => $content,
                                'HTMLPart' => $content,
                                'TemplateLanguage' => true,
                                'Subject' => $subject,
                                'Variables' => $variables
                            ]
                        ]
        ];
        // $body["Messages"][0]["Variables"] = [];
        // dd($body);
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();//&& dd($response->getData()); 
        // 
    }
}