<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Hero extends CI_Controller {

	public function index()
	{
		$this->load->model('jenis_hero_model');
		$data["hero_list"] = $this->jenis_hero_model->getDataJenis_Hero();
		$this->load->view('jenis_hero',$data);	
	}

	public function datatable(){
	$this->load->model('jenis_hero_model');
	$data["hero_list"] = $this->jenis_hero_model->getDataJenis_Hero();
	$this->load->view('jenis_hero', $data);
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		
		$this->load->model('jenis_hero_model');	

		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_jenis_hero_view');

		}else{
						$this->jenis_hero_model->insertJenis_Hero();
						$this->load->view('tambah_jenis_hero_sukses');
             }
		}

	public function update($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->load->model('jenis_hero_model');
		$data['jenis_hero']=$this->jenis_hero_model->getDataJenis_Hero($id);
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('edit_jenis_hero_view',$data);

		}
		else{
			$this->jenis_hero_model->updateById($id);

			$this->load->view("edit_jenis_hero_sukses");
			}
	}
	
	public function delete($id)
	{

		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('jenis_hero_model');
		$this->jenis_hero_model->deleteById($id);
		if($this->form_validation->run()==FALSE){
			redirect('jenis_hero');
		}
	
	}
	//method update butuh parameter id berapa yang akan di update
	
}


/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>