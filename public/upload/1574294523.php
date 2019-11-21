<?php 
##########################################################################
/*
The MIT License (MIT)

Copyright (c) 2014 https://voguepay.com

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
##########################################################################



//set variables
$api = 'https://voguepay.com/api/';
$ref = time();
$task = 'refund'; 
$merchant_id = '23383-92992'; //voguepay merchant id
$my_username = 'testing';//voguepay username
$merchant_email_on_voguepay = 'mail@yahoo.com'; //email address on voguepay
$ref = time().mt_rand(0,9999999);
$command_api_token = 'xxxxxxxxx'; 
$hash = hash('sha512',$command_api_token.$task.$merchant_email_on_voguepay.$ref);



$fields['task'] = $task;
$fields['merchant'] = $merchant_id;
$fields['ref'] = $ref;
$fields['hash'] = $hash;
$fields['transaction_id'] = '5ad0aa54718o9'; //Voguepay transaction id for refund
// $fields['amount'] = '100';  if provided, refund will be treated as partial. This field is not required for a full refund.

$fields_string = 'json='.urlencode(json_encode($fields));

//open curl connection
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $api);
curl_setopt($ch,CURLOPT_HEADER, false); //we dont need the headers
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// data coming back is put into a string
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
curl_setopt($ch,CURLOPT_MAXREDIRS,2);
$reply_from_voguepay = curl_exec($ch);//execute post
curl_close($ch);//close connection
var_dump($reply_from_voguepay);



//Result is json string so we convert into array
// $reply_array = json_decode($reply_from_voguepay,true); 
//$reply_array is now and array

// bug fix
// if line 71 does not return an array
// we have noticed that some servers does not interprete the json format as true json
// if this is the case, replace line 71 with
$reply_array = substr($reply_from_voguepay, 3);


//Check that the result is actually from voguepay.com
$received_hash = $reply_array['hash'];
$expected_hash = hash('sha512',$command_api_token.$merchant_email_on_voguepay.$reply_array['salt']);
if($received_hash != $expected_hash || $my_username != $reply_array['username']){
	//Something is wrong. Discard result
	
} else if($reply_array['status'] != 'OK') {
	//Operation failed
	//print_r($reply_array);

//Error Codes
/*
	R001 ---- No Details Found For Transaction ID
	R002 ---- Opps! Transaction id already processed.
	R003 ---- Transaction Refund Failed
	R004 ---- Transaction was not successful on the gateway .
/*


	/*
	array (
	  'id' => NULL,
	  'status' => 'FAIL',
	  'response' => 'R002',
	  'description' => 'Opps! Transaction id already processed.',
	  'salt' => '5aec48a6177142',
	  'hash' => '7f5cf2ca90c39d402b2efc8fed093485f7ea5c04d1305843278b81c4e0407eadb86d7642d6884954e133fadec8f84dce0f62ea8665957ce0ce13ea0c7e05edc0e',
	  'username' => 'test',
	)
	*/
	
} else {
	//Operation successful
	
	//print_r($reply_array) should give the following:
	/*
		array (
		  'id' => '5aec48a6177142',
		  'status' => 'OK',
		  'response' => 'OK',
		  'amount' => 500,
		  'currency' => 'NGN',
		  'description' => 'Successful. Transaction will be processed.',
		  'salt' => '5af049a41cb4a5',
		  'hash' => 'ef792f9cbb1b17a63a01da52885fb1a9fd815869fa5e380651f31a420985efc40e0be3051abaf7ba0456b95fd40b3ca887b65d75e6742957aa691861b4d9e370f4',
		  'username' => 'test',
		)
	*/
	
}

?>