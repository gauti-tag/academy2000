<?php


class MY_model extends CI_Model
{


	function query($sqlLanguage, $data = array()) {

		$query = $this->db->query($sqlLanguage, $data)->result();

		   return $query;
	}


	function queryFirst($sqlLanguage, $data = array()) {

		$query = $this->db->query($sqlLanguage, $data)->result();
		return current($query);

	}


	function queryCount($sqlLanguage, $data = array()) {
		$query = $this->db->query($sqlLanguage, $data)->num_rows();
		return $query;
		$query->free_result();
	}

	/**
	 * @param array $options_echappees
	 * @param array $options_non_echappees
	 * @return false|int id of the entry
	 * method to create new row to database table
	 * Insertion d'une nouvelle ligne dans la base de donnée
	 */
	public function create($options_echappees = array(), $options_non_echappees = array())
	{
		/**
		 *  Checking the right data to insert to database
		 *  Vérification des donnée à insérer
		 */
			if(empty($options_echappees) AND empty($options_non_echappees))
			{
				return false;
			}
		$this->db->set($options_echappees)
			->set($options_non_echappees, null, false)
			->insert($this->ma_table);
		return $this->db->insert_id();
	}


	/**
	 * @param string $select
	 * @param array $where
	 * @return mixed
	 * Fetch all data from the table in the database
	 * Récupère toutes les donnée de la table dans le base de donnée
	 */

	public function read($select = '*', $where = array())
	{
		return  $this->db->select($select)
			->from($this->ma_table)
			->where($where)
			->get()
			->result();
	}

	/**
	 * @param string $select
	 * @param array $where
	 * @return mixed (array) (tableau)
	 */
	public function readArray($select = '*', $where = array())
	{
		return  $this->db->select($select)
			->from($this->ma_table)
			->where($where)
			->get()
			->result_array();
	}

	/**
	 * @param string $select
	 * @param array $where
	 * @return mixed
	 */

	public function readObject($select = '*', $where = array())
	{
		return  $this->db->select($select)
			->from($this->ma_table)
			->where($where)
			->get()
			->result_object();
	}

	/**
	 * @param string $select
	 * @param array $where
	 * @return mixed
	 */
	public function readWhere($select = '*', $where = array())
	{
		return  $this->db->select($select)
			->from($this->ma_table)
			->where($where)
			->get()
			->result();
	}


	//SELECT * FROM tvlive WHERE id_tv = (SELECT MAX(id_tv) FROM tvlive)

	/**
	 * @param $dataBaseTarget
	 * @return mixed
	 * get the current information
	 */
	function CurrentInfo($dataBaseTarget)
	{
		return $this->db->query('SELECT * FROM'.$this->ma_table.'WHERE'.$dataBaseTarget.'= (SELECT MAX('.$dataBaseTarget.') FROM'.$this->ma_table);

	}

	// Récupère des données dans la base de données.

	/**
	 * @param string $select
	 * @param array $where
	 * @param array $orwhere
	 * @return mixed
	 * Fetch data from database according to two (criteria)
	 */
	public function readOr($select = '*', $where = array(), $orwhere = array())
	{

		return  $this->db->select($select)
			->from($this->ma_table)
			->where($where)
			->or_where($orwhere)
			->get()
			->result();
	}

	// Récupère des données dans la base de données.
	//public function readJoin($select = '*', $table = array(), $where = array())
	/**
	 * @param $select
	 * @param $join
	 * @param array $where
	 * @return mixed
	 */
	public function readJoin($select, $join, $where = array())
	{

		return  $this->db->select($select)
			->from($this->ma_table)
			->join($join['table'], $join['condition'], $join['type'])
			->where($where)
			->get()
			->result();
	}

	/**
	 * @param $where
	 * @param array $options_echappees
	 * @param array $options_non_echappees
	 * @return bool
	 */
	//Modifie une ou plusieurs lignes dans la base de données.
	public function update($where, $options_echappees = array(), $options_non_echappees = array())
	{
		// Vérification des données à mettre à jour
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}

		return (bool) $this->db->set($options_echappees)
			->set($options_non_echappees,null,false)
			->where($where)
			->update($this->ma_table);
	}

	/**
	 * @param $where
	 * @return bool
	 */
	//Supprime une ou plusieurs l ignes de la base de données.
	public function delete($where)
	{
		return (bool) $this->db->where($where)
			->delete($this->ma_table);
	}

	// Retourne le nombre de résultats.

	/**
	 * @param array $champ
	 * @param null $valeur
	 * @return int
	 */
	public function compter($champ = array(),$valeur = null)
		// Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
	{
		return (int) $this->db->where($champ, $valeur)
			->from($this->ma_table)
			->count_all_results();
	}

	/**
	 * @param null $distinct
	 * @return mixed
	 */
	public function compter_distinct($distinct = null)
	{
		return $this->db->select('count(distinct '.$distinct.') as nb')
			->from($this->ma_table)
			->get()
			->result();
	}

	/**
	 * @param string $select
	 * @param array $where
	 * @param int $limit
	 * @return mixed
	 */
	public function readLimit($select ='*', $where = array(), $limit = 1)
	{
		return $this->db->select($select)
			->from($this->ma_table)
			->where($where)
			->order_by($this->orderBy,$this->direction)
			->limit($limit)
			->get()
			->result();
	}


	/**
	 * @param string $select
	 * @param $join
	 * @param array $where
	 * @param int $limit
	 * @return mixed
	 */
	public function readLimitJoin($select ='*', $join, $where = array(), $limit = 1)
	{
		return $this->db->select($select)
			->from($this->ma_table)
			->join($join['table'], $join['condition'], $join['type'])
			->where($where)
			->order_by($this->orderBy,$this->direction)
			->limit($limit)
			->get()
			->result();
	}

	/**
	 * @param string $select
	 * @param array $where
	 * @return mixed
	 */
	public function readOrder($select='*', $where = array())
	{
		return $this->db->select($select)
			->from($this->ma_table)
			->where($where)
			->order_by($this->orderBy,$this->direction)
			->get()
			->result();
	}

	/**
	 * @param $username
	 * @param $password
	 * meaning for the query = SELECT * FROM user WHERE username='$username' AND password = '$password'
	 */
	public function can_login($username,$password)
	{
		/**
		 * we set queries to database
		 */
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get($this->ma_table);
		/**
		 * (condition) if there is a result
		 */
		if($query->num_rows() > 0)
		{
			return true;

		}else{

			return false;
		}

	}

	public function is_email_available($email)
	{
		$this->db->where('username',$email);

		$query = $this->db->get($this->ma_table);

		if ($query->num_rows() > 0)
		{
			return true;

		}else{

			return false;

		}
	}


	/**
	 * @param $data
	 * @return array|array[]
	 * function to check from the database the session of the user if it's working or not
	 */
	public function checkUser($data)
	{
		return $this->db->get_where($this->ma_table, $data)->result_array();
	}

	/**
	 * @param $variable_key
	 * @param $database_key
	 * @return array|array[] function to check information from database via Id if the information exist or not
	 */
	public function checkDataByKey($variable_key,$database_key)
	{
		return $this->db->get_where($this->ma_table,array($database_key=>$variable_key))->result_array();

	}

	/**
	 * @param $query
	 * @param $idChampBase
	 * @param $champBase1
	 * @param $champBase2
	 * @return CI_DB_result function to search data from dataBase
	 */
	public function searchQueryData($query,$idChampBase,$champBase1,$champBase2)
	{
		$this->db->select('*');
		$this->db->from($this->ma_table);

		if($query != '')
		{
			$this->db->like($champBase1,$query);
			$this->db->or_like($champBase2,$query);
		}

		$this->db->order_by($idChampBase);

		return $this->db->get();

	}


	/**
	 * @param $idVariable
	 * @param $idDataBase
	 * @param $imageDataBase
	 * @return array|array[]
	 */
	public function getImageById($imageDataBase,$where = array())
	{
		return  $this->db->select($imageDataBase)
			->from($this->ma_table)
			->where($where)
			->get()
			->result_array();


	}


	/**
	 * @param $element
	 * @param array $where
	 * @return array|array[]
	 */
	public function getElementById($element,$where = array())
	{

		return  $this->db->select($element)
			->from($this->ma_table)
			->where($where)
			->get()
			->result_array();

	}


	public function activateTheLink($where,$status)
	{
		$this->db->where($where);
		return $this->db->update($this->ma_table,$status);

	}


}
