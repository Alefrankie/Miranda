<?php

class Noticias
{
	//TRAITS
	use ChargeModel;
	use ChargeView;

	//Variables
	private $tableUsers = 'usuarios';
	private $tableNews = 'imagesnews';

	public function __construct()
	{
		session_start();
		$this->userModel= $this->chargeModel('UsuarioModel');
		$this->newsModel = $this->chargeModel('NoticiaModel');
	}

	public function index()
	{
		if (empty($_SESSION['SESSION_USER'])) {
			return $this->chargeView('templates/noticias');
		}

		$search = new Querys($this->tableUsers, 'name_user', $_SESSION['SESSION_USER']);
		$Result = $search->typeQuery('SEARCH');

		$this->chargeView('templates/noticias', $Result);
	}

	public function updateNews()
	{
		$search = new Querys($this->tableNews);
		$search->table;
		$news = $search->typeQuery('SEARCH_ALL');

		foreach ($news as $key => $value) {
			$search = new Querys($this->tableUsers, 'name_user', $value->name_user);
			$news[$key] = [
				'id_noticia' => $value->id_noticia,
				'name_user' => $value->name_user,
				'description_image' => $value->description_image,
				'image_news' => ($value->image_news),
				'photo_perfil' => ($search->typeQuery('SEARCH')->photo_perfil),
			];
		}

		#CHARGE DATA INTO JSON
		$file = RUTA_ORIGIN . '/public_html/json/all_news.json';
		$json_string = json_encode($news);
		file_put_contents($file, $json_string);

		#CHARGE JSON'S DATA TO VIEW
		$json = file_get_contents(RUTA_ORIGIN . '/public_html/json/all_news.json');
		printf($json);
	}

	public function PostNews()
	{
		if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
			return $this->chargeView('templates/usuarios/postNews');
		}

		$image = base64_encode(file_get_contents($_FILES['news']['tmp_name']));

		$search = new Querys($this->tableUsers, 'name_user', $_SESSION['SESSION_USER']);
		$Result = $search->typeQuery('SEARCH');

		$data = [
			'id_usuario' => $Result->id,
			'name_user' => $Result->name_user,
			'image_news' => $image,
			'description_image' => $_POST['description']
		];

		$this->newsModel->uploadNews($data);
		return printf(json_encode($image));
	}

	public function deleteNews($id_news)
	{
		$Querys = new Querys($this->tableNews, 'id_noticia', $id_news);
		$Result = $Querys->typeQuery('DELETE');

		return printf(json_encode($Result));
	}
}
