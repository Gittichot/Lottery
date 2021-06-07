<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Lottery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("lottery_model");
        //Database 
        $this->load->database();
    }

    public function index($texts = NULL)
    {
        $data['countTypeId']  = $this->lottery_model->countTypeId();
        $data['lottery_types']  = $this->lottery_model->getTypelottery();
        $data['get_datas']  = $this->lottery_model->getData();

        $arrLottery = array();
        foreach ($data['get_datas']  as $key => $item) {
            $arrLottery[$item['type_id']][] = $item['lottery_number'];
        }
        $data['arr_lottery'] = $arrLottery;

        $data['texts'] = $texts;
        $this->load->view('layout/header_view');
        $this->load->view('lottery_view', $data);
        $this->load->view('layout/footer_view');
    }

    public function search()
    {
        $Lottery = $this->input->post('lottery');
        $data['search_lottery'] = $this->lottery_model->searchLottery($Lottery);

        $Type = array();
        foreach ($data['search_lottery'] as $row) :
            $Type =  $row['type_id'];
        endforeach;

        if ($Type == 1) {
            $subStr = substr($Lottery, 1);
            $data['subStr'] = $this->lottery_model->subStr($subStr);
            $typeStr = array();
            foreach ($data['subStr'] as $row) :
                $typeStr =  $row['type_id'];
            endforeach;
            if ($typeStr == 4) {
                $texts = 'ถูกรางวัลที่ 1 และเลขท้าย 2 ตัว';
                $this->index($texts);
            } else {
                $texts = 'ถูกรางวัลที่ 1';
                $this->index($texts);
            }
        } elseif ($Type == 2) {
            $subStr = substr($Lottery, 1);
            $data['subStr'] = $this->lottery_model->subStr($subStr);
            $typeStr = array();
            foreach ($data['subStr'] as $row) :
                $typeStr =  $row['type_id'];
            endforeach;
            if ($typeStr == 4) {
                $texts = 'ถูกรางวัลที่ 2 และเลขท้าย 2 ตัว';
                $this->index($texts);
            } else {
                $texts = 'ถูกรางวัลที่ 2';
                $this->index($texts);
            }
        } elseif ($Type == 3) {
            $subStr = substr($Lottery, 1);
            $data['subStr'] = $this->lottery_model->subStr($subStr);
            $typeStr = array();
            foreach ($data['subStr'] as $row) :
                $typeStr =  $row['type_id'];
            endforeach;
            if ($typeStr == 4) {
                $texts = 'รางวัลเลขข้างเคียงรางวัลที่ 1 และเลขท้าย 2 ตัว';
                $this->index($texts);
            } else {
                $texts = 'รางวัลเลขข้างเคียงรางวัลที่ 1';
                $this->index($texts);
            }
        } else {
            $subStr = substr($Lottery, 1);
            $data['subStr'] = $this->lottery_model->subStr($subStr);
            $typeStr = array();
            foreach ($data['subStr'] as $row) :
                $typeStr =  $row['type_id'];
            endforeach;
            if ($typeStr == 4) {
                $texts = 'รางวัลเลขท้าย 2 ตัว';
                $this->index($texts);
            } else {
                $texts = 'fail';
                $this->index($texts);
            }
        }
    }
    public function rand()
    {
        $datas = [];
        $count = 4;
        while (true) {
            $r = rand(100, 999);
            if (!isset($datas[$r])) {
                $datas[$r] = 0;
            }
            if (sizeof($datas) == $count) {
                break;
            }
        }
        $arrRand  = array_keys($datas);
        $getData['get_data']  = $this->lottery_model->getData();
        if ($getData['get_data'] == NULL) {
            // insert
            $arrData = array(
                array(
                    "lottery_id" => NULL,
                    "lottery_number" => $arrRand[0],
                    "type_id" =>  '1'
                ),
                array(
                    "lottery_id" => NULL,
                    "lottery_number" => $arrRand[1],
                    "type_id" =>  '2'
                ),
                array(
                    "lottery_id" => NULL,
                    "lottery_number" => $arrRand[2],
                    "type_id" =>  '2'
                ),
                array(
                    "lottery_id" => NULL,
                    "lottery_number" => $arrRand[3],
                    "type_id" =>  '2'
                ),
                array(
                    "lottery_id" => NULL,
                    "lottery_number" => $arrRand[0] - 1,
                    "type_id" =>  '3'
                ),
                array(
                    "lottery_id" => NULL,
                    "lottery_number" => $arrRand[0] + 1,
                    "type_id" =>  '3'
                ), array(
                    "lottery_id" => NULL,
                    "lottery_number" => rand(10, 99),
                    "type_id" =>  '4'
                )
            );
            $this->lottery_model->insertLottery($arrData);
            redirect($this->index());
        } else {
            // update
            $data['get_datas']  = $this->lottery_model->getData();
            $lotterys_id = array();
            foreach ($data['get_datas'] as  $value) {
                $lotterys_id[] = $value['lottery_id'];
            }
            $data['lotterys_id'] = $lotterys_id;
            $arrData = array(
                array(
                    "lottery_id" => $lotterys_id[0],
                    "lottery_number" => $arrRand[0]

                ),
                array(
                    "lottery_id" => $lotterys_id[1],
                    "lottery_number" => $arrRand[1]
                ),
                array(
                    "lottery_id" => $lotterys_id[2],
                    "lottery_number" => $arrRand[2]
                ),
                array(
                    "lottery_id" => $lotterys_id[3],
                    "lottery_number" => $arrRand[3]
                ),
                array(
                    "lottery_id" => $lotterys_id[4],
                    "lottery_number" => $arrRand[0] - 1
                ),
                array(
                    "lottery_id" => $lotterys_id[5],
                    "lottery_number" => $arrRand[0] + 1
                ), array(
                    "lottery_id" => $lotterys_id[6],
                    "lottery_number" => rand(10, 99)
                )
            );
            $this->lottery_model->updateLottery($arrData);
            redirect($this->index());
        }
    }
}
