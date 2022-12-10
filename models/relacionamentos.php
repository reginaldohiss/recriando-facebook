<?php
class Relacionamentos extends model {

	public function addFriend($id1, $id2) {

		$sql = "INSERT INTO relacionamentos SET usuario_de = '$id1', usuario_para = '$id2', status = '0'";
		$this->db->query($sql);

	}

	public function aceitarFriend($id1, $id2) {

		$sql = "UPDATE relacionamentos SET status = '1' WHERE usuario_de = '$id2' AND usuario_para = '$id1'";
		$this->db->query($sql);		

	}

	public function getRequisicoes() {
		$array = array();

		$sql = "
		SELECT
			usuarios.id,
			usuarios.nome
		FROM relacionamentos
		LEFT JOIN usuarios
		ON usuarios.id = relacionamentos.usuario_de
		WHERE
			relacionamentos.usuario_para = '".($_SESSION['lgsocial'])."' AND
			relacionamentos.status = '0'
		";

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getTotalAmigos($id) {

		$sql = "SELECT COUNT(*) as c FROM relacionamentos WHERE (usuario_de = '$id' OR usuario_para = '$id') AND status = '1'";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();
		
		return $sql['c'];
	}

	public function getIdsFriends($id) {
		$array = array();

		$sql = "SELECT * FROM relacionamentos WHERE (usuario_de = '$id' OR usuario_para = '$id') AND status = '1'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			foreach($sql->fetchAll() as $ritem) {
				$array[] = $ritem['usuario_de'];
				$array[] = $ritem['usuario_para'];
			}
		}

		return $array;
	}

}