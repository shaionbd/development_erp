<?php

$config = array(
        //rules for creating user
        'createUser' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|min_length[4]|max_length[255]'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|max_length[255]'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'Phone',
                        'rules' => 'trim|min_length[7]|max_length[255]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|max_length[255]|matches[passconf]'
                ),
                array(
                        'field' => 'passconf',
                        'label' => 'Password Confirmation',
                        'rules' => 'trim|max_length[255]|matches[password]'
                )
        ),

        // customers
        'createCustomer' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|min_length[4]|max_length[255]'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|max_length[255]'
                ),
                array(
                        'field' => 'permanent_address',
                        'label' => 'Permanent Address',
                        'rules' => 'trim|min_length[4]'
                ),
                array(
                        'field' => 'nid_passport',
                        'label' => 'Nid or Passport',
                        'rules' => 'trim|required|min_length[4]'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'Phone',
                        'rules' => 'trim|required|min_length[4]'
                ),
                array(
                        'field' => 'job_status',
                        'label' => 'Job Status',
                        'rules' => 'trim|min_length[4]'
                )
        ),

        'createProject' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|min_length[2]|max_length[255]'
                ),
                array(
                        'field' => 'location',
                        'label' => 'Location',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'storied',
                        'label' => 'Storied',
                        'rules' => 'trim|min_length[1]|max_length[255]'
                ),
                array(
                        'field' => 'flats',
                        'label' => 'Flats',
                        'rules' => 'trim|max_length[255]'
                )
        ),

        'createFlat' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|min_length[2]|max_length[255]'
                ),
                array(
                        'field' => 'floor',
                        'label' => 'Floor',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'stf',
                        'label' => 'Square Foot',
                        'rules' => 'trim|min_length[1]|max_length[255]'
                )
        ),

        'createUtility' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|min_length[2]|max_length[255]'
                ),
                array(
                        'field' => 'cost',
                        'label' => 'Cost',
                        'rules' => 'trim|required|max_length[255]'
                )
        ),

        'createBookFlat' => array(
                array(
                        'field' => 'flat_id',
                        'label' => 'Flat Name',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'project_id',
                        'label' => 'Project Name',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'advanced',
                        'label' => 'Advanced',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'advanced_by',
                        'label' => 'Advanced By',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'total_installment',
                        'label' => 'Total Installment',
                        'rules' => 'trim|required|max_length[255]'
                )
        ),

        'createReceiptBook' => array(
                array(
                        'field' => 'flat_id',
                        'label' => 'Flat Name',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'project_id',
                        'label' => 'Project Name',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'mr_no',
                        'label' => 'MR No',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'receive_date',
                        'label' => 'Receive Date',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'receive_amount',
                        'label' => 'Receive Amount',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'check_cash_date',
                        'label' => 'Cheque/Cash Date',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'payment_by',
                        'label' => 'Payment By',
                        'rules' => 'trim|required|max_length[255]'
                )
        ),

        'login' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|max_length[255]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|max_length[255]'
                ) 
        ), 

);