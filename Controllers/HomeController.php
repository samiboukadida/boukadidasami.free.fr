<?php
/* 
 * Project: Nathan MVC
 * File: /Controllers/HomeController.php
 * Purpose: controller for the home of the app.
 * Author: Nathan Davison
 */
namespace MVC;
class HomeController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object:
        $this->model = new HomeModel($this['Database']);

    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }
    
}

?>
