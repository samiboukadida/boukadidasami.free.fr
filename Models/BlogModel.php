<?php
/**
 * Created by PhpStorm.
 * User: DELL-XPS
 * Date: 2017-01-23
 * Time: 19:17
 */

namespace MVC;


class BlogModel extends BaseModel
{


    public function index()
    {
        $this->viewModel->set("pageTitle","Blog: Accueil");
        return $this->viewModel;
    }

    public function allPosts()
    {
        $this->viewModel->set("pageTitle","All Posts");
        // we store all the posts in a variable

        $this->viewModel->set('posts',post::all() );
        return $this->viewModel;

    }
    public function showPost($id)
    {
        $this->viewModel->set("pageTitle","Post : $id");
        // we store all the posts in a variable

        $this->viewModel->set('post',post::find($id) );
        return $this->viewModel;
    }



}