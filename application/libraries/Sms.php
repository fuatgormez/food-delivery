<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Sms
{
    private $_CI;

    function __construct()
    {
        $this->_CI = &get_instance();
        $this->_CI->load->model('backend/admin/Model_common');
    }

    public function index()
    {
        redirect(base_url());
    }

    public function twilio ($msg)
    {
        
        // Your Account SID and Auth Token from console.twilio.com
        //lafcanbazi@gmail.com
        // $sid = "AC21a06464acddb3bc9971eb1fd236f3ee";
        //erdemly1919@gmail.com
        $sid = "ACab3fcf397a3bb03278b630718b2ccf3d";
        $token = "f8aaef36d05d119bbfc6b9cd34f48a40";
        $client = new \Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
        $client->messages->create(
            // The number you'd like to send the message to
            '+4917682136135',
            [
                // A Twilio phone number you purchased at https://console.twilio.com
                'from' => '+12705173084',
                // The body of the text message you'd like to send
                'body' => $msg
            ]
        );
    }

    public function seven77 ($phone, $sms_code)
    {
        $client = new \Sms77\Api\Client('08VB1mLG9FUqV3Mw1OnjGEhwbz4bkjjawMExxVWXl6AseW8pWpAq40OCO3w5YXXz');
        $params = new \Sms77\Api\Params\SmsParams();
        $client->sms($params
            // ->setTo('+4901234567890')
            ->setTo($phone)
            ->setText($sms_code));
    }
}
