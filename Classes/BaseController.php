<?php
/* 
 * Project: Nathan MVC
 * File: /Classes/BaseController.php
 * Purpose: abstract class from which Controllers extend
 * Author: Nathan Davison
 */
namespace MVC;



use Pimple\Container;

abstract class BaseController extends Container {
    
    protected $urlValues;
    protected $action;
    protected $model;
    protected $view;
    
    public function __construct($action, $urlValues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
        //establish the view object
        $this->view = new View(get_class($this), $action);
        
        //Stocker Database dans le container
        $this['Database'] = function ($c) {
            return Database::getInstance();
        };

    }
        
    //executes the requested method
    public function executeAction() {
        return $this->{$this->action}();
    }
}

?>
