<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if composer autoload exists
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    die('MF254: Composer autoload.php not found. Please run composer install');
}

require __DIR__ . '/vendor/autoload.php';
use \Mailjet\Resources;

try {
    // Initialize Mailjet
    $mj = new \Mailjet\Client('68dccad4f67683a3086bc319c251e2a6', 'af6a37eacd394da8eac589e3dda2ebf6', true, ['version' => 'v3.1']);

    // Debug: Log POST data
    error_log("POST data received: " . print_r($_POST, true));

    // Get form data
    $name = isset($_POST['name']) ? $_POST['name'] : 'Not provided';
    $email = isset($_POST['email']) ? $_POST['email'] : 'Not provided';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : 'Not provided';
    $message = isset($_POST['message']) ? $_POST['message'] : 'Not provided';
    $service = isset($_POST['service']) ? $_POST['service'] : 'Not provided';

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
                    'Name' => "Website Contact Form"
                ],
                'To' => [
                    [
                        'Email' => "carl27matta@gmail.com",
                        'Name' => "Carl Matta"
                    ],
                    [
                        'Email' => "carlmatta3@gmail.com",
                        'Name' => "Carl Matta"
                    ],
                ],
                'Subject' => "New Contact Form Submission",
                'HTMLPart' => $emailContent,
                'TextPart' => strip_tags($emailContent)
            ]
        ]
    ];

    // Debug: Log the request body
    error_log("Mailjet request body: " . print_r($body, true));

    // Send email using Mailjet
    $response = $mj->post(Resources::$Email, ['body' => $body]);

    // Debug: Log the response
    error_log("Mailjet response: " . print_r($response->getData(), true));

    if ($response->success()) {
        die('MF000'); // Success code expected by the front-end
    } else {
        error_log("Mailjet error: " . print_r($response->getStatus(), true));
        throw new Exception('Failed to send email: ' . $response->getReasonPhrase());
    }

} catch (Exception $e) {
    error_log("Exception caught: " . $e->getMessage());
    die('MF254'); // Error code expected by the front-end
}