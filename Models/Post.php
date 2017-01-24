<?php
/**
 * Created by PhpStorm.
 * User: DELL-XPS
 * Date: 2017-01-21
 * Time: 17:00
 */
namespace MVC;



class Post extends BaseModel
{
// we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {

        $this->id      = $id;
        $this->author  = $author;
        $this->content = $content;
    }

    public static function all() {
        $list = [];
        $database = Database::getInstance();
        $req =$database->db->query('SELECT * FROM posts');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['author'], $post['content']);
        }

        return $list;
    }

    public static function find($id) {
        $database = Database::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $database->db->prepare('SELECT * FROM posts WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        $post;
        if(! $post){
            $error_request_uri_array=['controller'=>'error', 'action' => 'postNotFound'];
            $error_request_uri ='/error/postNotFound' ;
            $error_request_uri = http_build_query($error_request_uri_array);

            $redirect= $_SERVER['REQUEST_SCHEME'].'://'. $_SERVER['SERVER_NAME'].$error_request_uri;
            header('Location: ' . $redirect);
        }
        return new Post($post['id'], $post['author'], $post['content']);
    }
}