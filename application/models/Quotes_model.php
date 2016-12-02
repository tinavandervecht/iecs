<?php
class Quotes_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_company($companyID = FALSE)
        {

                      if($companyID === FALSE){
                        $query = $this->db->get('tbl_company');
                          return $query->result_array();
                      }

                      $query = $this->db->get_where('tbl_company', array('company_id' => $companyID));
                      return $query->row_array();
        }

        public function get_estimate($estimateID, $companyID){


          $this->db->select('*');
          $this->db->from('tbl_estimates');
          $this->db->where('tbl_estimates.company_id', $companyID);
          $this->db->where('tbl_estimates.estimate_id', $estimateID);
          $this->db->limit(1);

          $query = $this->db->get();
          if($query -> num_rows() == 1){
            return $query->row_array();
          }
          else{
            return false;
          }
        }

        public function get_estimateHistory($companyID = FALSE)
        {

                      if($companyID === FALSE){
                          return false;
                      }

                      $this->db->select('*');
                      $this->db->from('tbl_company');
                      $this->db->join('tbl_estimates', 'tbl_company.company_id = tbl_estimates.company_id');
                      $this->db->where('tbl_company.company_id', $companyID);
                      $this->db->order_by('tbl_estimates.estimate_date', 'DESC');

                      $query = $this->db->get();
                      return $query->result_array();
        }

        public function set_quote()
{
    $this->load->helper('url');

    $data = array(
        'company_id' => $_SESSION['company_id'],
        'estimate_name' => $this->input->post('name'),
        'estimate_date' => date('Y-m-d h:i:s'),
        'estimate_projectedDate' => $this->input->post('d'),
        'estimate_address' => $this->input->post('addr'),
        'estimate_engineer' => $this->input->post('engineerName'),
        'estimate_status' => 1,
        'estimate_location' => $this->input->post('cityProv'),
        'estimate_expectedFlow' => $this->input->post('flowMeters'),
        'estimate_expectedVelocity' => $this->input->post('velocityMeters'),
        'estimate_bedSlope' => $this->input->post('bedSlopeDecimal'),
        'estimate_sideSlope' => $this->input->post('sideSlopeDecimal'),
        'estimate_flowType' => $this->input->post('flowType'),
        'estimate_bedWidth' => $this->input->post('bedMeters'),
        'estimate_alignment' => $this->input->post('alignType'),
        'estimate_crestRadius' => $this->input->post('crestMeters'),
        'estimate_channelLength' => $this->input->post('channelMeters'),
        'estimate_channelDepth' => $this->input->post('depthMeters'),
        'estimate_topWidth' => $this->input->post('topMeters'),
        'estimate_outLetSource' => $this->input->post('sourceType'),
        'estimate_soilType' => $this->input->post('soilType'),
        'estimate_comments' => $this->input->post('commentsBox')
    );

    return $this->db->insert('tbl_estimates', $data);
}

public function alter_quote($estimateID){
$this->load->helper('url');

$data = array(
'company_id' => $_SESSION['company_id'],
'estimate_name' => $this->input->post('name'),
'estimate_projectedDate' => $this->input->post('d'),
'estimate_address' => $this->input->post('addr'),
'estimate_engineer' => $this->input->post('engineerName'),
'estimate_status' => 1,
'estimate_location' => $this->input->post('cityProv'),
'estimate_expectedFlow' => $this->input->post('flowMeters'),
'estimate_expectedVelocity' => $this->input->post('velocityMeters'),
'estimate_bedSlope' => $this->input->post('bedSlopeDecimal'),
'estimate_sideSlope' => $this->input->post('sideSlopeDecimal'),
'estimate_flowType' => $this->input->post('flowType'),
'estimate_bedWidth' => $this->input->post('bedMeters'),
'estimate_alignment' => $this->input->post('alignType'),
'estimate_crestRadius' => $this->input->post('crestMeters'),
'estimate_channelLength' => $this->input->post('channelMeters'),
'estimate_channelDepth' => $this->input->post('depthMeters'),
'estimate_topWidth' => $this->input->post('topMeters'),
'estimate_outLetSource' => $this->input->post('sourceType'),
'estimate_soilType' => $this->input->post('soilType'),
'estimate_comments' => $this->input->post('commentsBox')
);

$this->db->where('estimate_id', $estimateID);
$this->db->update('tbl_estimates', $data);
}
}
