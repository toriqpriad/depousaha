<?php
class authentication extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'data_model' );
		$this->load->library ( array (
				'curl',
				'session',
				'email' 
		) );
		$this->load->helper ( array (
				'form',
				'url',
				'jwt_helper',
				'rest_response_helper',
				'key_helper',
				'send_mail_helper',
				'client_access_helper' 
		) );
		$this->data = [ ];
	}
	public function display($location) {
		$this->load->view ( 'authentication/include/head', $this->data );
		$this->load->view ( 'authentication/include/function' );
		$this->load->view ( 'authentication/include/modal' );
		$this->load->view ( $location );
	}
	function admin_login() {
		$this->data ['title_page'] = "Halaman Login";
		$this->display ( 'authentication/admin_login' );
	}
	public function logout() {
		$delete_session = $this->session->sess_destroy ();
		$data = array (
				"link" => site_url () . 'admin/login' 
		);
		echo json_encode ( get_success ( $data ) );
	}
	public function admin_submit_login() {
		try {
			$input = json_decode ( file_get_contents ( 'php://input' ) );
			if (! empty ( $input )) {
				$params = new stdClass ();
				$params->dest_table_as = 'user as u';
				$params->select_values = array (
						'u.*' 
				);
				$where1 = array (
						"where_column" => 'u.username',
						"where_value" => $input->username 
				);
				$where2 = array (
						"where_column" => 'u.password',
						"where_value" => $input->password 
				);
				$params->where_tables = array (
						$where1,
						$where2 
				);
				$get = $this->data_model->get ( $params );
				if ($get ['response'] == OK_STATUS) {
					$date = date ( 'Y-m-d' );
					$expr_date = date ( 'Y-m-d', time () + 86400 );
					$include = array (
							'name' => $get ['results'] [0]->name,
							'role' => $get ['results'] [0]->role,
							'created_date' => $date,
							'expire_date' => $expr_date 
					);
					$data ['token'] = JWT::encode ( get_success ( $include ), SERVER_SECRET_KEY );
					$data ['role'] = $get ['results'] [0]->role;
					// SET WEB SESSION //
					if ($data ['token'] == TRUE) {
						$this->session->set_userdata ( 'web_token', $data ['token'] );
						echo json_encode ( get_success ( $data ['role'] ) );
					} else {
						echo json_encode ( response_fail () );
					}
				} else {
					echo json_encode ( response_fail () );
				}
			}
		} catch ( Exception $e ) {
			echo json_encode ( response_fail () );
		}
	}
	public function checkwebtoken() {
		try {
			$token = json_decode ( file_get_contents ( 'php://input' ) );
			if ($token == "") {
				$response = response_fail ();
			} else {
				$decode = JWT::decode ( $token, SERVER_SECRET_KEY, JWT_ALGHORITMA );
				if (! $decode) {
					$response = response_fail ();
				} else {
					if ($decode->response != OK_STATUS) {
						$response = response_fail ();
					} else {
						if ($decode->data->role != "A") {
							$response = response_fail ();
						} else {
							$response = response_success ();
						}
					}
				}
			}
		} catch ( Exception $e ) {
			$response = response_fail ();
		}
		echo json_encode ( $response );
	}
}
