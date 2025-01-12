<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Mailjet\Resources;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            $mj = new \Mailjet\Client('68dccad4f67683a3086bc319c251e2a6', 
                                    'af6a37eacd394da8eac589e3dda2ebf6', 
                                    true, 
                                    ['version' => 'v3.1']);

            // Get form data
            $name = $request->input('name', 'Not provided');
            $email = $request->input('email', 'Not provided');
            $phone = $request->input('phone', 'Not provided');
            $message = $request->input('message', 'Not provided');
            $service = $request->input('service', 'Not provided');

            // Prepare email content
            $emailContent = "
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Phone:</strong> {$phone}</p>
                <p><strong>Service:</strong> {$service}</p>
                <p><strong>Message:</strong> {$message}</p>
            ";

            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "contact.rcln@gmail.com",
                            'Name' => "contact.rcln@gmail.com"
                        ],
                        'To' => [
                            [
                                'Email' => "carl27matta@gmail.com",
                                'Name' => "Carl Matta"
                            ],
                            [
                                'Email' => "lynnalfarran@gmail.com",
                                'Name' => "Lynn Farran"
                            ],
                            [
                                'Email' => "ridaajam999@gmail.com",
                                'Name' => "Rida Ajam"
                            ],
                        ],
                        'Subject' => "New Contact Form Submission",
                        'HTMLPart' => $emailContent,
                        'TextPart' => strip_tags($emailContent)
                    ]
                ]
            ];

            $response = $mj->post(Resources::$Email, ['body' => $body]);

            if ($response->success()) {
                return 'MF000'; // Success code expected by the front-end
            } else {
                \Log::error("Mailjet error: " . json_encode($response->getData()));
                return 'MF254'; // Error code expected by the front-end
            }

        } catch (\Exception $e) {
            \Log::error("Contact form error: " . $e->getMessage());
            return 'MF254'; // Error code expected by the front-end
        }
    }
} 