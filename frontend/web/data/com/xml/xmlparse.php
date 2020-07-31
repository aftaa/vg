<?php
class Xmlparse
{
	const TYPE_FILE = 'file';
	const TYPE_URL = 'url';

	const STATUS_INIT = 'init';
	const STATUS_WAITING = 'waiting';
	const STATUS_PROGRESS = 'at_progress';
	const STATUS_FINISHED = 'finished';
	const STATUS_ERROR = 'error';
	
	public $file = 'http://www.salon8marta.ru/files/xml/market.xml';
	private $categories = [];
	private $tree = [];
	public $info = [
		'cat_count' => 0,
		'offer_count' => 0,
 	];

	public $type, $user_id, $operation_error;

	private $parser_table = 'parsing';
	private $save_dir = 'data/com/xml/';

	function __construct(){
		$this->type =  self::TYPE_URL;
	}

   	public function get_data($url){
  		$ch = curl_init();
  		$timeout = 5;
  		 //$userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13';


		$header[] = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
	    $header[] = "Accept-Encoding:gzip, deflate";
	    $header[] = "Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4";
	    $header[] = "Cache-Control: max-age=0";
	    $header[] = "Connection: keep-alive";
	    $header[] = "Cookie:TCPC=708e8b243f51fe8ea55ce72652409827";
	    $header[] = "Host:www.imk-174.ru";
	    $header[] = "Upgrade-Insecure-Requests:1";
	    //$header[] = "Keep-Alive: 300";
	    $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	    //$header[] = "Pragma: "; // BROWSERS USUALLY LEAVE THIS BLANK
	    $userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36" ;
	    $header[] = "User-Agent:".$userAgent; // BROWSERS USUALLY LEAVE THIS BLANK

	    // SET THE CURL OPTIONS - SEE http://php.net/manual/en/function.curl-setopt.php
    	curl_setopt( $ch, CURLOPT_URL,            $url  );
    	curl_setopt( $ch, CURLOPT_USERAGENT,      $userAgent  );
    	curl_setopt($ch, CURLOPT_COOKIE, 'TCPC=5952f85a20bf3876e7ab08ef4a93bbe5');
		//curl_setopt($ch, CURLOPT_HEADER  , true);  // we want headers

		//curl_setopt($ch, CURLOPT_HEADER, true);
    	//curl_setopt( $ch, CURLOPT_HTTPHEADER,     $header  );
    	//curl_setopt( $ch, CURLOPT_REFERER,        'http://www.google.com'  );
    	//curl_setopt( $ch, CURLOPT_ENCODING,       'gzip,deflate'  );
    	//curl_setopt( $ch, CURLOPT_AUTOREFERER,    TRUE  );
    	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE  );
    	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE  );
    	curl_setopt( $ch, CURLOPT_TIMEOUT,        $timeout  );

  		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  		var_dump($httpcode);
  		echo($url);
  		//var_dump($data);
  		if( $data === false ){ 
    		$this->operation_error =  'Ошибка при получение через урл адрес: ' . curl_error($ch); 
    		return false;
  		}
		curl_close($ch);
 		return $data;
	}

	public function is_xml_parsed(){
		if( $this->type == self::TYPE_URL ){
			$xml_string = $this->get_data($this->file);
			//var_dump($xml_string);
		}else{
			$xml_string = file_get_contents($this->file);
			if($xml_string === false ){
			    $this->operation_error =  "Ошибка при чтение файла\n";
			}
		}

		if( $xml_string === false ){
			return false;
		}

		libxml_use_internal_errors(true);
		$xml = simplexml_load_string($xml_string);
		if ($xml === false) {
		    $this->operation_error =  "Ошибка при парсинга xml файла\n";
		    return false;
		}

		return true;
	}

	public function parsing(){
		$xml_string = $this->get_data($this->file);

		if( !$xml_string ){
			return false;
		}

		$xml = simplexml_load_string($xml_string);
		//print_r(libxml_get_errors());
		foreach ($xml[0]->shop->categories->children() as $category) {
			$this->categories[ (int) $category['id']] = [
				'label' => (string) $category,
				'parentid' => (int) $category['parentId'],
				'id' => (string) $category['id'],
				'offers_cnt' => 0,
			];
			$this->info['cat_count'] += 1;
		}
		foreach ($xml[0]->shop->offers->children() as $offer) {
			$of_cats =  (array) $offer->categoryId;
			//print_r($of_cats);
			//exit();
			$cats_count = count($of_cats);
			foreach ($of_cats as $key => $cat_id) {
				$this->set_count($cat_id, $cats_count );
			}
			//$cat_id = (int)$offer->categoryId;
			$this->info['offer_count'] += 1;
		}
		//print_r($this->categories);
		$this->getTree();
		return true;
	}

	private function set_count($cat_id, $cats_count ){
		$this->categories[$cat_id]['offers_cnt'] += 1;
		if($this->categories[$cat_id]['parentid'] != 0 and $cats_count == 1 ){
			$this->set_count($this->categories[$cat_id]['parentid']);
		}
	}

	public function getCategories(){
		return $this->categories;
	}


	public function getTreeNode(){
		return json_encode( $this->tree );
	}

	public function clear_keys( $array ){
		$array = array_values($array);
		//print_r($array);
		foreach ($array as $key => $value) {
			if(isset( $value['nodes'] )){
				$array[$key]['nodes'] = $this->clear_keys( $value['nodes'] );
			}
		}
		return $array;
		//$this->tree = array_map('array_values', $this->tree);
	}

	private function getTree( ){
		$cats_base = $this->categories ;
		foreach ($cats_base as $cat_id => $category) {
			$this->findUper($cat_id, $cat_id, $cats_base);
		}
		$this->tree = $this->clear_keys( $this->tree );
		//print_r($this->tree);
	}

	
	private function findUper( $cat_id,  $main_cat_id, &$cats_base,$way = [] ){
		$category = $this->categories[$cat_id];
		//echo($cat_id." ");
		array_unshift($way, $cat_id); 
		if( $category['parentid'] == 0 ){
			//print_r($way);
			$this->goDown($this->tree, $main_cat_id, $cats_base, $way );
			//$this->tree[$cat_id] = $object;
		}else{
			$this->findUper($category['parentid'], $main_cat_id, $cats_base, $way);
		}
	}

	public function goDown(&$tree_part, $main_cat_id, &$cats_base, $way){
		//print_r($way);
		$cat_key = array_shift($way);
		$category = $this->categories[$cat_key];
		$object = [
			'text' => $category['label'], 
			'tags' => [$category['offers_cnt']],
			'dataAttr' => [
				'id'=> $category['id'],   
			]
 		];
		//echo($cat_key." ");
		if( $category['parentid'] == 0 ){
			if( !isset( $tree_part[$cat_key] )  ){
				$tree_part[$cat_key] = $object;
			}
		}else{
			if( !isset($tree_part['nodes'])){
				$tree_part['nodes'] = [];
			}
			if( !isset( $tree_part['nodes'][$cat_key] )  ){
				$tree_part['nodes'][$cat_key] = $object;
			}
		}
		unset( $cats_base[$cat_id] );
		//echo( $cat_key. " " .count($way) .' c ');;
		if( count($way) ){
			if( $category['parentid'] == 0 ){
				$this->goDown($tree_part[$cat_key], $main_cat_id, $cats_base,$way);
			}else{
				$this->goDown($tree_part['nodes'][$cat_key], $main_cat_id, $cats_base, $way);
			}
		}
	}

	private function db_vsetig() {
		$db1 = mysql_connect("localhost","vsetig_test","vsetigoroda");
		mysql_select_db("vsetig_test",$db1);
	}

	public function get_cat_list_array(){
		//get categories for sync
		$sql = "SELECT * FROM aw_category";
		$result = mysql_query($sql);
		$all_cats = []; 
		while ($category = mysql_fetch_assoc($result)) {
			if($category['parentid'] == 0){
				$key = 0;
			}else{
				$key = 1;
			}
			$all_cats[$key][$category['catid']] = [
				'title' => $category['catname'], 
				'parent_id' => $category['parentid'],
				'id' => $category['catid']
			] ;
		}
		
		$sql = "SELECT * FROM aw_category3";
		$result = mysql_query($sql);
		while ($category = mysql_fetch_assoc($result)) {
			$all_cats[2][$category['catid']] = [
				'title' => $category['catname'], 
				'parent_id' => $category['parentid'],
				'id' => $category['catid']
			] ;
		}
		return $all_cats;
	}

	public function get_user_company_id($user_id){
		$sql = "SELECT * FROM aw_com where userid=$_userid limit 1";
		$result = mysql_query($sql);
		$company = mysql_fetch_assoc($result);
		return $company;
	}

	public function get_parse_info($raw_id){
		$sql = "SELECT * FROM ".$this->parser_table." where id=$raw_id limit 1";
		$result = mysql_query($sql);
		$raw = mysql_fetch_assoc($result);
		return $raw;
	}

	public function isInit($raw){
		return ($raw['status'] == self::STATUS_INIT ) ? true : false;
	}

	public function insert_xml($table, $data){
		$ins_sql = "INSERT INTO  ".$table;
		$columns = array_keys($data);
		$values = array_values($data);
		$ins_sql .= "(".implode(",", $columns).") VALUES (";
		foreach ($values as  $value) {
			$ins_sql .= "  '".$value."', ";
		}

		$ins_sql = rtrim(trim($ins_sql),",").") ";
		//print_r($ins_sql);
		return $ins_sql;
	}

	public function update($table,$data, $where){
		$sql = "UPDATE  ".$table." SET";
		foreach ($data as $key => $value) {
			$sql .= $key." = '".$value."'";
		}
		$sql .= 'WHERE '.$where['key']." = ".$where['value']; 
		return $sql;
	}

	public function hasColumn($table, $column){
		$result = mysql_query("SHOW COLUMNS FROM `".$table."` LIKE '".$column."'");
		$exists = (mysql_num_rows($result)) ? TRUE : FALSE;
		return $exists;
	}

	public function addColumn($table, $columns){
		$sql = "ALTER TABLE ".$table;
		foreach ($columns as $column_name => $type) {
		 	$sql .= "ADD COLUMN `".$column_name."` ".$this->get_sql_type($type)." NULL";
		 } 
		 return $sql;
	}

	private function get_sql_type($type){
		$sql_type = '';
		switch ($type) {
			case 'number': $sql_type = 'INT(10) UNSIGNED'; break;
			case 'string': $sql_type = 'VARCHAR(12)'; break;
			default: $sql_type = 'VARCHAR(50)'; break;
		}
		return $sql_type;		
	}

	public function save_init(){
		$columns = [
			'type' => $this->type,
			'user_id' => $this->user_id,
			'status' => self::STATUS_INIT,
			'created' => date('Y-m-d H:i:s'),
			'updated' => date('Y-m-d H:i:s'),
			'file'	=> $this->file,
		];
		$table = $this->parser_table;
		$sql = $this->insert_xml($table, $columns);
		$result = mysql_query($sql);
		if (!$result) {
			$this->operation_error = mysql_error();
			return false;
		}
		$id = mysql_insert_id();
		//var_dump($id);
		return $id;
	}

	public function uploadFile($temp_file){
		//$this->save_dir;
		$target_file = $this->save_dir .uniqid().'.xml';
		$uploadOk = 1;

		var_dump($uploadOk);
		// Check file size
		if ($temp_file["size"] > 500000) {
		    $this->operation_error =  "Слышком большой размер файла. Максималный размер файла 5 Мб";
		    $uploadOk = 0;
		}
		var_dump($uploadOk);
      	$file_ext = strtolower(end(explode('.',$temp_file['name'])));

		// Allow certain file formats
		if($file_ext != "xml" && $file_ext != "yml" ) {
		    $this->operation_error =  "Тип файла неправильный. Должен быть xml или yml";
		    $uploadOk = 0;
		}
		echo("b".$this->operation_error);
		var_dump($uploadOk);
		echo($target_file);
		if ($uploadOk == 0) {
		    $this->operation_error =  "Файл не был загружен. ".$this->operation_error;
		    return false;
		} else {
		    if (move_uploaded_file($temp_file["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			return $target_file;
			}else{
			    $this->operation_error =  "Ошибка при загрузки файла в сервер";
			    return false;
			}
		}
	}

}

?>