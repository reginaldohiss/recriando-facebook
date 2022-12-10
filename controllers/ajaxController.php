<?php
class ajaxController extends controller {

    public function __construct() {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }

    public function index() {}

    public function add_friend() {

        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);

            $r = new Relacionamentos();
            $r->addFriend($_SESSION['lgsocial'], $id);
        }

    }

    public function aceitar_friend() {

        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);

            $r = new Relacionamentos();
            $r->aceitarFriend($_SESSION['lgsocial'], $id);
        }

    }

    public function curtir() {

        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);
            $id_usuario = $_SESSION['lgsocial'];    

            $p = new Posts();
            if($p->isLiked($id, $id_usuario)) {
                $p->removeLike($id, $id_usuario);
            } else {
                $p->addLike($id, $id_usuario);
            }
        }

    }

    public function comentar() {
        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);
            $id_usuario = $_SESSION['lgsocial'];
            $txt = addslashes($_POST['txt']);
            $p = new Posts();

            if(!empty($txt)) {
                $p->addComentario($id, $id_usuario, $txt);
            }
        }
    }

}