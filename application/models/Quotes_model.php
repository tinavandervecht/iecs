<?php
class Quotes_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_company($companyID = FALSE)
    {
        if ($companyID === FALSE) {
            $query = $this->db->get('tbl_company');
            return $query->result_array();
        }

        $query = $this->db->get_where('tbl_company', array('company_id' => $companyID));
        return $query->row_array();
    }

    public function get_estimate($estimateID, $companyID)
    {
        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->where('tbl_estimates.company_id', $companyID);
        $this->db->where('tbl_estimates.estimate_id', $estimateID);
        $this->db->where('tbl_estimates.estimate_status', 1); //ONLY SHOW NOT-DELETED QUOTES
        $this->db->limit(1);

        $query = $this->db->get();

        return $query -> num_rows() == 1
            ? $query->row_array()
            : false;
    }

    public function get_estimateHistory($companyID = FALSE)
    {
        if ($companyID === FALSE) {
            return false;
        }

        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->join('tbl_estimates', 'tbl_company.company_id = tbl_estimates.company_id');
        $this->db->where('tbl_company.company_id', $companyID);
        $this->db->where('tbl_estimates.estimate_status', 1); //ONLY SHOW NOT-DELETED QUOTES
        $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_quote()
    {
        $this->load->helper('url');
        date_default_timezone_set('America/Toronto');

        if ($this->input->post('alignType')!=0) {
            //IF IT IS NOT A STRAIGHT ALIGNMENT ENTER THE FOLLOWING INFO
            $data = array(
                'company_id' => $_SESSION['company_id'],
                'estimate_name' => $this->input->post('name'),
                'estimate_date' => date('Y-m-d H:i:s'),
                'estimate_projectedDate' => $this->input->post('projectedDate'),
                'estimate_address' => $this->input->post('addr'),
                'estimate_engineer' => $this->input->post('engineerName'),
                'estimate_status' => 1,
                'estimate_location' => $this->input->post('cityProv'),
                'estimate_expectedFlow' => number_format($this->input->post('flowMeters'),3),
                'estimate_expectedVelocity' => number_format($this->input->post('velocityMeters'),3),
                'estimate_offset' => number_format($this->input->post('offsetMeters'),2),
                'estimate_bedSlope' => number_format($this->input->post('bedSlopeDecimal'),3),
                'estimate_sideSlope' => number_format($this->input->post('sideSlopeDecimal'),0),
                'estimate_friction' => number_format($this->input->post('friction'),2),
                'estimate_flowType' => number_format($this->input->post('flowType')),
                'estimate_channelSection' => number_format($this->input->post('channelSection')),
                'estimate_blockUse' => $this->input->post('blockUse'),
                'estimate_bedWidth' => number_format($this->input->post('bedMeters'),2),
                'estimate_alignment' => number_format($this->input->post('alignType')),
                'estimate_crestRadius' => number_format($this->input->post('crestMeters'),2),
                'estimate_channelLength' => number_format($this->input->post('channelMeters'),2),
                'estimate_channelDepth' => number_format($this->input->post('depthMeters'),2),
                'estimate_topWidth' => number_format($this->input->post('topMeters'),2),
                'estimate_outLetSource' => number_format($this->input->post('sourceType')),
                'estimate_outLetSourceFlowtype' => number_format($this->input->post('sourceFlowType')),
                'estimate_createdDate' => date('Y-m-d H:i:s'),
                'estimate_modifiedDate' => date('Y-m-d H:i:s'),
                'estimate_comments' => $this->input->post('commentsBox')
            );
        } else {
            //ELSE IF IT IS STRAIGHT
            $data = array(
                'company_id' => $_SESSION['company_id'],
                'estimate_name' => $this->input->post('name'),
                'estimate_date' => date('Y-m-d H:i:s'),
                'estimate_projectedDate' => $this->input->post('projectedDate'),
                'estimate_address' => $this->input->post('addr'),
                'estimate_engineer' => $this->input->post('engineerName'),
                'estimate_status' => 1,
                'estimate_location' => $this->input->post('cityProv'),
                'estimate_expectedFlow' => number_format($this->input->post('flowMeters'),3),
                'estimate_expectedVelocity' => number_format($this->input->post('velocityMeters'),3),
                'estimate_offset' => number_format($this->input->post('offsetMeters'),2),
                'estimate_bedSlope' => number_format($this->input->post('bedSlopeDecimal'),3),
                'estimate_sideSlope' => number_format($this->input->post('sideSlopeDecimal'),0),
                'estimate_friction' => number_format($this->input->post('friction'),2),
                'estimate_flowType' => number_format($this->input->post('flowType')),
                'estimate_channelSection' => number_format($this->input->post('channelSection')),
                'estimate_blockUse' => $this->input->post('blockUse'),
                'estimate_bedWidth' => number_format($this->input->post('bedMeters'),2),
                'estimate_alignment' => number_format($this->input->post('alignType')),
                'estimate_outLetSource' => number_format($this->input->post('sourceType')),
                'estimate_outLetSourceFlowtype' => number_format($this->input->post('sourceFlowType')),
                'estimate_createdDate' => date('Y-m-d H:i:s'),
                'estimate_modifiedDate' => date('Y-m-d H:i:s'),
                'estimate_comments' => $this->input->post('commentsBox')
            );
        }

        $this->db->insert('tbl_estimates', $data); //INSERT THE $DATA ARRAY INTO THE DB (contains all the values above)

        $data = array( //ADD A NEW ENTRY INTO THE ACTIVITY TABLE
            'company_id' => $_SESSION['company_id'],
            'activity_desc' => "Finished form for: ".$this->input->post('name'),
            'activity_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('tbl_activity', $data);
    }

    public function alter_quote($estimateID)
    {
        //FUNCTION FOR THE EDIT FORM QUERY, USED FOR UPDATING A GIVEN ESTIMATES INFO IN THE DATABASE. SIMILAR TO set_quote but it is now an update query.
        $this->load->helper('url');
        date_default_timezone_set('America/Toronto');

        if ($this->input->post('alignType')!=0) {
            //IF IT IS NOT A STRAIGHT ALIGNMENT ENTER THE FOLLOWING INFO
            $data = array(
                'estimate_id' => $estimateID, //THE PRIMARY KEY HAS TO BE THE FIRST ENTRY IN THIS ARRAY FOR THE QUERY TO WORK
                'company_id' => $_SESSION['company_id'],
                'estimate_name' => $this->input->post('name'),
                'estimate_date' => $_SESSION['last_date'],
                'estimate_projectedDate' => $this->input->post('projectedDate'),
                'estimate_address' => $this->input->post('addr'),
                'estimate_engineer' => $this->input->post('engineerName'),
                'estimate_status' => 1,
                'estimate_location' => $this->input->post('cityProv'),
                'estimate_expectedFlow' => number_format($this->input->post('flowMeters'),3),
                'estimate_expectedVelocity' => number_format($this->input->post('velocityMeters'),3),
                'estimate_offset' => number_format($this->input->post('offsetMeters'),2),
                'estimate_bedSlope' => number_format($this->input->post('bedSlopeDecimal'),3),
                'estimate_sideSlope' => number_format($this->input->post('sideSlopeDecimal'),0),
                'estimate_friction' => number_format($this->input->post('friction'),2),
                'estimate_flowType' => number_format($this->input->post('flowType')),
                'estimate_channelSection' => number_format($this->input->post('channelSection')),
                'estimate_blockUse' => $this->input->post('blockUse'),
                'estimate_bedWidth' => number_format($this->input->post('bedMeters'),2),
                'estimate_alignment' => number_format($this->input->post('alignType')),
                'estimate_crestRadius' => number_format($this->input->post('crestMeters'),2),
                'estimate_channelLength' => number_format($this->input->post('channelMeters'),2),
                'estimate_channelDepth' => number_format($this->input->post('depthMeters'),2),
                'estimate_topWidth' => number_format($this->input->post('topMeters'),2),
                'estimate_outLetSource' => number_format($this->input->post('sourceType')),
                'estimate_outLetSourceFlowtype' => number_format($this->input->post('sourceFlowType')),
                'estimate_modifiedDate' => date('Y-m-d H:i:s'),
                'estimate_comments' => $this->input->post('commentsBox')
            );
        } else {
            //ELSE IF IT IS STRAIGHT
            $data = array(
                'estimate_id' => $estimateID, //THE PRIMARY KEY HAS TO BE THE FIRST ENTRY IN THIS ARRAY FOR THE QUERY TO WORK
                'company_id' => $_SESSION['company_id'],
                'estimate_name' => $this->input->post('name'),
                'estimate_date' => $this->input->post('projectedDate'),
                'estimate_projectedDate' => $this->input->post('projectedDate'),
                'estimate_address' => $this->input->post('addr'),
                'estimate_engineer' => $this->input->post('engineerName'),
                'estimate_status' => 1,
                'estimate_location' => $this->input->post('cityProv'),
                'estimate_expectedFlow' => number_format($this->input->post('flowMeters'),3),
                'estimate_expectedVelocity' => number_format($this->input->post('velocityMeters'),3),
                'estimate_offset' => number_format($this->input->post('offsetMeters'),2),
                'estimate_bedSlope' => number_format($this->input->post('bedSlopeDecimal'),3),
                'estimate_sideSlope' => number_format($this->input->post('sideSlopeDecimal'),0),
                'estimate_friction' => number_format($this->input->post('friction'),2),
                'estimate_flowType' => number_format($this->input->post('flowType')),
                'estimate_channelSection' => number_format($this->input->post('channelSection')),
                'estimate_blockUse' => $this->input->post('blockUse'),
                'estimate_bedWidth' => number_format($this->input->post('bedMeters'),2),
                'estimate_alignment' => number_format($this->input->post('alignType')),
                'estimate_outLetSource' => number_format($this->input->post('sourceType')),
                'estimate_outLetSourceFlowtype' => number_format($this->input->post('sourceFlowType')),
                'estimate_modifiedDate' => date('Y-m-d H:i:s'),
                'estimate_comments' => $this->input->post('commentsBox')
            );
        }

        $this->db->replace('tbl_estimates', $data); //Replace the given entry with this data.

        $data = array( //ADD THE FOLLOWING INFO TO THE ACTIVITY TABLE
            'company_id' => $_SESSION['company_id'],
            'activity_desc' => "Edited form for: ".$this->input->post('name'),
            'activity_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('tbl_activity', $data);
    }

    public function delete_quote($estimateID)
    {
        //FUNCTION FOR DELETING A QUOTE. DOESN'T ACTUALLY DELETE BUT INSTEAD SETS THE ESTIMATE_STATUS TO 0 MEANING IT WONT APPEAR IN USER'S LISTS
        date_default_timezone_set('America/Toronto');
        $this->db->set('estimate_status', 0);
        $this->db->where('estimate_id', $estimateID);
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->update('tbl_estimates');

        $data = array(
            'company_id' => $_SESSION['company_id'],
            'activity_desc' => "Deleted one of their forms".$this->input->post('name'),
            'activity_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('tbl_activity', $data);
    }

    public function get_last_quote($name)
    {
        //USED TO GET THE INFO FOR THE SUMMARY PAGE
        $this->db->select('estimate_id');
        $this->db->from('tbl_estimates');
        $this->db->where('estimate_name', $name);
        $this->db->order_by('estimate_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query -> num_rows() == 1
            ? $query->row_array()
            : false;
    }

    public function get_summary_data($id)
    {
        //FUNCTION FOR GETTING ESTIMATE INFO TO THE AJAX FUNCTION ON THE SUMMARY PAGE
        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->where('estimate_id', $id);
        $this->db->order_by('estimate_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query -> num_rows() == 1
            ? $query->row_array()
            : false;
    }

    public function get_summary($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_estimates');
        $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
        $this->db->where('tbl_estimates.estimate_id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function alter_sent_state($id)
    {
        //CHANGE THE CURRENT ESTIMATES STATUS TO SENT (FOR THE summary page "send to iecs")
        date_default_timezone_set('America/Toronto');
        $data = array(
            'estimate_sent' => 1,
        );

        $this->db->set($data);
        $this->db->where('estimate_id', $id);
        $this->db->update('tbl_estimates');

        $data = array(
            'company_id' => $_SESSION['company_id'],
            'activity_desc' => "Sent an Analysis to IECS for review.",
            'activity_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('tbl_activity', $data);
    }
}
