<?php
class Email_model extends CI_Model {
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = $this->config->item('sendgrid_api_key');
        require 'vendor/autoload.php';
    }

    public function send_account_request_email($input, $companyId)
    {
        $body = '<h3>' . $input->post('company_name') . " has requested an account!</h3>"
            . '<p><strong>Company Name:</strong> ' . $input->post('company_name') . '</p>'
            . '<p><strong>Contact Name:</strong> ' . $input->post('company_contactName') . '</p>'
            . '<p><strong>Company Email:</strong> ' . $input->post('company_email') . '</p>'
            . '<p><strong>Company Phone:</strong> ' . $input->post('company_phone') . '</p>'
            . '<p><strong>Company City:</strong> ' . $input->post('company_city') . '</p>'
            . '<a href="' . site_url('/profile/approve/'. $companyId) . '">Click here approve request.</a>';
        $sub = "New Account Request";

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('noreply@cableconcrete.com', 'Cable Concrete Calculator');
        $email->setSubject($sub);
        $email->addTo('mmcarthur@iecs.com');
        $email->addContent("text/html", $body);
        $sendgrid = new \SendGrid($this->apiKey);

        $sendgrid->send($email);
    }

    public function send_account_approved_email($companyEmail)
    {
        $body = '<h3>Your request for an account has been approved!</h3>'
            . '<p>Good news! A Cable Concrete representative reviewed your request for an account and approved it!</p>'
            . '<p>To login and get started on running project designs, <a href="' . base_url('/profile/login') . '">Click here.</a></p>'
            . '<p>If you have any questions, comments, or concerns, please contact IECS at 1-800-821-7462.</p>';
        $sub = "Cable Concrete Calculator Account Request";

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('noreply@cableconcrete.com', 'Cable Concrete Calculator');
        $email->setSubject($sub);
        $email->addTo($companyEmail);
        $email->addContent("text/html", $body);
        $sendgrid = new \SendGrid($this->apiKey);

        $sendgrid->send($email);
    }

    public function send_email_to_company($input, $companyEmail)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('garvai@iecs.com', 'IECS');
        $email->setSubject($input->post('email_sub'));
        $email->addTo($companyEmail);
        $email->addContent("text/html", $input->post('email_text'));
        $sendgrid = new \SendGrid($this->apiKey);

        $sendgrid->send($email);
    }

    public function send_admin_reset_password_email($admin)
    {
        $body = '<h3>We\'ve received a password reset request for ' . $admin['admin_name'] . ".</h3>"
            . "If this wasn't you, please feel free to ignore this email or notify us about it at mmcarthur@iecs.com"
            . '<br /><a href="' . site_url('/adminpassword/reset/'. $admin['admin_token']) . '">Click here reset your password.</a>';
        $sub = "Password Reset";

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('noreply@cableconcrete.com', 'Cable Concrete Calculator');
        $email->setSubject($sub);
        $email->addTo($admin['admin_email']);
        $email->addContent("text/html", $body);
        $sendgrid = new \SendGrid($this->apiKey);

        $sendgrid->send($email);
    }

    public function send_company_reset_password_email($company)
    {
        $body = '<h3>We\'ve received a password reset request for ' . $company['company_contactName'] . ".</h3>"
            . "If this wasn't you, please feel free to ignore this email or notify us about it at mmcarthur@iecs.com"
            . '<br /><a href="' . site_url('/companypassword/reset/'. $company['company_token']) . '">Click here reset your password.</a>';
        $sub = "Password Reset";

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('noreply@cableconcrete.com', 'Cable Concrete Calculator');
        $email->setSubject($sub);
        $email->addTo($company['company_email']);
        $email->addContent("text/html", $body);
        $sendgrid = new \SendGrid($this->apiKey);

        $sendgrid->send($email);
    }

    public function send_quote_email($data, $id, $input)
    {
        $estimateAddress = empty($data['summaryInfo']['estimate_location']) ? 'N/A' : $data['summaryInfo']['estimate_location'];
        $body = '<h3>' . $data['summaryInfo']['company_name'] . " has submitted a new design!</h3>"
            . "<p>Design Location: " . $estimateAddress . "</p>"
            . "<p>Company Contact name: " . $data['summaryInfo']['company_contactName'] . "</p>"
            . "<p>Company email: " . $data['summaryInfo']['company_email'] . "</p>"
            . '<a href="' . site_url('/admin/summary/'.$id) . '">Click here log in and view the design.</a>';
        $sub = "New Design Sent from ".$data['summaryInfo']['company_name'];

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('noreply@cableconcrete.com', 'Cable Concrete Calculator');
        $email->setSubject($sub);
        $email->addTo($input->post('region'));
        $email->addContent("text/html", $body);
        $sendgrid = new \SendGrid($this->apiKey);

        $sendgrid->send($email);
    }
}
