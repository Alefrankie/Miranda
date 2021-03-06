<?php
//Clase para conectarse a la base de data y ejecutar consultas
class Db
{
	private $host = DB_HOST;
	private $usuario = DB_USUARIO;
	private $password = DB_PASSWORD;
	private $nombre_base = DB_NOMBRE;

	private $dbh; //DataBaseHangler
	private $stmt;
	private $error;

	public function __construct()
	{
		//CONFIGURAR CONEXIÓN

		$dsn = 'pgsql:host=' . $this->host . ';port=5432' .   ';dbname=' . $this->nombre_base;
		$opciones = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		// Crear una instancia PDO
		try {
			$this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
			// $this->dbh->exec('set names utf8');
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
			echo $this->error;
		}
	}
	//Preparamos la consulta
	public function query($sql)
	{
		$this->stmt = $this->dbh->prepare($sql);
	}
	//Vincula la consulta con la Bind
	public function bind($parametro, $valor, $tipo = null)
	{
		if (is_null($tipo)) {
			switch (true) {
				case is_int($valor):
					$tipo = PDO::PARAM_INT;
					break;

				case is_bool($valor):
					$tipo = PDO::PARAM_BOOL;
					break;

				case is_null($valor):
					$tipo = PDO::PARAM_NULL;
					break;

				// case is_file($valor):
				// 	$tipo = PDO::FETCH_ASSOC;
				// 	break;

				default:
					$tipo = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($parametro, $valor, $tipo);
	}
	//Ejecuta la consulta
	public function execute()
	{
		return $this->stmt->execute();
	}

	//Obtener los registros
	public function registros()
	{
		$this->execute();
		return $this->stmt->fetchALL(PDO::FETCH_OBJ);
	}

	//Obtener un solo registro
	public function registro()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	public function imagen()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	//Obtener cantidad de filas con el metodo rowCount
	public function rowCount()
	{
		$this->execute();
		return $this->stmt->rowCount();
	}
}
