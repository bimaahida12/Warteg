<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_menu_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->render['content']   = $this->load->view('jenis_menu/jenis_menu_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_menu_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenis_menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jenis' => $row->jenis,
	    );
            $this->render['content']   = $this->load->view('jenis_menu/jenis_menu_read', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_menu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_menu/create_action'),
	    'id' => set_value('id'),
	    'jenis' => set_value('jenis'),
	);
        $this->render['content']   = $this->load->view('jenis_menu/jenis_menu_form', $data, TRUE);
        $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis' => $this->input->post('jenis',TRUE),
	    );

            $this->Jenis_menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_menu/update_action'),
		'id' => set_value('id', $row->id),
		'jenis' => set_value('jenis', $row->jenis),
	    );
        $this->render['content']   = $this->load->view('jenis_menu/jenis_menu_form', $data, TRUE);
        $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jenis' => $this->input->post('jenis',TRUE),
	    );

            $this->Jenis_menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_menu_model->get_by_id($id);

        if ($row) {
            $this->Jenis_menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_menu.php */
/* Location: ./application/controllers/Jenis_menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-13 15:56:07 */
/* http://harviacode.com */