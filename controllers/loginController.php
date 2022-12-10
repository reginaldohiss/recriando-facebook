<?php
class loginController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();
        
        $this->loadView('login', $dados);
    }

    public function entrar() {
    	$dados = array('erro'=>'');

    	if(isset($_POST['email']) && !empty($_POST['email'])) {
    		$email = addslashes($_POST['email']);
    		$senha = md5($_POST['senha']);

    		$u = new Usuarios();
    		$dados['erro'] = $u->logar($email, $senha);
    	}

    	$this->loadView('login_entrar', $dados);
    }

    public function cadastrar() {
    	$dados = array();

    	if(isset($_POST['email']) && !empty($_POST['email'])) {
    		$nome = addslashes($_POST['nome']);
    		$email = addslashes($_POST['email']);
    		$senha = addslashes($_POST['senha']);
    		$sexo = addslashes($_POST['sexo']);

    		$u = new Usuarios();
    		$dados['erro'] = $u->cadastrar($nome, $email, $senha, $sexo);
    	}

    	$this->loadView('login_cadastrar', $dados);
    }

    public function sair() {
    	unset($_SESSION['lgsocial']);
    	header("Location: ".BASE);
    }

}