<?php
/* 
 * Project: Nathan MVC
 * File: /Classes/BaseModel.php
 * Purpose: abstract class from which Models extend.
 * Author: Nathan Davison
 */
namespace MVC;


class BaseModel{
    
    protected $viewModel;
    protected $db;

    //create the base and utility objects available to all Models on model creation
    public function __construct(Database $db)
    {
        $this->db = $db;

        $this->viewModel = new ViewModel();
	$this->commonViewData();
    }

    //establish viewModel data that is required for all views in this method (i.e. the main template)
    protected function commonViewData() {
	
    //e.g. $this->viewModel->set("mainMenu",array("home" => "/home", "Help" => "/help"));
    }
}

?>
