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
			$this->view('templates/noticias');
		} else {
			$currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
			$datos = [
				"t_user" => $currentUser->t_user
			];
			$this->view('templates/noticias', $datos);
		}
	}

	public function updateNews()
	{
		$news = $this->noticiaModelo->getNewsImages();
		$file = RUTA_ORIGIN . '/public_html/json/imagesNews.json';

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
		$datos = [
			'id_usuario' => $currentUser->id,
			'nameUser' => $_SESSION['SESSION_USER'],
			'imagenNews' => $image,
			'description_image' => $_POST['description']
		];
		$this->noticiaModelo->uploadNews($datos);
		$photoDecode = base64_encode(stripslashes($datos['imagenNews']));
		echo json_encode($photoDecode);
	}

	public function deleteNews($id_noticia)
	{
		$this->noticiaModelo->deleteNews($id_noticia);
		echo json_encode("Noticia Eliminada");
	}

	public function test()
	{
		$photo = $this->noticiaModelo->getNewsImagesPerfil("Alefrank");
		print_r($photo->photoPerfil);
	}
}
