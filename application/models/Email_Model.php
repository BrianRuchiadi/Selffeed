<?php

class Email_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        define("USER", "crossoverandscore@gmail.com");
        define("PASS", "Basketball4ever");
    }

    public function sendMail($target, $title, $body) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'sg2plcpnl0204.prod.sin2.secureserver.net',
            'smtp_port' => 465,
            'smtp_user' => 'admin@selffeed.co',
            //'smtp_pass' => 'klzccokfcuhxwzby',
            'smtp_pass' => ';sUS6O9oPC2M',
            'mailtype' => 'html',
            'starttls'  => true,
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('admin@selffeed.co');
        $this->email->to($target);

        $this->email->subject($title);
        $this->email->message($body);
        $result = $this->email->send();

        if ($result == "true") {


            return true;
        }

        var_dump($this->email->print_debugger());
        return false;
    }

}
