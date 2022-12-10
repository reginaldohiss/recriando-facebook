<?php
class Usuarios extends model {

	public function verificarLogin() {

		if(!isset($_SESSION['lgsocial']) || (isset($_SESSION['lgsocial']) && empty($_SESSION['lgsocial']))) {
			header("Location: ".BASE."login");
			exit;
		}

	}

	public function logar($email, $senha) {

		$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();

			$_SESSION['lgsocial'] = $sql['id'];

			header("Location: ".BASE);
			exit;
		} else {
			return "E-mail e/ou senha errados!";
		}

	}

	public function cadastrar($nome, $email, $senha, $sexo) {

		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() == 0) {

			$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = MD5('$senha'), sexo = '$sexo'";
			$sql = $this->db->query($sql);

			$id = $this->db->lastInsertId();
			$_SESSION['lgsocial'] = $id;

			header("Location: ".BASE);

		} else {
			return "E-mail já está cadastrado!";
		}

	}

	public function getNome($id) {
		$sql = "SELECT nome FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();

			return $sql['nome'];
		} else {
			return '';
		}
	}

	public function getDados($id) {
		$array = array();

		$sql = "SELECT * FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function updatePerfil($array = array()) {

		if(count($array) > 0) {

			$sql = "UPDATE usuarios SET ";

			$campos = array();
			foreach($array as $campo => $valor) {
				$campos[] = $campo." = '".$valor."'";
			}

			$sql .= implode(', ', $campos);

			$sql .= " WHERE id = '".($_SESSION['lgsocial'])."'";

			$this->db->query($sql);
			
		}

	}

	public function getSugestoes($limit = 5) {
		$array = array();
		$meuid = $_SESSION['lgsocial'];

		$r = new Relacionamentos();
		$ids = $r->getIdsFriends($meuid);

		if(count($ids) == 0) {
			$ids[] = $meuid;
		}

		$sql = "
		SELECT 
			usuarios.id,
			usuarios.nome
		FROM
			usuarios 
		WHERE 
			usuarios.id != '$meuid' AND
			usuarios.id NOT IN (".implode(',', $ids).")
		ORDER BY RAND()
		LIMIT $limit
		";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}


		return $array;
	}

	public function procurar($q) {
		$array = array();

		$q = addslashes($q);

		$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$q%'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}










}