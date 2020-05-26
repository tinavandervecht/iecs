<?php
class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function check_adminlogin()
    {
        $admin = $this->input->post('admin_user');
        $password = $this->input->post('admin_pw');
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_username', $admin);
        $query = $this->db->get();

        foreach ($query->result() as $possibleAdmin) {
            if (password_verify($password, $possibleAdmin->admin_pw))
            {
                $data = array('admin_lastLogin' => time());
                $this->db->set($data);
                $this->db->where('admin_id', $possibleAdmin->admin_id);
                $this->db->update('tbl_admin');
                return $query->row_array(); //Return the user info in a row_array (single dimensional associative array).
                break;
            }
        }

        return false; //IF FALSE IS PASSED, THE CONTROLLER WILL REALIZE THE INFO IS WRONG AND WILL RELOAD THE ADMIN LOGIN SCREEN.
    }

    public function get_allEstimates($limit = null)
    {
        //Function for getting all the estimates for the estimates cms page.

        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');

        if (isset($limit)){
            $this->db->limit($limit);
        }

        $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');

        $query = $this->db->get();
        return $query->result_array(); //RESULT_ARRAY() RETURNS A TWO DIMENSION ASSOCIATIVE ARRAY (you would have the syntax be like array[i]['name'])
    }

    public function search_estimates($limit = null)
    {
        //A FUNCTION FOR SEARCHING FOR SPECIFIC ENTRIES IN THE ESTIMATES
        $search = $this->input->post('search');
        $sort = $this->input->post('sort');

        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');

        if (isset($search)) {
            $this->db->like('tbl_estimates.estimate_name', $search);
            $this->db->or_like('tbl_company.company_name', $search);
        }

        if (isset($sort)) { //CHANGES THE ORDERING DEPENDING ON WHICH SELECTOR IS SELECTED
            if ($sort=="1"){
                $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');
            } elseif ($sort=="3") {
                $this->db->order_by('tbl_estimates.estimate_name', 'ASC');
            } elseif ($sort=="4") {
                $this->db->order_by('tbl_estimates.estimate_name', 'DESC');
            } else {
                $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'ASC');
            }
        } else {
            $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');
        }

        if (isset($limit)){
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        return $query->num_rows() == 0
            ? false
            : $query->result_array();
    }

    public function ajax_estimate($sort, $search, $limit = null)
    {
         //FUNCTION FOR THE AJAX SEARCH FUNCTIONALITY. DOES THE SAME AS THE ABOVE FUNCTION.
        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');

        if (isset($search)) {
            $this->db->like('tbl_estimates.estimate_name', $search);
            $this->db->or_like('tbl_company.company_name', $search);
        }

        //CHANGING THE ORDERING BASED ON THE DESIGNATED SORTING INPUT ON THE FORM
        if ($sort=="1") {
            $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');
        } elseif ($sort=="3") {
            $this->db->order_by('tbl_estimates.estimate_name', 'ASC');
        } elseif ($sort=="4") {
            $this->db->order_by('tbl_estimates.estimate_name', 'DESC');
        } else {
            $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'ASC');
        }

        if (isset($limit) && $limit !== 'all'){
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        return $query->num_rows() == 0
            ? false
            : $query->result_array();
    }


    public function search_companies($limit = null)
    {
        //SIMILAR AS ABOVE, SEARCH FUNCTION FOR THE COMPANIES
        $search = $this->input->post('search');
        $sort = $this->input->post('sort');

        $this->db->select('*');
        $this->db->from('tbl_company');

        if (isset($search)) {
            $this->db->like('company_name', $search);
            $this->db->or_like('company_contactName', $search);
            $this->db->or_like('company_email', $search);
        }

        if (isset($sort)) {
            if ($sort=="1"){
                $this->db->order_by('company_date', 'DESC');
            } elseif ($sort=="3") {
                $this->db->order_by('company_name', 'ASC');
            } elseif ($sort=="4") {
                $this->db->order_by('company_name', 'DESC');
            } else {
                $this->db->order_by('company_date', 'ASC');
            }
        } else {
            $this->db->order_by('company_date', 'DESC');
        }

        if (isset($limit)){
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        return $query->num_rows() == 0
            ? false
            : $query->result_array();
    }

    public function ajax_companies($sort, $search, $limit = null)
    {
        //AJAX FUNCTION USED FOR SEARCHING FOR COMPANIES
        $this->db->select('*');
        $this->db->from('tbl_company');

        if (isset($search)) {
            $this->db->like('company_name', $search);
            $this->db->or_like('company_contactName', $search);
            $this->db->or_like('company_email', $search);
        }

        if ($sort=="1"){
            $this->db->order_by('company_date', 'DESC');
        } elseif ($sort=="3") {
            $this->db->order_by('company_name', 'ASC');
        } elseif ($sort=="4") {
            $this->db->order_by('company_name', 'DESC');
        } else {
            $this->db->order_by('company_date', 'ASC');
        }

        if (isset($limit) && $limit !== 'all'){
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        return $query->num_rows() == 0
            ? false
            : $query->result_array();
    }

    public function get_activity($limit = null)
    {
        //GETS ALL ACTIVITY FOR THE ACTIVITY PAGE AND ATTACHED COMPANY INFO TO EACH ENTRY
        $this->db->select('*');
        $this->db->from('tbl_activity');
        $this->db->join('tbl_company', 'tbl_activity.company_id = tbl_company.company_id');

        if (isset($limit)){
            $this->db->limit($limit);
        }

        $this->db->order_by('tbl_activity.activity_date', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_allCompanies($limit = null)
    {
        //FUNCTION FOR GETTING ALL THE COMPANIES FOR THE CMS COMPANIES PAGE
        $this->db->select('*');
        $this->db->from('tbl_company');

        if (isset($limit)){
            $this->db->limit($limit);
        }

        $this->db->order_by('tbl_company.company_date', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_companyEstimates($id, $limit = null)
    {
        //FOR POPULATING THE INDIVIDUAL COMPANY PAGES, GETS ALL ESTIMATES ASSOCIATED WITH A COMPANY.
        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
        $this->db->where('tbl_estimates.company_id', $id);

        if (isset($limit)){
            $this->db->limit($limit);
        }

        $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_companyInfo($id)
    {
        //GETS THE INFO FOR A GIVEN COMPANY.
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('tbl_company.company_id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_summary($id)
    {
        //For the summary page.
        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
        $this->db->where('tbl_estimates.estimate_id', $id);

        $query = $this->db->get();
        $quote = $query->row_array();
        $quote['estimate_flowType_string'] = $this->getFlowTypeString($quote['estimate_flowType']);
        $quote['estimate_alignment_string'] = $this->getAlignmentString($quote['estimate_alignment']);

        return $quote;
    }

    public function getFlowTypeString($id)
    {
        $string = "Normal";

        switch ($id) {
            case (1):
                $string = 'Overtopping';
                break;
            case (2):
                $string = 'Sub Critical';
                break;
            case (3):
                $string = 'Hydraulic Jump';
                break;
            case (4):
                $string = 'Super Critical';
                break;
            case (5):
                $string = 'Impinging';
                break;
            case (6):
                $string = 'Bridge/Culvert';
                break;
            case (7):
                $string = 'Undulating Trans Critical';
                break;
        }

        return $string;
    }

    public function getAlignmentString($id)
    {
        $string = "Straight";

        switch ($id) {
            case (1):
                $string = 'Not Straight';
                break;
        }

        return $string;
    }

    public function get_summary_data($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->join('tbl_company', 'tbl_estimates.company_id = tbl_company.company_id');
        $this->db->where('estimate_id', $id);
        $this->db->order_by('estimate_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->num_rows() == 1
            ? $query->row_array()
            : false;
    }

    public function get_profile($ID)
    {
        $query = $this->db->get_where('tbl_admin', array('admin_id' => $ID));
        return $query->row_array();
    }

    public function alter_profile()
    {
        date_default_timezone_set('America/Toronto');
        $data = array(
            'admin_username' => $this->input->post('username'),
            'admin_name' => $this->input->post('name'),
            'admin_email' => $this->input->post('email'),
        );

        if ($this->input->post('new_password')) {
            $data['admin_pw'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        }

        $this->db->set($data);
        $this->db->where('admin_id', $_SESSION['userdata']['admin_id']);
        $this->db->update('tbl_admin');
    }

    public function get_users_created_activity()
    {
        $activity = [];
        $currentYear = (int) date('Y', strtotime('-1 months'));

        $lastMonthNum = (int) date('n', strtotime('-1 months'));
        $lastMonthUsers = $this->db->select('*')
            ->from('tbl_company')
            ->where('MONTH(company_createdAt)', $lastMonthNum)
            ->where('YEAR(company_createdAt)', $currentYear)
            ->get();

        $currentMonthNum = (int) date('n');
        $currentMonthUsers = $this->db->select('*')
            ->from('tbl_company')
            ->where('MONTH(company_createdAt)', $currentMonthNum)
            ->where('YEAR(company_createdAt)', $currentYear)
            ->get();

        $activity['prev_month_name'] = date('M', strtotime('-1 months'));
        $activity['prev_month_count'] = count($lastMonthUsers->result_array());
        $activity['current_month_name'] = date('M');
        $activity['current_month_count'] = count($currentMonthUsers->result_array());

        return $activity;
    }

    public function get_current_year_user_activity()
    {
        $activity = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthUsers = $this->db->select('*')
                ->from('tbl_company')
                ->where('MONTH(company_createdAt)', $i)
                ->where('YEAR(company_createdAt)', (int) date('Y'))
                ->get();

            $activity[$i]['x'] = $i;
            $activity[$i]['y'] = count($monthUsers->result_array());
        }

        return $activity;
    }

    public function get_design_activity()
    {
        $designInfo = [];

        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $query = $this->db->get();

        $designInfo['total_designs'] = sizeof($query->result_array());
        $designInfo['area_designs'] = [];

        foreach($query->result_array() as $estimate)
        {
            $key = str_replace(' ', '', strtolower($estimate['estimate_location']));
            $designInfo['area_designs'][$key][] = $estimate;
        }

        return $designInfo;
    }

    public function get_user_activity()
    {
        $userInfo = [];

        $this->db->select('*');
        $this->db->from('tbl_company');
        $query = $this->db->get();

        $userInfo['total_users'] = sizeof($query->result_array());
        $userInfo['area_users'] = [];

        foreach($query->result_array() as $user)
        {
            $key = str_replace(' ', '', strtolower($user['company_province']));
            $userInfo['area_users'][$key][] = $user;
        }

        return $userInfo;
    }

    public function get_allAdmins()
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_admin()
    {
        $data = array(
            'admin_username' => $this->input->post('username'),
            'admin_pw' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT),
            'admin_name' => $this->input->post('name'),
            'admin_email' => $this->input->post('email'),
            'admin_lastLogin' => time()
        );

        $this->db->insert('tbl_admin', $data);

        return $this->db->insert_id();
    }
}
