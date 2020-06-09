<?php

class Noticias extends AppController
{

	public function __construct()
	{
		session_start();
		$this->noticiaModelo = $this->model('Noticia');
		$this->usuarioModelo = $this->model('Usuario');
	}

	public function index()
	{
		$this->view('templates/noticias');
	}

	public function updateNews()
	{
		$news = $this->noticiaModelo->getNewsImages();
		$file = RUTA_ORIGIN . '/public_html/json/imagesNews.json';
		foreach ($news as $key => $value) {
			$data[$key] = [
				"user" => $value->user,
				"description_image" => $value->description_image,
				"imagen" => base64_encode(stripslashes(($value->imagen)))
			];
		}
		$json_string = json_encode($data);
		file_put_contents($file, $json_string);
		echo json_encode($data);
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
			'user' => $_SESSION['SESSION_USER'],
			'imagen' => $image,
			'description_image' => $_POST['description']
		];
		$this->noticiaModelo->uploadNews($datos);
		$photoDecode = base64_encode(stripslashes($datos['imagen']));
		echo json_encode($photoDecode);
	}

	public function test()
	{
		$news = ("hola");
		echo ($news);
	}
}
