<?php

namespace Controllers;

use Core\Controller;
use Core\Model;
use Models\AddSeller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $data = $this->getAllSellers();

        $model = new Model();
        $model->set('title', 'Sellers');
        $model->set('subTitle', 'All Sellers');

        $model->render('sellers', $data);
    }

    public function infoAction()
    {
        $dataSeller = $this->getOneSeller();
        $dataOrders = $this->getOrdersSeller();

        $model = new Model();
        $model->set('title', 'Info');
        $model->set('subTitle', 'Info about seller');

        $model->render('sellerInfo', ['sellerInfo' => $dataSeller, 'ordersInfo' => $dataOrders]);
    }

    public function addAction()
    {

        $model = new AddSeller();

        if (isset($_POST['seller-add'])) {
            $data = $model->checkPostData();

            if (!$data) {
                $model->set('error', 'Fields entered incorrectly');
            } else {
                $this->addNewSeller($data);
            }
        }

        $model->set('title', 'Add');
        $model->set('subTitle', 'Add seller');

        $model->render('addSeller');
    }

    public function deleteAction()
    {
        if (isset($_POST['id'])) {
            $sql = "DELETE FROM `sellers` WHERE `snum` = :id";
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

            $result = $this->db->query($sql, [':id' => $id]);

            if ($result !== false) {
                echo json_encode(['status' => 'ok', 'code' => 200, 'message' => 'Item was successfully removed']);
            } else {
                echo json_encode(['status' => 'error', 'code' => 505, 'message' => 'Operation not allowed. Item related with orders']);
            }

            exit;
        }
    }

    public function addNewSeller($data)
    {
        $sqlAdd = "INSERT INTO `sellers` (`snum`, `sname`, `city`, `commision`)
        VALUES (null, :name, :city, :commision)";

        return $this->db->query($sqlAdd, [':name' => $data['name'], ':city' => $data['city'], ':commision' => $data['commision']]);
    }

    public function checkId($id = null)
    {
        if (isset($_GET['id'])) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        }

        return $id;
    }

    public function getAllSellers()
    {
        $sql = "SELECT * FROM `sellers`;";

        return $this->db->query($sql);
    }

    public function getOneSeller()
    {
        if (gettype((int)$this->checkId()) === 'integer') {
            $sqlSeller = "SELECT * FROM `sellers` WHERE `snum` = ?";

            return $this->db->query($sqlSeller, array($this->checkId()));
        }
    }

    public function getOrdersSeller()
    {
        if (gettype((int)$this->checkId()) === 'integer') {
            $sqlOrders =
                "SELECT orders.`odate`, round(sum(orders.`amt`),2) AS `sum`, round(sum(orders.`amt`*sellers.`commision`), 2) AS `total` 
                FROM `orders` JOIN sellers ON orders.`snum` = sellers.`snum`
                WHERE orders.`snum` = ? 
                GROUP BY orders.`odate` ORDER BY orders.`odate`;";

            return $this->db->query($sqlOrders, array($this->checkId()));
        }
    }
}
