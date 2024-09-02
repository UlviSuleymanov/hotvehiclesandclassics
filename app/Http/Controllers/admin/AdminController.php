<?php

include_once 'application/helpers/Utils.php';


class AdminController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('BlogsModel');
		$this->load->model('CategoriesModel');
	}

	public function index()
	{
		if ($_SESSION['admin'] != null) {
			$data['categories'] = $this->CategoriesModel->get_categories();
			$data['admin'] = $_SESSION['admin'];
			$data['total_blogs'] = $this->BlogsModel->get_total_blogs();
			$data['active_blogs'] = $this->BlogsModel->get_active_blogs();
			$data['total_active_blogs'] = count($data['active_blogs']);
			$data['total_categories'] = count($data['categories']);
			$data['active_categories'] = $this->CategoriesModel->get_active_categories();
			$data['total_active_categories'] = count($data['active_categories']);

			if ($data != null) {
				$this->load->view('admin/index', $data);
			} else {
				redirect('/');
			}
		} else {
			redirect('/Auth/');
		}
	}


	public function toggleSliderStatus()
	{
		$id = $this->uri->segment('4');
		if ($id != null) {
			$this->BlogsModel->change_slider_status($id);
			redirect('/Admin/Blogs');
		} else {
			redirect('/Admin/Blogs');
		}
	}


	public function toggleVisibility()
	{
		$id = $this->uri->segment('4');
		if ($id != null) {
			$this->CategoriesModel->toggle_category_visibility($id);
			redirect('/Admin/Categories');
		} else {
			redirect('/Admin/Categories');
		}
	}

	public function categories()
	{
		if ($_SESSION['admin'] != null) {
			$data['categories'] = $this->CategoriesModel->get_categories();
			$data['admin'] = $_SESSION['admin'];
			if ($data != null) {
				$this->load->view('admin/categories', $data);
			} else {
				redirect('/');
			}
		} else {
			redirect('/auth/');
		}
	}

	public function blogs()
	{
		if ($_SESSION['admin'] != null) {
			$data['categories'] = $this->CategoriesModel->get_categories();
			$data['admin'] = $_SESSION['admin'];
			$data['last_blogs'] = $this->BlogsModel->get_last_blogs(10);

			if ($data != null) {
				$this->load->view('admin/blog/index', $data);
			} else {
				redirect('/');
			}
		} else {
			redirect('/Auth/');
		}
	}


	/**
	 * @return void
	 * Add new Blogpost methodu form helperi ve form validation library-sini yukleyir
	 * form_validation librarisinin set_rules methodu ile formdan gelen dataya rule elave edirik.
	 * form_validationun run olub olmamasini check edirik. eger run olmayibsa views folderinin icerisindeki admin sub
	 * folderinin posts viewu-nu render edirik(load). eger form validation run olubsa
	 * $data adli bir array yaradiriq bu array formdan gelen inoutlari ozunun valuesu kimi set edir( keyleri biz teyin edirk)
	 * daha sonra BlogsModelinin create_blog($data) methodu cagirilir. daha sonra datanin set olunub olunmamasina gore checking gedir.
	 * ve sonda redirection.
	 */
	public function addNewBlogPost()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$categories['categories'] = $this->CategoriesModel->get_categories();

		// Set validation rules
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('short_description', 'Short Description', 'required');
		$this->form_validation->set_rules('categories[]', 'Categories', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->view('admin/blog/add', $categories);
		} else {
			// Handle file upload
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/blog/add', array_merge($categories, $error));
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'created_at' => date("Y-m-d H:i:s"),
					'show_in_slider' => $this->input->post('show_in_slider') ? 1 : 0,
					'slug' => Utils::slugify($this->input->post('title')),
					'short_description' => $this->input->post('short_description'),
					'photo_location' => $upload_data['full_path'],
					'photo_ref' => '/uploads/' . $upload_data['file_name'],
				);

				$categories_ids = $this->input->post('categories');

				// Insert olunur
				$blog_id = $this->BlogsModel->create_blog($data);
				// Associate categoriyalara elave olunur.
				$this->BlogsModel->associate_categories($blog_id, $categories_ids);

				redirect('/Admin/Blogs');
			}
		}
	}

	public function editBlog()
	{
		$id = $this->uri->segment('4');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('categories[]', 'Categories', 'required');

		if ($this->form_validation->run() === false) {
			if ($id != null) {
				$data['blog'] = $this->BlogsModel->get_blog_by_id($id);
				$data['categories'] = $this->CategoriesModel->get_categories();
				$this->load->view('admin/blog/manage', $data);
			}
		} else {
			$newData = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
			);

			// Handle categories
			$categories = $this->input->post('categories');

			$this->BlogsModel->update_blog_categories($id, $categories);

			// Handle photo upload
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photo')) {
				$this->BlogsModel->unlink_files_by_id($id);
				$upload_data = $this->upload->data();
				$newData['photo_location'] = $upload_data['full_path'];
				$newData['photo_ref'] = '/uploads/' . $upload_data['file_name'];
			}

			// Update blog
			$result = $this->BlogsModel->update_blog($id, $newData);

			if ($result > 0) {
				$this->session->set_flashdata('success', 'Blog successfully changed!');
				redirect('/Admin/Blogs');
			} else {
				$this->session->set_flashdata('error', 'Failed to update blog!');
				redirect('/Admin/Blogs');
			}
		}
	}


	public function editCategory()
	{
		$id = $this->uri->segment('4');
		if ($id != null) {
			$this->CategoriesModel->edit_category($id);
		} else {
			redirect('/Admin/Categories');
		}
	}

	public function addNewCategory()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->view('admin/index');
		} else {
			$this->CategoriesModel->set_category();
			redirect('/Admin/Categories');
		}

	}


	public function selectedBlog()
	{
		$data = null;
		$id = $this->uri->segment('4');

		if ($id != null) {
			$data['blog'] = $this->BlogsModel->get_blog_by_id($id);
		}
		if ($data != null) {
			$this->BlogsModel->update_blogs_views_count($id);
			$this->load->view('admin/selectedblog', $data);
		} else {
			redirect('Admin/Blogs');
		}

	}


	//urldan id goturulur(category id) daha sonra bu id ile olan bloglar get methodu ile cagirilir
	//eger data null deyilse iceri girilir ve her bir blogpostun photo file silinir(mysqlde location save olunub).
	// daha sonra ise categoriya sililinir. categoriya oz novbesinde ozu ile link olan postlari silir.
	public function deleteCategory()
	{
		$id = $this->uri->segment('4');
		if ($id != null) {
			$data = $this->CategoriesModel->get_blogs_with_category_id($id);
			if ($data != null) {
				foreach ($data as $blog) {
					if ($blog['photo_location'] != null) {
						unlink($blog['photo_location']);
					}
				}
			} else {
				//istersek soft_delete istifade ede bilerik.
				$this->CategoriesModel->force_delete_category($id, false);
				redirect('/Admin/Categories');
			}
			$this->CategoriesModel->force_delete_category($id, true);
			redirect('/Admin/Categories');
		} else {
			redirect('/Admin/Categories');
		}


	}

	public function deleteBlog()
	{

		$id = $this->uri->segment('4');
		echo $id;

		if ($id != null) {
			$this->BlogsModel->force_delete_blog($id);
			redirect('/Admin/Blogs');
		} else {
			redirect('/Admin/Blogs');
		}
	}
}
