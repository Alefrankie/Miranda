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
		#CHARGE JSON'S DATA TO VIEW
		$json = file_get_contents(RUTA_ORIGIN . '/public_html/json/all_news.json');
		return printf($json);
	}

	public function PostNews()
	{

		if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
			return $this->view('templates/usuarios/postNews');
		}
		$currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
		$image = base64_encode(file_get_contents($_FILES['news']['tmp_name']));
		$data = [
			'id_usuario' => $currentUser->id,
			'name_user' => $_SESSION['SESSION_USER'],
			'image_news' => $image,
			'description_image' => $_POST['description']
		];
		$this->noticiaModelo->uploadNews($data);

		$news = $this->noticiaModelo->getNewsImages();
		foreach ($news as $key => $value) {
			$photo = $this->noticiaModelo->getNewsImagesPerfil($value->name_user);
			$news[$key] = [
				"id_noticia" => $value->id_noticia,
				"name_user" => $value->name_user,
				"description_image" => $value->description_image,
				"image_news" => ($value->image_news),
				"photo_perfil" => ($photo->photo_perfil),
			];
		}
		#CHARGE DATA INTO JSON
		$file = RUTA_ORIGIN . '/public_html/json/all_news.json';
		$json_string = json_encode($news);
		file_put_contents($file, $json_string);

		return printf(json_encode($image));
	}


	public function deleteNews($id_noticia)
	{
		$this->noticiaModelo->deleteNews($id_noticia);
		return printf(json_encode("Noticia Eliminada"));
	}
}
