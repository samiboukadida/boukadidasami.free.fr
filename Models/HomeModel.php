<?php
/* 
 * Project: Nathan MVC
 * File: /Models/HomeController.php
 * Purpose: model for the home controller.
 * Author: Nathan Davison
 */
namespace MVC;
class HomeModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
        $this->viewModel->set("pageTitle","Nathan MVC");
        return $this->viewModel;
    }



}

?>
