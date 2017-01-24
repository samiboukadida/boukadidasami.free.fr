<?php
/* 
 * Project: Nathan MVC
 * File: /Classes/Loader.php
 * Purpose: class which maps URL requests to controller object creation
 * Author: Nathan Davison
 */
namespace MVC;




class Loader {
    
    private $controllerName;
    private $controllerClass;
    private $action;
    private $urlValues;
    
    //store the URL request values on object creation
    public function __construct() {
        //$this->urlValues = $_GET;
        //Si RewriteEngine off => cette ligne: ftpperso.free.fr
        parse_str($_SERVER['QUERY_STRING'] , $this->urlValues);

        if ( !array_key_exists('controller', $this->urlValues )  ) {
            $this->controllerName = "home";
            $this->controllerClass = "HomeController";
        } else {
            $this->controllerName = strtolower($this->urlValues['controller']);
            $this->controllerClass = ucfirst(strtolower($this->urlValues['controller'])) . "Controller";
        }
        
        if ( !array_key_exists('action', $this->urlValues )  ) {
            $this->action = "index";
        } else {
            $this->action = $this->urlValues['action'];
        }
    }
                  
    //factory method which establishes the requested controller as an object
    public function createController() {

        //check our requested controller's class file exists and require it if so
        if (file_exists(__DIR__.'/../Controllers/' . $this->controllerClass . ".php")) {
        //if (file_exists("Controllers/" . $this->controllerClass . ".php")) {
            //require("Controllers/" . $this->controllerClass . ".php");
            //TODO exception

        } else {
            //require("Controllers/ErrorController.php");
            return new ErrorController("badurl",$this->urlValues);
        }

        //does the class exist?
        $class_namespace = __NAMESPACE__ . '\\'.$this->controllerClass;
        if (class_exists($class_namespace)) {
            $parents = class_parents($class_namespace);
            //does the class inherit from the BaseController class?
            if (in_array(__NAMESPACE__ . '\\'."BaseController",$parents)) {
                //does the requested class contain the requested action as a method?
                if (method_exists($class_namespace,$this->action))
                {

                    return new $class_namespace($this->action,$this->urlValues);
                    /*//Avec Pimple DI
                    $container = new Container();
                    $container[$class_namespace] = function ($c) {
                        $db = DB::getInstance();
                        return new $class_namespace($db);
                    };
                    return $container[$class_namespace];*/

                } else {

                    //bad action/method error
                    //require("Controllers/ErrorController.php");
                    return new ErrorController("badurl",$this->urlValues);
                }
            } else {
                //bad controller error
                //require("Controllers/ErrorController.php");
                return new ErrorController("badurl",$this->urlValues);
            }
        } else {
            //bad controller error
            //require("Controllers/ErrorController.php");
            return new ErrorController("badurl",$this->urlValues);
        }
    }
}

?>
