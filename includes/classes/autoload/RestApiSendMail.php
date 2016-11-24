<?php

class RestApiSendMail extends RestApi{

    public function post($params){

        $name = tep_db_prepare_input($params['POST']['name']);
        $email_address = tep_db_prepare_input($params['POST']['email']);
        $enquiry = tep_db_prepare_input($params['POST']['enquiry']);
        $subject = tep_db_prepare_input($params['POST']['subject']);
        if (!tep_validate_email($email_address)) {
            return array(array(data => 'send fail.'));
        }
        tep_mail(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, $subject, $enquiry, $name, $email_address);

        return array(array(data => 'send success.'));
    }
}