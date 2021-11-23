<?php
require_once "./Model/DropsModel.php";
require_once "./View/DropsView.php";
require_once "./Helper/logHelper.php";
require_once "./Model/BrandModel.php";

class DropsController{

    private $dropsModel;
    private $brandModel;
    private $view;
    private $logHelper;

    //Constructor
    function __construct(){
        $this->dropsModel = new DropsModel();
        $this->brandModel = new BrandModel();
        $this->view = new DropsView();
        $this->logHelper = new logHelper();
    }
    //Ver Productos
    function showProducts(){
        $products = $this->dropsModel->getProducts();
        $marcas=$this->brandModel->getMarcas();    
        $this->view->showProducts($marcas, $products);
    }

    //Ver Productos por Filtro
    function showProductsFilter($id){
        $products = $this->dropsModel->getProductsFilter($id);
        $marcas=$this->brandModel->getMarcas();
        $this->view->showProducts($marcas, $products);
    }
    
    //Ver Producto Individual
    function dropProduct($id){
        $product = $this-> dropsModel-> getSneakers($id);
        $this->view->showProduct($product); 
    }

    //Controller de Productos

    function addProduct(){
        $this->logHelper->checkAdminLogIn();
        if(!isset($_POST['stock'])){
            $stock = 0;
        }else{
            $stock = 1;
        }
        $this->dropsModel->addProduct($_POST['Marca'], $_POST['Modelo'],$_POST['Precio'], $stock);
        $this->view->showHome();
    }

    function delProduct($id){
        $this->logHelper->checkAdminLogIn();
        $this->dropsModel->delProduct($id);
        $this->view->showHome();
    }

    function updateProduct($updAct, $id){
        $this->logHelper->checkAdminLogIn();
        if ($updAct=="addStock") {
            $updAct=1;
        }
        else{
            $updAct=0;
        }
        $this->dropsModel->updateProduct($updAct, $id);
        $this->view->showHome();

    }


}