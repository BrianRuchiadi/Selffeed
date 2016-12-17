<?php

class Paypal_Model extends CI_Model {

    public function __construct() {
        parent::__construct();

        // parameters

        $this->username = "reece_api1.selfFeed.co"; //"ruchiadibrian-facilitator_api1.yahoo.com";
        $this->password = "T8EDAHKQLGF37ZA5";  //"GWMH3V6G3VHYLEBB";
        $this->signature = "AFcWxV21C7fd0v3bYYYRCpSSRI31A0mSLwEApM-Z62.L.8ekF6o4kJMW"; //"AFcWxV21C7fd0v3bYYYRCpSSRl31ADIr30Bs7fN-Na5C2GCbQkdsAerm";
        $this->return_url = "http://localhost/selffeed/index.php/Checkout/success";
        $this->cancel_url = "http://localhost/selffeed/index.php/Checkout/";
        $this->endpoint = "https://api-3t.paypal.com/nvp";// "https://api-3t.sandbox.paypal.com/nvp?"; 

    }

    public function setExpressCheckout($checkout) {
        $url = $this->endpoint;
        $data = array(
            "USER" => $this->username,
            "PWD" => $this->password,
            "SIGNATURE" => $this->signature,
            "METHOD" => "SetExpressCheckout",
            "VERSION" => 204.0,
           
            "PAYMENTREQUEST_0_CURRENCYCODE" => "MYR",
            "RETURNURL" => $this->return_url,
            "CURRENCY" => "MYR",
            "CANCELURL" => $this->cancel_url,
           
        );
        
        $data = array_merge($data, $checkout);
      
        foreach ($data as $key => $value) {
            $url.=$key . "=" . $value . "&";
        }
       
        //die(var_dump($data));

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        $result = urldecode($result);
        echo $result;
        echo "<hr />";

        die(var_dump($result));
        if (strtoupper($ACK) == "SUCCESS") {
            $link = $this->getExpressCheckoutDetails($TOKEN);
            $ch = curl_init($link);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);
            curl_close($ch);
            $result = urldecode($result);
            parse_str($result);

            if (strtoupper($ACK) == "SUCCESS") {

                header("Location:" . "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=" . $TOKEN);
            }
        } else {
            die("ERROR");
        }
    }

    public function doExpressCheckoutPayment($token, $payerID) {
        $url = $this->endpoint;
        $data = array(
            "PAYERID" => $payerID,
            "TOKEN" => $token,
            "USER" => $this->username,
            "PWD" => $this->password,
            "SIGNATURE" => $this->signature,
            "METHOD" => "DoExpressCheckoutPayment",
            "VERSION" => 204.0,
            "PAYMENTREQUEST_0_AMT" => 100,
            "PAYMENTREQUEST_0_CURRENCYCODE" => "MYR",
            "RETURNURL" => $this->return_url,
            "CANCELURL" => $this->cancel_url,
            "L_PAYMENTREQUEST_0_NAME0" => "TEST",
            "L_PAYMENTREQUEST_0_AMT0" => 100,
            "L_PAYMENTREQUEST_0_QTY0" => 1
        );
        foreach ($data as $key => $value) {
            $url.=$key . "=" . $value . "&";
        }

        return $url;
    }

    public function getExpressCheckoutDetails($token) {
        $url = $this->endpoint;
        $data = array(
            "TOKEN" => $token,
            "L_BILLINGTYPE0" => "MerchantInitiatedBillingSingleAgreement",
            "USER" => $this->username,
            "PWD" => $this->password,
            "SIGNATURE" => $this->signature,
            "METHOD" => "getExpressCheckoutDetails",
            "VERSION" => 204.0,
            "RETURNURL" => $this->return_url,
            "CANCELURL" => $this->cancel_url
        );
        foreach ($data as $key => $value) {
            $url.=$key . "=" . $value . "&";
        }

        return $url;
    }

    public function sendRequest($url) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 3. execute and fetch the resulting HTML output
        $output = curl_exec($ch);

        if ($output === FALSE) {

            echo "cURL Error: " . curl_error($ch);
        } else {

            $paypalResponse = array();
            parse_str($output, $paypalResponse);

            if ($paypalResponse['ACK'] !== 'Success') {
                
            }
            return $paypalResponse;
        }
    }

}
