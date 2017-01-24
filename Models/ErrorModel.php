<?php
/* 
 * Project: Nathan MVC
 * File: /Models/ErrorController.php
 * Purpose: model for the error controller.
 * Author: Nathan Davison
 */
namespace MVC;
class ErrorModel extends BaseModel
{    
    //data passed to the bad URL error view
    public function badURL()
    {
        $this->viewModel->set("pageTitle","error - Bad URL");
        return $this->viewModel;
    }

    public function badPostID()
    {
        $this->viewModel->set("pageTitle","error - Bad Post ID");
        return $this->viewModel;
    }

    public function postNotFound()
    {
        $this->viewModel->set("pageTitle","error - Post Not Found");
        return $this->viewModel;
    }
}

?>
