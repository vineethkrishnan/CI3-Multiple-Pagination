<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_model extends CI_Model
{

    /**
     * @var mixed
     */
    public $table;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'users';
    }

    /**
     * Insert Record
     * @param  [array] $data
     * @return [type]
     */
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * @return mixed
     */
    public function get_count()
    {
        return $this->db->get($this->table)->num_rows();
    }

    /**
     * @param $limit
     * @param $offset
     * @return mixed
     */
    public function get_all($limit, $offset)
    {
        return $this->db->limit($limit, $offset)->get($this->table)->result();
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
