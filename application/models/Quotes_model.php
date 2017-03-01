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
          $this->db->where('tbl_estimates.estimate_status', 1);
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
                      $this->db->where('tbl_estimates.estimate_status', 1);
                      $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');

                      $query = $this->db->get();
                      return $query->result_array();
        }

        public function set_quote(){
          $this->load->helper('url');
          date_default_timezone_set('America/Toronto');

          $data = array(
              'company_id' => $_SESSION['company_id'],
              'estimate_name' => $this->input->post('name'),
              'estimate_date' => date('Y-m-d H:i:s'),
              'estimate_projectedDate' => $this->input->post('d'),
              'estimate_address' => $this->input->post('addr'),
              'estimate_engineer' => $this->input->post('engineerName'),
              'estimate_status' => 1,
              'estimate_location' => $this->input->post('cityProv'),
              'estimate_expectedFlow' => number_format($this->input->post('flowMeters'),2),
              'estimate_expectedVelocity' => number_format($this->input->post('velocityMeters'),2),
              'estimate_bedSlope' => number_format($this->input->post('bedSlopeDecimal'),2),
              'estimate_sideSlope' => number_format($this->input->post('sideSlopeDecimal'),2),
              'estimate_flowType' => number_format($this->input->post('flowType')),
              'estimate_bedWidth' => number_format($this->input->post('bedMeters'),2),
              'estimate_alignment' => number_format($this->input->post('alignType')),
              'estimate_crestRadius' => number_format($this->input->post('crestMeters'),2),
              'estimate_channelLength' => number_format($this->input->post('channelMeters'),2),
              'estimate_channelDepth' => number_format($this->input->post('depthMeters'),2),
              'estimate_topWidth' => number_format($this->input->post('topMeters'),2),
              'estimate_outLetSource' => number_format($this->input->post('sourceType')),
              'estimate_soilType' => number_format($this->input->post('soilType')),
              'estimate_modifiedDate' => date('Y-m-d H:i:s'),
              'estimate_comments' => $this->input->post('commentsBox')
          );

          $this->db->insert('tbl_estimates', $data);

          $data = array(
            'company_id' => $_SESSION['company_id'],
            'activity_desc' => "Finished form for: ".$this->input->post('name'),
            'activity_date' => date('Y-m-d H:i:s')
          );

          return $this->db->insert('tbl_activity', $data);

          //Results Table

}

          public function alter_quote($estimateID){
            $this->load->helper('url');
            date_default_timezone_set('America/Toronto');

            $data = array(
              'estimate_id' => $estimateID,
              'company_id' => $_SESSION['company_id'],
              'estimate_name' => $this->input->post('name'),
              'estimate_date' => $_SESSION['last_date'],
              'estimate_projectedDate' => $this->input->post('d'),
              'estimate_address' => $this->input->post('addr'),
              'estimate_engineer' => $this->input->post('engineerName'),
              'estimate_status' => 1,
              'estimate_location' => $this->input->post('cityProv'),
              'estimate_expectedFlow' => number_format($this->input->post('flowMeters'),2),
              'estimate_expectedVelocity' => number_format($this->input->post('velocityMeters'),2),
              'estimate_bedSlope' => number_format($this->input->post('bedSlopeDecimal'),2),
              'estimate_sideSlope' => number_format($this->input->post('sideSlopeDecimal'),2),
              'estimate_flowType' => number_format($this->input->post('flowType')),
              'estimate_bedWidth' => number_format($this->input->post('bedMeters'),2),
              'estimate_alignment' => number_format($this->input->post('alignType')),
              'estimate_crestRadius' => number_format($this->input->post('crestMeters'),2),
              'estimate_channelLength' => number_format($this->input->post('channelMeters'),2),
              'estimate_channelDepth' => number_format($this->input->post('depthMeters'),2),
              'estimate_topWidth' => number_format($this->input->post('topMeters'),2),
              'estimate_outLetSource' => number_format($this->input->post('sourceType')),
              'estimate_soilType' => number_format($this->input->post('soilType')),
              'estimate_modifiedDate' => date('Y-m-d H:i:s'),
              'estimate_comments' => $this->input->post('commentsBox')
            );

            $this->db->replace('tbl_estimates', $data);

            $data = array(
              'company_id' => $_SESSION['company_id'],
              'activity_desc' => "Edited form for: ".$this->input->post('name'),
              'activity_date' => date('Y-m-d H:i:s')
            );

            return $this->db->insert('tbl_activity', $data);


            //$this->db->where('estimate_id', $estimateID);
            //$this->db->update('tbl_estimates', $data);
             //$this->db->where('tbl_estimates.estimate_id', $estimateID);
             //$this->db->delete('tbl_estimates');

          }

          public function delete_quote($estimateID){
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
}
