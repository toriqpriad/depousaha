<?php
class admin extends CI_Controller {

	function __construct() {
		parent::__construct ();
		$this->load->model ( 'data_model' );
		$this->load->library ( array (
			'curl',
			'session',
			'datatables'
			) );
			$this->load->helper ( array (
				'form',
				'url',
				'jwt_helper',
				'rest_response_helper',
				'key_helper',
				'image_process_helper',
				'file'
				) );
				$this->data = [ ];
				$this->checkauth ();
			}
			public function display($location, $function_location = NULL,$table = NULL ) {
				$this->data ['menu'] = $this->menu ();
				$this->data ['site'] = $this->site ();
				$this->load->view ( 'admin/include/head', $this->data );
				$this->load->view ( 'admin/static/ajax' );
				if($table == TRUE){
					$this->load->view ( 'admin/static/table' );
				}
				$this->load->view ( 'admin/include/function' );
				$this->load->view ( 'admin/include/modal' );
				$this->load->view ( 'admin/include/sidebar_menu' );
				$this->load->view ( 'admin/include/top_menu' );
				$this->load->view ( $location );
				$this->load->view ( $function_location );
				$this->load->view ( 'admin/include/footer_menu' );
			}

			private function get_last_value() {
				$dest_table_as = 'arduino as a';
				$select_values = array (
					'*'
				);
				$params = new stdClass ();
				$params->dest_table_as = $dest_table_as;
				$params->select_values = $select_values;
				$params->limit = '1';
				$get = $this->data_model->get ( $params );
				if ($get ['response'] == OK_STATUS) {
					if (! empty ( $get ['results'] )) {
						$total = $get ["results"] [0];
					} else {
						$total = [ ];
					}
				} else {
					$total = [ ];
				}
				return $total;
			}
			public function checkauth() {
				if ($this->session->userdata ( 'web_token' ) == "") {
					redirect ( 'admin/login' );
					exit ();
				} else {
					$decode = JWT::decode ( $this->session->userdata ( 'web_token' ), SERVER_SECRET_KEY, JWT_ALGHORITMA );
					if ($decode->response != OK_STATUS) {
						redirect ( 'admin/login' );
						exit ();
					} else {
						if ($decode->data->role != "A") {
							redirect ( 'admin/login' );
							exit ();
						}
					}
				}
			}
			public function dashboard() {
				$this->data ['active_page'] = "dashboard";
				$this->data ['title_page'] = "Dashboard";
				$count_merchant = $this->data_model->get_count('merchant');
				$count_product_category = $this->data_model->get_count('product_category');
				$count_product = $this->data_model->get_count('product');
				if($count_merchant['results'] == ""){
					$total_merchant = '0';
				} else {
					$total_merchant = $count_merchant['results'];
				}

				if($count_product_category['results'] == ""){
					$total_product_category = '0';
				} else {
					$total_product_category = $count_product_category['results'];
				}

				if($count_product['results'] ==	 ""){
					$total_product = '0';
				} else {
					$total_product = $count_product['results'];
				}

				$this->data['total'] = array("merchant" => $total_merchant, "product_category" => $total_product_category, "product" => $total_product);
				$this->display ( 'admin/dashboard/dashboard', 'admin/dashboard/function' );
			}

			public function site() {
				$params = new stdClass ();
				$params->dest_table_as = 'setting as s';
				$params->select_values = array (
					's.*'
				);
				$get = $this->data_model->get ( $params );
				return $get ['results'] [0];
			}


			public function notfound() {
				$this->data ['active_page'] = "notfound";
				$this->data ['title_page'] = "Tidak ditemukan";
				$this->display ( 'admin/404', 'admin/dashboard/function' );
			}

			public function menu() {
				$dashboard = array (
					"label" => "Dashboard",
					"link" => site_url () . 'admin/',
					"page_name" => "dashboard",
					"icon" => "ti-panel"
				);
				$setting = array (
					"label" => "Pengaturan",
					"link" => site_url () . 'admin/setting/',
					"page_name" => "setting",
					"icon" => "ti-settings"
				);

				$merchant = array (
					"label" => "Merchant",
					"link" => site_url () . 'admin/merchant/',
					"page_name" => "merchant",
					"icon" => "fa fa-users 1x"
				);

				$product_category = array (
					"label" => "Kategori Produk",
					"link" => site_url () . 'admin/product_category/',
					"page_name" => "product_category",
					"icon" => "fa fa-cube 1x"
				);

				$products = array (
					"label" => "Produk",
					"link" => site_url () . 'admin/product/',
					"page_name" => "product",
					"icon" => "fa fa-cubes 1x"
				);

				$socmed = array (
					"label" => "Sosial Media",
					"link" => site_url () . 'admin/socmed/',
					"page_name" => "socmed",
					"icon" => "fa fa-share-alt 1x"
				);

				$merchant_promo = array (
					"label" => "Merchant Promo",
					"link" => site_url () . 'admin/merchant_promo/',
					"page_name" => "merchant_promo",
					"icon" => "fa fa-tags 1x"
				);

				$gallery = array (
					"label" => "Galeri Kegiatan",
					"link" => site_url () . 'admin/gallery/',
					"page_name" => "gallery",
					"icon" => "fa fa-picture-o 1x"
				);

				$slider = array (
					"label" => "Slider",
					"link" => site_url () . 'admin/slider/',
					"page_name" => "slider",
					"icon" => "fa fa-desktop 1x"
				);

				$testimoni = array (
					"label" => "Testimoni",
					"link" => site_url () . 'admin/testimoni/',
					"page_name" => "testimoni",
					"icon" => "fa fa-commenting-o 1x"
				);

				$array = [
					$dashboard,
					$merchant,
					$merchant_promo,
					$product_category,
					$products,
					$gallery,
					$testimoni,
					$slider,
					$socmed,
					$setting ,
				];

				return $array;
			}
		}
