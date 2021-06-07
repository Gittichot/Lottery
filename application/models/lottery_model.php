<?php

class lottery_model extends CI_Model
{
    private $lottery = "lottery";
    private $lottery_type = "lottery_type";


    function __construct()
    {
        parent::__construct();
    }

    public function insertLottery($arrData)
    {
        $query = $this->db->insert_batch($this->lottery, $arrData);
        if ($query) {
            return  "TRUE";
        } else {
            return  "FALSE";
        }
    }

    public function countTypeId()
    {
        $this->db->select("type_id, COUNT(type_id) AS COUNT");
        $this->db->from($this->lottery);
        $this->db->group_by("type_id");
        $this->db->order_by("type_id DESC");
        $join_query = $this->db->get();
        // echo $this->db->last_query();
        return $join_query->result_array();
    }

    public function getData()
    {
        $query = $this->db->get($this->lottery);
        return $query->result_array();
    }

    public function getTypelottery()
    {
        $query = $this->db->get($this->lottery_type);
        return $query->result_array();
    }

    public function updateLottery($arrData)
    {
        $query = $this->db->update_batch($this->lottery, $arrData, 'lottery_id');
        if ($query) {
            return  "TRUE";
        } else {
            return  "FALSE";
        }
    }

    public function searchLottery($Lottery)
    {
        $where = "lottery_number LIKE '%" . $Lottery . "%'";
        $this->db->select("lottery.type_id");
        $this->db->from($this->lottery);
        $this->db->where($where);
        $this->db->join($this->lottery_type, "lottery.type_id = lottery_type.type_id");
        $join_query = $this->db->get();
        // echo $this->db->last_query();
        return $join_query->result_array();
    }

    public function subStr($subStr)
    {
        $where = "lottery_number LIKE '%" . $subStr . "%'";
        $this->db->select("lottery.type_id");
        $this->db->from($this->lottery);
        $this->db->where($where);
        $this->db->join($this->lottery_type, "lottery.type_id = lottery_type.type_id");
        $join_query = $this->db->get();
        // echo $this->db->last_query();
        return $join_query->result_array();
    }
}
