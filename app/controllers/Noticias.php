<?php

class Noticias extends AppController
{

	public function __construct()
	{
		session_start();
		$this->noticiaModelo = $this->model('NoticiaModel');
		$this->usuarioModelo = $this->model('UsuarioModel');
	}

	public function index()
	{
		if (empty($_SESSION['SESSION_USER'])) {
			return $this->view('templates/noticias');
		}
		$currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
		$data = [
			"t_user" => $currentUser->t_user
		];
		$this->view('templates/noticias', $data);
	}

	public function updateNews()
	{
		$news = $this->noticiaModelo->getNewsImages();

		foreach ($news as $key => $value) {
			$photo = $this->noticiaModelo->getNewsImagesPerfil($value->nameUser);
			$news[$key] = [
				"id_noticia" => $value->id_noticia,
				"user" => $value->nameUser,
				"description_image" => $value->description_image,
				"imagenNews" => base64_encode(stripslashes($value->imagenNews)),
				"photoPerfil" => base64_encode(stripslashes($photo->photoPerfil)),
			];
		}

		return printf(json_encode($news));
	}

	public function postNews()
	{
		$this->view('templates/usuarios/postNews');
	}

	public function uploadNews()
	{
		$currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
		$image = addslashes(file_get_contents($_FILES['news']['tmp_name']));
		$data = [
			'id_usuario' => $currentUser->id,
			'nameUser' => $_SESSION['SESSION_USER'],
			'imagenNews' => $image,
			'description_image' => $_POST['description']
		];
		$this->noticiaModelo->uploadNews($data);
		return printf(json_encode(base64_encode(stripslashes($data['imagenNews']))));
	}

	public function deleteNews($id_noticia)
	{
		$this->noticiaModelo->deleteNews($id_noticia);
		echo json_encode("Noticia Eliminada");
	}
}
