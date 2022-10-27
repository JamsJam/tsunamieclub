<?php
namespace App\Service;

use Mailjet\Client;
use Mailjet\Resources;


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
                    'TextPart' => $content, //? Contenue traduit en texte pour les boite mail ne lisant pas le HTML
                    'HTMLPart' => $content,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => $variables
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();//&& dd($response->getData()); 
    }
}