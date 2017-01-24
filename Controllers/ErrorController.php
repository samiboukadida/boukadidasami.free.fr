<?php
/* 
 * Project: Nathan MVC
 * File: /Controllers/ErrorController.php
 * Purpose: controller for the URL access errors of the app.
 * Author: Nathan Davison
 */
namespace MVC;
class ErrorController extends BaseController
{    
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        //require("Models/ErrorModel.php");
        $this->model = new ErrorModel($this['Database']);
    }
    
    //bad URL request error
    protected function badURL()
    {
        $this->view->output($this->model->badURL());
    }
    protected function badPostID(){

        $this->view->output($this->model->badPostID());
    }
    protected function postNotFound(){

        $this->view->output($this->model->postNotFound());
    }
}

?>
