<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $title = "Enosis Development Solution";
    
    public function __construct() {
		parent::__construct();
		$this->load->model('AdminModel', 'adminModel');

		// //redirect to login page if not authenticated
        if(!$this->session->userdata('admin_logged_in'))
            return redirect(base_url('auth/admin'));

        $admin_id = $this->session->userdata('admin_logged_in')['id'];
        $this->admin = $this->adminModel->getAdminById($admin_id);
        date_default_timezone_set('Asia/Dhaka');
    }
    
    public function index(){
        $data['title'] = $this->title;
        $data['admin'] = $this->admin;
        $data['active'] = 'dashboard';
		$this->load->view('admin/dashboard', $data);
    }
    ########################## customer ##########################
    public function customers(){
        $data['title'] = $this->title;
        $data['active'] = 'customers';
        $data['admin'] = $this->admin;
        $data['customers'] = $this->adminModel->get_customers();
		$this->load->view('admin/customers', $data);
    }
    public function create_customer(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createCustomer')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'email'  => trim($this->input->post('email')),
                'permanent_address'  => trim($this->input->post('permanent_address')),
                'nid_passport'  => trim($this->input->post('nid_passport')),
                'gender'  => trim($this->input->post('gender')),
                'marital_status'  => trim($this->input->post('marital_status')),
                'phone'  => trim($this->input->post('phone')),
                'father_name'  => trim($this->input->post('father_name')),
                'mother_name'  => trim($this->input->post('mother_name')),
                'husband_wife'  => trim($this->input->post('husband_wife')),
                'job_status'  => trim($this->input->post('job_status'))
            );
            $this->adminModel->create_customer(array_filter($data));
            redirect(base_url('admin/customers'));
        }else{
            $this->customers();
        }
    }
    public function edit_customer($id){
        $data['title'] = $this->title;
        $data['active'] = 'customers';
        $data['admin'] = $this->admin;
        $data['customer'] = $this->adminModel->get_customer($id);
        if(!$data['customer']){
            redirect(base_url('admin/customers'));
        }
		$this->load->view('admin/edit_customer', $data);
    }
    public function update_customer(){
        $id = $this->input->post('id');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createCustomer')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'email'  => trim($this->input->post('email')),
                'permanent_address'  => trim($this->input->post('permanent_address')),
                'nid_passport'  => trim($this->input->post('nid_passport')),
                'gender'  => trim($this->input->post('gender')),
                'marital_status'  => trim($this->input->post('marital_status')),
                'phone'  => trim($this->input->post('phone')),
                'father_name'  => trim($this->input->post('father_name')),
                'mother_name'  => trim($this->input->post('mother_name')),
                'husband_wife'  => trim($this->input->post('husband_wife')),
                'job_status'  => trim($this->input->post('job_status'))
            );
            $this->adminModel->update_customer($id, array_filter($data));
            redirect(base_url('admin/customers'));
        }else{
            $this->edit_customer($id);
        }
    }
    ########################## /customer #########################

    ########################## user #########################
    public function users(){
        $data['title'] = $this->title;
        $data['active'] = 'users';
        $data['admin'] = $this->admin;
        $data['users'] = $this->adminModel->get_users();
		$this->load->view('admin/users', $data);
    }
    public function create_user(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createUser')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'email'  => trim($this->input->post('email')),
                'phone'  => trim($this->input->post('phone')),
                'role'  => trim($this->input->post('role')),
                'designation'  => trim($this->input->post('designation')),
                'password'  => md5(trim($this->input->post('password')))
            );
            $this->adminModel->create_user(array_filter($data));
            redirect(base_url('admin/users'));
        }else{
            $this->users();
        }
    }
    public function edit_user($id){
        $data['title'] = $this->title;
        $data['active'] = 'users';
        $data['admin'] = $this->admin;
        $data['user'] = $this->adminModel->get_user($id);
        if(!$data['user']){
            redirect(base_url('admin/user'));
        }
		$this->load->view('admin/edit_user', $data);
    }
    public function update_user(){
        $id = $this->input->post('id');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createUser')){
            if(trim($this->input->post('password'))){
                $data = array(
                    'name'  => trim($this->input->post('name')),
                    'email'  => trim($this->input->post('email')),
                    'phone'  => trim($this->input->post('phone')),
                    'role'  => trim($this->input->post('role')),
                    'designation'  => trim($this->input->post('designation')),
                    'password'  => md5(trim($this->input->post('password')))
                );
            }else{
                $data = array(
                    'name'  => trim($this->input->post('name')),
                    'email'  => trim($this->input->post('email')),
                    'phone'  => trim($this->input->post('phone')),
                    'role'  => trim($this->input->post('role')),
                    'designation'  => trim($this->input->post('designation'))
                );
            }
            
            $this->adminModel->update_user($id, $data);
            redirect(base_url('admin/users'));
        }else{
            $this->edit_user($id);
        }
    }
    public function delete_user($id){
        $this->adminModel->delete_user($id);
		redirect(base_url('admin/users'));
    }
    ########################## /user #########################

    ############################### Projects ###########################
    public function projects(){
        $data['title'] = $this->title;
        $data['active'] = 'projects';
        $data['admin'] = $this->admin;
        $data['projects'] = $this->adminModel->get_projects();
		$this->load->view('admin/projects', $data);
    }
    public function project($id){
        $data['title'] = $this->title;
        $data['active'] = 'projects';
        $data['admin'] = $this->admin;
        $data['project'] = $this->adminModel->get_project($id);
        $data['flats'] = $this->adminModel->get_project_flats($id);

		$this->load->view('admin/project', $data);
    }
    public function create_project(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createProject')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'location'  => trim($this->input->post('location')),
                'storied'  => trim($this->input->post('storied')),
                'flats'  => trim($this->input->post('flats')),
                'costs'  => trim($this->input->post('costs')),
                'date'  => $this->input->post('date')
            );
            $this->adminModel->create_project(array_filter($data));
            redirect(base_url('admin/projects'));
        }else{
            $this->projects();
        }
    }
    public function edit_project($id){
        $data['title'] = $this->title;
        $data['active'] = 'projects';
        $data['admin'] = $this->admin;
        $data['project'] = $this->adminModel->get_project($id);
        if(!$data['project']){
            redirect(base_url('admin/projects'));
        }
		$this->load->view('admin/edit_project', $data);
    }
    public function update_project(){
        $id = $this->input->post('id');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createProject')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'location'  => trim($this->input->post('location')),
                'storied'  => trim($this->input->post('storied')),
                'flats'  => trim($this->input->post('flats')),
                'costs'  => trim($this->input->post('costs')),
                'date'  => $this->input->post('date')
            );
            
            $this->adminModel->update_project($id, $data);
            redirect(base_url('admin/projects'));
        }else{
            $this->edit_project($id);
        }
    }
    public function delete_project($id){
        $this->adminModel->delete_project($id);
		redirect(base_url('admin/projects'));
    }
    ############################### /Projects ###########################

    ############################### Flats ###########################
    public function flats(){
        $data['title'] = $this->title;
        $data['active'] = 'flats';
        $data['admin'] = $this->admin;
        $data['flats'] = $this->adminModel->get_flats();
        $data['projects'] = $this->adminModel->get_projects();
		$this->load->view('admin/flats', $data);
    }
    public function project_flats($project_id){
        $data['title'] = $this->title;
        $data['active'] = 'flats';
        $data['admin'] = $this->admin;
        $data['flats'] = $this->adminModel->get_project_flats($project_id);
		$this->load->view('admin/dashboard', $data);
    }
    public function flat($id){
        $flat = $this->adminModel->get_flat($this->input->post('id'));
        // echo json_encode($flat);
    }
    public function create_flat(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createFlat')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'project_id'  => trim($this->input->post('project_id')),
                'floor'  => trim($this->input->post('floor')),
                'stf'  => trim($this->input->post('stf')),
                'costs'  => trim($this->input->post('costs')),
                'flat_ready'  => $this->input->post('date')
            );
            $this->adminModel->create_flat(array_filter($data));
            redirect(base_url('admin/flats'));
        }else{
            $this->flats();
        }
    }
    public function edit_flat($id){
        $data['title'] = $this->title;
        $data['active'] = 'users';
        $data['admin'] = $this->admin;
        $data['flat'] = $this->adminModel->get_flat($id);
        $data['projects'] = $this->adminModel->get_projects();
        if(!$data['flat']){
            redirect(base_url('admin/flats'));
        }
		$this->load->view('admin/edit_flat', $data);
    }
    public function update_flat(){
        $id = $this->input->post('id');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createFlat')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'project_id'  => trim($this->input->post('project_id')),
                'floor'  => trim($this->input->post('floor')),
                'stf'  => trim($this->input->post('stf')),
                'costs'  => trim($this->input->post('costs')),
                'flat_ready'  => $this->input->post('date')
            );
            
            $this->adminModel->update_flat($id, $data);
            redirect(base_url('admin/flats'));
        }else{
            $this->edit_flat($id);
        }
    }
    ############################### /Flats ###########################

    ################################### utility ##################################
    public function utilities(){
        $data['title'] = $this->title;
        $data['active'] = 'utilities';
        $data['admin'] = $this->admin;
        $data['utilities'] = $this->adminModel->get_utilities();
		$this->load->view('admin/utilities', $data);
    }
    public function create_utility(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createUtility')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'cost'  => trim($this->input->post('cost'))
            );
            $this->adminModel->create_utility(array_filter($data));
            redirect(base_url('admin/utilities'));
        }else{
            $this->utilities();
        }
    }
    public function edit_utility($id){
        $data['title'] = $this->title;
        $data['active'] = 'users';
        $data['admin'] = $this->admin;
        $data['utility'] = $this->adminModel->get_utility($id);
        if(!$data['utility']){
            redirect(base_url('admin/utilities'));
        }
		$this->load->view('admin/edit_utility', $data);
    }
    public function update_utility(){
        $id = $this->input->post('id');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createUtility')){
            $data = array(
                'name'  => trim($this->input->post('name')),
                'cost'  => trim($this->input->post('cost'))
            );
            
            $this->adminModel->update_utility($id, $data);
            redirect(base_url('admin/utilities'));
        }else{
            $this->edit_utility($id);
        }
    }
    public function delete_utility($id){
        $this->adminModel->delete_utility($id);
		redirect(base_url('admin/utilities'));
    }
    ################################### /utility ##################################

    ################################### book flat ##################################
    public function book_flats(){
        $data['title'] = $this->title;
        $data['active'] = 'book_flats';
        $data['admin'] = $this->admin;
        $data['projects'] = $this->adminModel->get_projects();
        $data['flats'] = $this->adminModel->get_unsold_flat($data['projects'][0]->id);
        $data['customers'] = $this->adminModel->get_customers();
        $data['utilities'] = $this->adminModel->get_utilities();
        $data['banks'] = $this->adminModel->get_banks();
		$this->load->view('admin/book_flats', $data);
    }
    public function get_flat(){
        $flat = $this->adminModel->get_flat($this->input->post('id'));
        echo json_encode($flat);
    }
    public function get_unsold_flats(){
        $flats = $this->adminModel->get_unsold_flat($this->input->post('id'));
        $options = "<option>Select a Flat</option>";
        foreach($flats as $flat){
            $options .= '<option value="'.$flat->id.'">'.$flat->name.'</option>';
        }
        echo $options;
    }
    public function get_branch(){
        $branches = $this->adminModel->get_branches($this->input->post('id'));
        $options = "";
        foreach($branches as $branch){
            $options .= '<option value="'.$branch->id.'">'.$branch->name." - ".$branch->location.'</option>';
        }
        echo $options;
    }
    public function create_book_flats(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createBookFlat')){
            $project_id = $this->input->post('project_id');
            $flat_id = $this->input->post('flat_id');
            $customer_id = $this->input->post('customer_id');
            $flat_price = $this->input->post('flat_price');
            $discount = $this->input->post('discount');
            $utilities = $this->input->post('utilities');
            $advanced_type = $this->input->post('advanced_type');
            $advanced = $this->input->post('advanced');
            $advanced_date = $this->input->post('advanced_date');
            $advanced_by = $this->input->post('advanced_by');
            $bank_id = $this->input->post('bank_id');
            $branch_id = $this->input->post('branch_id');
            $mr_no = $this->input->post('mr_no');
            $total_installment = $this->input->post('total_installment');

            $names = "";
            $costs = 0;
            for($i = 0; $i < sizeof($utilities); $i++){
                $utility = $this->adminModel->get_utility($utilities[$i]);
                $names .= $utility->name;
                $costs += $utility->cost;
            }
            $total_costs = $flat_price + $costs;

            $sold_flats_data = array(
                'project_id'            => $project_id,
                'flat_id'               => $flat_id,
                'customer_id'           => $customer_id,
                'advanced_type'         => $advanced_type,
                'advanced'              => $advanced,
                'advanced_date'         => $advanced_date,
                'advanced_by'           => $advanced_by,
                'bank_id'               => $bank_id,
                'branch_id'             => $branch_id,
                'mr_no'                 => $mr_no,
                'total_installment'     => $total_installment,
                'utilite_names'         => $names,
                'utility_total_costs'   => $costs,
                'total_costs'           => $total_costs,
                'discount'              => $discount
            );

            $receipt_books_data = array(
                'receive_date'      => $advanced_date,
                'project_id'        => $project_id,
                'flat_id'           => $flat_id,
                'customer_id'       => $customer_id,
                'payment_by'        => $advanced_type,
                'bank_id'           => $bank_id,
                'branch_id'         => $branch_id,
                'mr_no'             => $mr_no,
                'receive_amount'    => $advanced,
                'signature_mark'    => 'Advanced'
            );
            // sold flat true
            $this->adminModel->update_flat($flat_id, ['is_sold' => 1]);

            // sold flat
            $this->adminModel->create_sold_flat(array_filter($sold_flats_data));

            // receipt book
            $this->adminModel->create_receipt_book(array_filter($receipt_books_data));

            redirect(base_url('admin/invoice/sold/flat/'.$flat_id));
        }else{
            $this->book_flats();
        }
    }
    ################################### /book flat ##################################

    ####################################### sold flat ######################################
    public function sold_flats(){
        $data['title'] = $this->title;
        $data['active'] = 'sold_flats';
        $data['admin'] = $this->admin;
        $data['sold_flats'] = $this->adminModel->get_sold_flats();
		$this->load->view('admin/sold_flats', $data);
    }
    public function sold_flat($id = null){
        $data['title'] = $this->title;
        $data['active'] = 'sold_flats';
        $data['admin'] = $this->admin;
        $data['flat_info'] = $this->adminModel->get_flat_info($id);
        $data['receipt_books'] = $this->adminModel->get_receipt_book_of_flat($id);
		$this->load->view('admin/sold_flat', $data);
    }
    ####################################### /sold flat ######################################
    
    ####################################### receipt book ####################################
    public function receipt_books(){
        $data['title'] = $this->title;
        $data['active'] = 'receipt_books';
        $data['admin'] = $this->admin;
        $data['receipt_books'] = $this->adminModel->get_receipt_books();
        $data['projects'] = $this->adminModel->get_projects();
        $data['flats'] = $this->adminModel->get_project_flats($data['projects'][0]->id);
        $data['customers'] = $this->adminModel->get_customers();
        $data['banks'] = $this->adminModel->get_banks();
		$this->load->view('admin/receipt_books', $data);
    }
    public function create_receipt_book(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createReceiptBook')){
            $project_id = $this->input->post('project_id');
            $flat_id = $this->input->post('flat_id');
            $customer_id = $this->input->post('customer_id');
            $mr_no = $this->input->post('mr_no');
            $receive_date = $this->input->post('receive_date');
            $on_account_of = $this->input->post('on_account_of');
            $payment_by = $this->input->post('payment_by');
            $receive_amount = $this->input->post('receive_amount');
            $check_cash_date = $this->input->post('check_cash_date');
            $bank_id = $this->input->post('bank_id');
            $branch_id = $this->input->post('branch_id');
            
           
            $receipt_books_data = array(
                'receive_date'      => $receive_date,
                'project_id'        => $project_id,
                'flat_id'           => $flat_id,
                'customer_id'       => $customer_id,
                'payment_by'        => $payment_by,
                'bank_id'           => $bank_id,
                'branch_id'         => $branch_id,
                'mr_no'             => $mr_no,
                'receive_amount'    => $receive_amount,
                'on_account_of'     => $on_account_of,
                'check_cash_date'   => $check_cash_date,
                'signature_mark'    => 'Installment'
            );
            // receipt book
            $this->adminModel->create_receipt_book(array_filter($receipt_books_data));

            redirect(base_url('admin/invoice/sold/flat/'.$flat_id));
        }else{
            $this->receipt_books();
        }
    }
    ####################################### /receipt book ####################################

    public function get_project_flats(){
        $flats = $this->adminModel->get_project_flats($this->input->post('id'));
        $options = "<option>Select a Flat</option>";
        foreach($flats as $flat){
            $options .= '<option value="'.$flat->id.'">'.$flat->name.'</option>';
        }
        echo $options;
    }
    public function project_invoice(){
        $data['title'] = $this->title;
        $data['active'] = 'project_invoice';
        $data['admin'] = $this->admin;
		$this->load->view('admin/dashboard', $data);
    }

    ######################################### Banks ##############################
    public function get_banks(){
        $data['title'] = $this->title;
        $data['active'] = 'banks';
        $data['admin'] = $this->admin;
        $data['banks'] = $this->adminModel->get_banks();
        $data['branches'] = $this->adminModel->get_branches_with_bank_name();
		$this->load->view('admin/banks', $data);
    }

    public function create_bank(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createBank')){
            $name = $this->input->post('name');
            $create_bank = array(
                'name'      => $name
            );
            // receipt book
            $this->adminModel->create_bank(array_filter($create_bank));

            redirect(base_url('admin/banks'));
        }else{
            $this->get_banks();
        }
    }

    public function create_branch(){
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createBranch')){
            $bank_id = $this->input->post('bank_id');
            $name = $this->input->post('name');
            $location = $this->input->post('location');
            $create_branch = array(
                'name'      => $name,
                'bank_id'   => $bank_id,
                'location'  => $location
            );
            // receipt book
            $this->adminModel->create_branch(array_filter($create_branch));

            redirect(base_url('admin/banks'));
        }else{
            $this->get_banks();
        }
    }

    ####################### Logout
    public function logout(){
		$this->session->unset_userdata('admin_logged_in');
		return redirect('admin');
	}
}