<?php

class DropsModel{
    private $db;

    //Constructor
    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_gordodrops;charset=utf8', 'root', '');
    }

    //Obtener Productos
    function getProducts(){
        $query = $this->db->prepare( "SELECT zapatillas.*, marcas.Nombre as marca from zapatillas join marcas on zapatillas.id_marca= marcas.id_marca");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
    //Obtener Productos por Filtro
    function getProductsFilter($filter){
        $query = $this->db->prepare( "SELECT zapatillas.*, marcas.Nombre as marca from zapatillas join marcas on zapatillas.id_marca= marcas.id_marca where zapatillas.id_marca=$filter");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    //Obtener Producto Individual
    function getSneakers($id){

        $query = $this->db->prepare( "SELECT zapatillas.*, marcas.Nombre as marca from zapatillas join marcas on zapatillas.id_marca= marcas.id_marca WHERE id_zapatilla=?");
        $query->execute(array($id));
        $zapatilla = $query->fetch(PDO::FETCH_OBJ);
        return $zapatilla;

    }

    function getNextSneakers($id){

        $query = $this->db->prepare( "SELECT zapatillas.*, marcas.Nombre as marca from zapatillas join marcas on zapatillas.id_marca= marcas.id_marca  WHERE id_zapatilla>? ORDER BY id_zapatilla asc LIMIT 1");
        $query->execute(array($id));
        $zapatilla = $query->fetch(PDO::FETCH_OBJ);
        return $zapatilla;

    }

    function getPrevSneakers($id){
                                        
        $query = $this->db->prepare( "SELECT zapatillas.*, marcas.Nombre as marca from zapatillas join marcas on zapatillas.id_marca= marcas.id_marca WHERE id_zapatilla<? ORDER BY id_zapatilla DESC LIMIT 1");
        $query->execute(array($id));
        $zapatilla = $query->fetch(PDO::FETCH_OBJ);
        return $zapatilla;

    }

    //Controlador de Productos

    function addProduct($marca,$modelo,$precio,$stock){
        $query = $this->db->prepare("INSERT INTO zapatillas(id_marca, Modelo, Precio, Stock) VALUES(?, ?, ?, ?)");
        $query->execute(array($marca,$modelo,$precio,$stock));

    }

    function delProduct($id){
        $query = $this->db->prepare("DELETE FROM zapatillas WHERE id_zapatilla=?");
        $query->execute(array($id));
    }

    function updateProduct($updAct, $id){
        $query = $this->db->prepare("UPDATE zapatillas SET Stock=? WHERE id_zapatilla=?");
        $query->execute(array($updAct, $id));

    }

    function addImage($img, $id){
        $pathImg = $this->uploadImage($img);
        $query = $this->db->prepare("UPDATE zapatillas SET imagen=? WHERE id_zapatilla=?");
        $query->execute(array($pathImg, $id));
    }

    private function uploadImage($img){
        $target = 'images/products/' . uniqid() . '.jpg';
        move_uploaded_file($img, $target);
        return $target;
    }

    


}