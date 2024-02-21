<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        //$this->load->helper(array('form', 'url'));
    }

    public function index() {
        // Display list of products
        $data['products'] = $this->Product_model->get_products();
        $data['draftProducts'] = $this->session->userdata('product');
        // var_dump($data['draftProducts']);
        // exit;
        $this->load->view('product/product_list', $data);
    }

    public function add() {
        // Display add product form
        $this->load->view('product/add_product');
    }

    public function create($id=0,$type='') {
        $saveData = array();
        $dataArray = array(
            'product_name' => $this->input->post('product_name'),
            'slug' => $this->input->post('slug'),
            'product_description' => $this->input->post('product_description'),
        );
        $ids = $this->Product_model->saveProduct($dataArray);
        if($type == 'Final'){
            $preDeleteData = $this->session->userdata('product');
            foreach ($preDeleteData[$id]['product_images'] as $key => $value) {
                $saveData[] = array(
                    'product_id'=>$ids,
                    'image_url' => $value
                );
            }
            
            unset($preDeleteData[$id]);
            $this->session->set_userdata('product',$preDeleteData);
        }
        
        // Count total files
        $count_files = count($_FILES['pruduct_images']['name']);

        // Initialize array to store upload data
        $upload_data = array();
        

       // Loop through each file
        for($i=0; $i<$count_files; $i++) {
            $_FILES['file']['name']     = $_FILES['pruduct_images']['name'][$i];
            $_FILES['file']['type']     = $_FILES['pruduct_images']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['pruduct_images']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['pruduct_images']['error'][$i];
            $_FILES['file']['size']     = $_FILES['pruduct_images']['size'][$i];

            // Initialize the upload library
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000; // Set max size in KB

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                // Handle upload failure
                print_r($error);
            } else {
                $upload_data[] = $this->upload->data();
                //$finalUploadData[] = $upload_data[$i]['file_name'];
                $saveData[] = array(
                    'product_id' => $ids,
                    'image_url' =>  $upload_data[$i]['file_name']
               );
                
                // Handle upload success
            }
        }
        if(count($saveData)>0){
            $saveImage = $this->Product_model->insertImage($saveData);
        }
        Redirect('Product');
        
       
    }

    public function edit($id) {
        $productData = $this->Product_model->getSpecificProduct($id);
        $data['product'] = $productData[0];
        $data['productId'] = $id;
        $data['type'] = 'normal';
        $this->load->view('product/edit_product',$data);

    }

    public function update($id) {
        $dataArray = array(
            'product_name' => $this->input->post('product_name'),
            'slug' => $this->input->post('slug'),
            'product_description' => $this->input->post('product_description'),
        );
        $updateData = $this->Product_model->updateProduct($id,$dataArray);
        // Count total files
        $count_files = count($_FILES['pruduct_images']['name']);

        // Initialize array to store upload data
        $upload_data = array();
        $saveData = array();

       // Loop through each file
        for($i=0; $i<$count_files; $i++) {
            $_FILES['file']['name']     = $_FILES['pruduct_images']['name'][$i];
            $_FILES['file']['type']     = $_FILES['pruduct_images']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['pruduct_images']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['pruduct_images']['error'][$i];
            $_FILES['file']['size']     = $_FILES['pruduct_images']['size'][$i];

            // Initialize the upload library
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000; // Set max size in KB

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                // Handle upload failure
                print_r($error);
            } else {
                $upload_data[] = $this->upload->data();
                //$finalUploadData[] = $upload_data[$i]['file_name'];
                $saveData[] = array(
                    'product_id' => $id,
                    'image_url' =>  $upload_data[$i]['file_name']
               );
                
                // Handle upload success
            }
        }
        if(count($saveData)>0){
            $saveImage = $this->Product_model->insertImage($saveData);
        }
        
        Redirect('Product');
        
    }

    public function delete($id) {
        $deleteData = $this->Product_model->deleteProduct($id);
        Redirect('Product');
    }

    public function final_submit() {
        // Handle final submission to database
        // Validate and sanitize data
        // Insert data into database
        // Move uploaded images to permanent storage
        // Clear temporary storage
        // Redirect back to product list or show success message
    }

    public function createDraft(){
         if(!$this->session->userdata('product')){
            $preproductData[]=$this->input->post();
            
        }else{
            $preproductData = $this->session->userdata('product');
            $preproductData[]=$this->input->post();
        }
        $id = count($preproductData)-1;
        // echo $id;
        // exit;
        // Count total files
        $count_files = count($_FILES['pruduct_images']['name']);

        // Initialize array to store upload data
        $upload_data = array();
        $finalUploadData = array();

       // Loop through each file
        for($i=0; $i<$count_files; $i++) {
            $_FILES['file']['name']     = $_FILES['pruduct_images']['name'][$i];
            $_FILES['file']['type']     = $_FILES['pruduct_images']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['pruduct_images']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['pruduct_images']['error'][$i];
            $_FILES['file']['size']     = $_FILES['pruduct_images']['size'][$i];

            // Initialize the upload library
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000; // Set max size in KB

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                // Handle upload failure
                print_r($error);
            } else {
                $upload_data[] = $this->upload->data();
                $finalUploadData[] = $upload_data[$i]['file_name'];
                // Handle upload success
            }
        }
        if(count($finalUploadData)>0){
            $preproductData[$id]['product_images'] = $finalUploadData;
        }
        $this->session->set_userdata('product',$preproductData);
        Redirect('Product');
    }

    public function editDraft($id){
        $productData = $this->session->userdata('product');
        $data['product'] = $productData[$id];
        $data['productId'] = $id;
        $data['type'] = 'draft';
        $this->load->view('product/edit_product',$data);
    }

    public function updateDraft($id){
        $preproductData = $this->session->userdata('product');

        $preproductData[$id] = $this->input->post();

       
        // Count total files
        $count_files = count($_FILES['pruduct_images']['name']);

        // Initialize array to store upload data
        $upload_data = array();
        $finalUploadData = array();

       // Loop through each file
        for($i=0; $i<$count_files; $i++) {
            $_FILES['file']['name']     = $_FILES['pruduct_images']['name'][$i];
            $_FILES['file']['type']     = $_FILES['pruduct_images']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['pruduct_images']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['pruduct_images']['error'][$i];
            $_FILES['file']['size']     = $_FILES['pruduct_images']['size'][$i];

            // Initialize the upload library
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000; // Set max size in KB

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                // Handle upload failure
                print_r($error);
            } else {
                $upload_data[] = $this->upload->data();
                $finalUploadData[] = $upload_data[$i]['file_name'];
                // Handle upload success
            }
        }
        if(count($finalUploadData)>0){
            $preproductData[$id]['product_images'] = $finalUploadData;
        }
        
        $this->session->set_userdata('product',$preproductData);
       
        Redirect('product');
    }

    public function deleteDraft($id) {
        $preDeleteData = $this->session->userdata('product');
        unset($preDeleteData[$id]);
        $this->session->set_userdata('product',$preDeleteData);
        Redirect('Product');
    }

    public function viewData($id,$params=0) {
        if($params == 1){
            $productData = $this->session->userdata('product');
            
            $data['product'] = $productData[$id];
            $data['productId'] = $id;
        }else{
            $productData = $this->Product_model->getSpecificProduct($id);
            $data['product_images'] = $this->Product_model->getSpecificProductImage($id);
            $data['product'] = $productData[0];
            $data['productId'] = $id;
        }
        $this->load->view('product/view_product',$data);
        
    }
}
