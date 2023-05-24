<?php

namespace App\Controllers;
use App\Models\PageModel;

class Pages extends BaseController
{

    // Session
    protected $session;
    // Data
    protected $data;
    // Model
    protected $page_model;

    // Initialize Objects
    public function __construct(){
        $this->page_model = new PageModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }
    public function index()
    {
        $this->data['page_title'] = "Pages";
       // $this->data['list'] = $this->page_model->orderBy('date(date_created) ASC')->select('*')->get()->getResult();
        $data['pagelist'] = $this->page_model->getPagelist();
        echo view('templates/header', $this->data);
        echo view('pages/index', $this->data);
        echo view('templates/footer', $this->data);
    }

    
    public function list(){
        $this->data['page_title'] = "List of Contacts";
        $this->data['list'] = $this->page_model->orderBy('date(date_created) ASC')->select('*')->get()->getResult();
       echo view('templates/header', $this->data);
        echo view('pages/listview', $this->data);
        echo view('templates/footer');
    }
    public function create(){
        $this->data['page_title'] = "Add New";
        $this->data['request'] = $this->request;
        echo view('templates/header', $this->data);
        echo view('pages/create', $this->data);
        echo view('templates/footer');
    }

    // Edit Form Page
    public function edit($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/pages/list');
        }
        $this->data['page_title'] = "Edit Contact Details";
        $qry= $this->page_model->select('*')->where(['id'=>$id]);
        $this->data['data'] = $qry->first();
        echo view('templates/header', $this->data);
        echo view('pages/edit', $this->data);
        echo view('templates/footer');
    }

    public function save(){
        $this->data['request'] = $this->request;
       
        $post = [
            'pagename' => $this->request->getPost('pagename'),
            'date_created' => $this->request->getPost('date_created'),
        ];

        if(!empty($this->request->getPost('id'))){
   
            $save = $this->page_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();

        }else{
         
            $save = $this->page_model->insert($post);
        }
        
        if($save){
            if(!empty($this->request->getPost('id'))){
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            return redirect()->to('/pages/list');
            }
            else{
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/pages/list');
            }
        }else{
            echo view('templates/header', $this->data);
            echo view('pages/create', $this->data);
            echo view('templates/footer');
        }
    }

     // Delete Data
     public function delete($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/pages/list');
        }
        $delete = $this->page_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Contact Details has been deleted successfully.') ;
            return redirect()->to('/pages/list');
        }
    }

     // View Data
     public function view_details($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/main/list');
        }
        $this->data['page_title'] = "View Contact Details";
        $qry= $this->page_model->select("*")->where(['id'=>$id]);
        $this->data['data'] = $qry->first();
        echo view('templates/header', $this->data);
        echo view('pages/view', $this->data);
        echo view('templates/footer');
    }
    

}


