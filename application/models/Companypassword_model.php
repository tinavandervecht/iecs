<?php 
class Companypassword_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function generate_token ()
    {
        $static_str='AL';
        $currenttimeseconds = date("mdY_His");
        $token_id=$static_str.$currenttimeseconds;

        return md5($token_id);
     }
}
?>