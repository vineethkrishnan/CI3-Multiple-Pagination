<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();

        $this->load->model('User_model', 'user');
        $this->load->model('Customer_model', 'customer');
    }

    /**
     * [Welcome Page]
     *
     * @return [CI_View] [description]
     */
    public function index()
    {

        $this->load->helper(['url', 'paginate']);

        $models = ['user', 'customer'];

        $paginate = array();

        foreach ($models as $model) {
            $total = $this->$model->get_count();

            $page = (isset($_GET[$model . '_page']) && $_GET[$model . '_page']) ? $_GET[$model . '_page'] : 1;

            $limit = 10;
            if ($page) {
                $start = ($page - 1) * $limit; //first item to display on this page
            } else {
                $start = 0;
            }

            /* Setup page vars for display. */
            if (0 == $page) {
                $page = 1;
            }

            $paginate[$model]['items'] = $this->$model->get_all($limit, $start);

            $paginate[$model]['pagination'] = paginate(site_url('welcome/index'), $total, $limit, 3, $page, $model . '_page');
        }

        $this->load->view('welcome_message', compact('paginate'));
    }

    /**
     * [db_seed description]
     *
     * @return [type] [description]
     */
    public function db_seed()
    {

        $user = Faker\Factory::create();
        $customer = Faker\Factory::create();

        $limit_record = 100;

        for ($i = 0; $i < 100; $i++) {
            $this->user->insert([
                'name' => $user->name,
                'phone' => $user->phoneNumber,
            ]);
            $this->customer->insert([
                'name' => $customer->name,
                'phone' => $customer->phoneNumber,
            ]);
        }

        die(json_encode(['status' => 'completed']));
    }
}
