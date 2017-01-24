<?php
/**
 * Created by PhpStorm.
 * User: DELL-XPS
 * Date: 2017-01-23
 * Time: 19:13
 */

namespace MVC;


class BlogController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object:
        $this->model = new BlogModel($this['Database']);

    }
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }

    protected function allPosts()
    {
        $this->view->output($this->model->allPosts());
    }

    protected function showPost()
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {

            $error_request_uri_array=['controller'=>'error', 'action' => 'badPostId'];
            $error_request_uri ='/error/badPostId' ;
            $error_request_uri = http_build_query($error_request_uri_array);                       
            
            $redirect= $_SERVER['REQUEST_SCHEME'].'://'. $_SERVER['SERVER_NAME'].$error_request_uri;
            header('Location: ' . $redirect);           

        }
        
        $this->view->output($this->model->showPost($_GET['id']));
    }

}