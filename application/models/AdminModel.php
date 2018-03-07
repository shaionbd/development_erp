<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
    }

    ###################### Customers #######################
    public function get_customers(){
        return $this->db->get('customers')->result();
    }
    public function get_customer($id){
        return $this->db->get_where('customers',['id'=>$id])->row();
    }
    public function create_customer($data){
        $this->db->insert('customers', $data);
    }
    public function update_customer($id, $data){
        return $this->db->where('id', $id)->update('customers', $data);
    }

    ###################### /Customers ######################

    ###################### users #######################
    public function get_users(){
        return $this->db->get('users')->result();
    }
    public function get_user($id){
        return $this->db->get_where('users',['id'=>$id])->row();
    }
    public function create_user($data){
        $this->db->insert('users', $data);
    }
    public function update_user($id, $data){
        return $this->db->where('id', $id)->update('users', $data);
    }
    public function delete_user($id) {
        $this->db->delete('users' , ['id' => $id]);
    }
    ###################### /users ######################

    ###################### projects #######################
    public function get_projects(){
        return $this->db->get('projects')->result();
    }
    public function get_project($id){
        return $this->db->get_where('projects',['id'=>$id])->row();
    }
    public function create_project($data){
        $this->db->insert('projects', $data);
    }
    public function update_project($id, $data){
        return $this->db->where('id', $id)->update('projects', $data);
    }
    public function delete_project($id) {
        $this->db->delete('projects' , ['id' => $id]);
    }
    ###################### /projects ######################

    ###################### flats #######################
    public function get_flats(){
        $this->db->order_by('project_id', 'ASC');
        return $this->db->get('flats')->result();
    }
    public function get_flat($id){
        return $this->db->get_where('flats',['id'=>$id])->row();
    }

    public function get_flat_info($id){
        $this->db->select('flats.*, flats.id AS id, projects.name AS project_name, customers.name AS customer_name, customers.permanent_address AS customer_address, customers.phone AS customer_phone, customers.nid_passport AS customer_nid,
        sold_flats.utility_total_costs AS utility_costs, sold_flats.total_costs AS total_costs, sold_flats.discount AS discount');
        $this->db->from('flats');
        $this->db->join('projects', 'projects.id = flats.project_id');
        $this->db->join('sold_flats', 'sold_flats.flat_id = flats.id');
        $this->db->join('customers', 'customers.id = sold_flats.customer_id');
        $this->db->where('flats.id', $id);

        return $this->db->get()->row();
    }

    public function get_sold_flats(){
        $this->db->select('flats.*,flats.id AS id, projects.name AS project_name, sold_flats.*, customers.name AS customer_name');
        $this->db->from('flats');
        $this->db->join('projects', 'projects.id = flats.project_id');
        $this->db->join('sold_flats', 'sold_flats.flat_id = flats.id');
        $this->db->join('customers', 'customers.id = sold_flats.customer_id');
        $this->db->where('flats.is_sold', 1);
        $customers = $this->db->get()->result();
        return $customers;
    }

    public function get_unsold_flat($project_id){
        return $this->db->get_where('flats',['project_id'=>$project_id, 'is_sold'=>0])->result();
    }

    public function get_project_flats($project_id){
        return $this->db->get_where('flats',['project_id'=>$project_id])->result();
    }
    public function create_flat($data){
        $this->db->insert('flats', $data);
    }
    public function update_flat($id, $data){
        return $this->db->where('id', $id)->update('flats', $data);
    }
    public function delete_flat($id) {
        $this->db->delete('flats' , ['id' => $id]);
    }

    ###################### /flats ######################

    ###################### utility #######################
    public function get_utilities(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('utilities')->result();
    }
    public function get_utility($id){
        return $this->db->get_where('utilities',['id'=>$id])->row();
    }
    public function create_utility($data){
        $this->db->insert('utilities', $data);
    }
    public function update_utility($id, $data){
        return $this->db->where('id', $id)->update('utilities', $data);
    }
    public function delete_utility($id) {
        $this->db->delete('utilities' , ['id' => $id]);
    }
    ###################### /utility ######################

    ######################## Bank ##########################
    function get_banks(){
        return $this->db->get('banks')->result();
    }

    function get_branches($bank_id){
        return $this->db->get_where('bank_branches',['bank_id'=>$bank_id])->result();
    }
    ######################## /Bank ##########################

    ########################### Sold flat ############################
    public function create_sold_flat($data){
        $this->db->insert('sold_flats', $data);
    }
    ########################### /Sold flat ############################

    ########################### Receipt books ############################
    public function create_receipt_book($data){
        $this->db->insert('receipt_books', $data);
    }
    public function get_receipt_book_of_flat($id){
        return $this->db->get_where('receipt_books',['flat_id'=>$id])->result();
    }

    public function get_receipt_books(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('receipt_books')->result();
    }
    ########################### /Receipt books ############################

    public function getAdminById($id){
        return $this->db->get_where('users', ['id'=> $id])->row();
    }
}