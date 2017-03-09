<?php
class upload extends CI_controller {
	public function index (){
		$this->load->view('upload_view',array('error'=>''));
	}
	public function upload (){
		$config ['upload_path'] ="./pictures/";
		$config ['allowed_types'] = 'jpg|jpeg|gif|png';
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload()){
			$error = array ('error'=>$this->upload->display_errors());
			$this->load->view ('upload_view',$error);

		}else{
			$file_data = $this->upload->data();
			$data['img'] = base_url().'./pictures/'.$file_data['file_name'];
			$this->load->view ('success_msg',$data);
		}
	}
}

?>