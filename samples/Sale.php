<?php
// This sample demonstrates how to run a sale request, which combines an
// authorization with a capture in one request.

// Using Composer-generated autoload file.
require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
// require_once(__DIR__ . '/../lib/CybsSoapClient.php');


// Before using this example, you can use your own reference code for the transaction.
$referenceCode = 'your_merchant_reference_code';

$client = new CybsSoapClient();
$request = $client->createRequest($referenceCode);




// reasonCode = 100
// requestID = 4872556717896872204008
// requestToken = Ahj/7wSTCCRO5wPqS5boESDdi2aNmjZpHtNY1iFakJcNWgbDwClw1aBsPaQN1dNw8MmkmW6QHgrYwJyYQSJ3OB9SXLdAeEBY
// ccAuthReply->reasonCode = 100
// 100


//$request = array();
//$request['ccAuthService_run'] = 'true';
//$request['merchantID'] = 'my_merchant_id';
//$request['merchantReferenceCode'] = 'my_reference_code';
// Populate $request
//$reply = $client->runTransaction($request);


echo "<pre>"; print_r($reply);

// Build a sale request (combining an auth and capture). In this example only
// the amount is provided for the purchase total.
$ccAuthService = new stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;




 // $ccCreditService = new stdClass();
            // $ccCreditService->run = "true";
            // $ccCreditService->captureRequestToken = 'Ahj/7wSTCCRO5wPqS5boESDdi2aNmjZpHtNY1iFakJcNWgbDwClw1aBsPaQN1dNw8MmkmW6QHgrYwJyYQSJ3OB9SXLdAeEBY';
            // $ccCreditService->captureRequestID = '4872556717896872204008';
            // $this->_request->ccCreditService = $ccCreditService;

            // $purchaseTotals = new stdClass();
            // $purchaseTotals->grandTotalAmount = 12;
            // $purchaseTotals->purchaseTotals = 68.42;

           // $reply = $client->runTransaction($purchaseTotals);


// echo "<pre>"; print_r($reply);





die;
$ccCaptureService = new stdClass();
$ccCaptureService->run = 'true';
$request->ccCaptureService = $ccCaptureService;

$billTo = new stdClass();
$billTo->firstName = 'Test';
$billTo->lastName = 'Doe';
$billTo->street1 = '1295 Charleston Road';
$billTo->city = 'Mountain View';
$billTo->state = 'CA';
$billTo->postalCode = '94043';
$billTo->country = 'US';
$billTo->email = 'null@cybersource.com';
$billTo->ipAddress = '10.7.111.111';
$request->billTo = $billTo;

$card = new stdClass();
$card->accountNumber = '4111111111111111';
$card->expirationMonth = '12';
$card->expirationYear = '2020';
$request->card = $card;

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'USD';
$purchaseTotals->grandTotalAmount = '90.01';
$request->purchaseTotals = $purchaseTotals;

$reply = $client->runTransaction($request);

// This section will show all the reply fields.
echo '<pre>';
print("\nRESPONSE: " . print_r($reply, true));
echo '</pre>';
