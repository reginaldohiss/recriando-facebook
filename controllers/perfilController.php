<?php
class perfilController extends controller {

    public function __construct() {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }

    public function index() {
        $dados = array(
        	'usuario_nome' => ''
        );
        $u = new Usuarios();

        if(isset($_POST['nome']) && !empty($_POST['nome'])) {

            $nome = addslashes($_POST['nome']);
            $bio = addslashes($_POST['bio']);

            $u->updatePerfil(array(
                'nome' => $nome,
                'bio' => $bio
            ));

            if(isset($_POST['senha']) && !empty($_POST['senha'])) {
                $senha = md5($_POST['senha']);

                $u->updatePerfil(array(
                    'senha' => $senha
                ));
            }

        }

        $dados['usuario_nome'] = $u->getNome($_SESSION['lgsocial']);
        
        $dados['info'] = $u->getDados($_SESSION['lgsocial']);

        $this->loadTemplate('perfil', $dados);
    }

}