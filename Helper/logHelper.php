<?php

class logHelper{

    function __construct(){
    }

    function checkLogIn(){
        session_start();
        if(!isset($_SESSION["logged"])){
            header("Location: ".BASE_URL."loginPage");
            return false;
        }
        else{
            return true;}
    }

    function checkAdminLogIn(){
        session_start();
        if(!isset($_SESSION["logged"])|| $_SESSION["admin"]==false){
            session_destroy();
            header("Location: ".BASE_URL."loginPage");
            return false;
        }
        else{
            return true;}
    }

}
