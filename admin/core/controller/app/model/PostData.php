<?php
class PostData {
	public static $tablename = "post";


	public function PostData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
		$this->preciopost = "";
		$this->marca = "";
	
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (short_name,code,name,description,image,link,category_id,is_public,is_featured,created_at,preciopost,marca) ";
		$sql .= "value (\"$this->short_name\",\"$this->code\",\"$this->name\",\"$this->description\",\"$this->image\",\"$this->link\",$this->category_id,$this->is_public,$this->is_featured,$this->created_at,\"$this->preciopost\",\"$this->marca\")";
		Executor::doit($sql);
		
		$usuario = $_SESSION['admin_id'];
		$sql = "insert post_view (viewer_id,post_id,created_at,realip)";
		$sql .= "value (\"$usuario\",LAST_INSERT_ID(),\"'2020-09-08 18:52:13'\",\"'rr'\")";
		
		Executor::doit($sql);

	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){

		$sql = "DELETE FROM post_view WHERE post_id=$this->id";
		Executor::doit($sql);

		$sql = "DELETE FROM post WHERE id =$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PostData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set code=\"$this->code\",name=\"$this->name\",description=\"$this->description\",link=\"$this->link\",is_public=\"$this->is_public\",is_featured=\"$this->is_featured\",category_id=\"$this->category_id\",preciopost=\"$this->preciopost\",marca=\"$this->marca\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostData());
	}

	public static function getAddrees($id){
		$sql = "SELECT viewer_id,post_id,address FROM post_view INNER JOIN USER ON  post_view.viewer_id = user.id WHERE post_view.post_id= $id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostData());
	}




	public static function getAll(){
		//
	$usuario = $_SESSION['admin_id'];
	if($usuario > 1){
	$complemento = " WHERE user.id = ".$usuario;
	} else {
		$complemento = ";";
	}
		$sql = "SELECT viewer_id,post_id,post.name,marca, description, is_featured, is_public ,category.short_name FROM post_view INNER JOIN USER ON post_view.viewer_id = user.id INNER JOIN post ON post_view.post_id = post.id INNER JOIN category ON post.category_id = category.id and  user.is_active = 1 " .$complemento;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}


	public static function getProductos(){
		//
		$sql = "SELECT viewer_id,post_id,post.name,marca, description, is_featured, is_public ,category.short_name FROM post_view INNER JOIN USER ON post_view.viewer_id = user.id INNER JOIN post ON post_view.post_id = post.id INNER JOIN category ON post.category_id = category.id WHERE user.is_active != 0;";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	// public static function getPublicsByCategoryId($id){
	// 	$sql = "select * from ".self::$tablename." where category_id=$id and is_public=1 order by created_at desc";
	// 	$query = Executor::doit($sql);
	// 	return Model::many($query[0],new PostData());
	// }

	public static function getPublicsByCategoryId($id){
		$sql = "SELECT image,post.name,post.id FROM post INNER JOIN post_view ON post_view.post_id = post.id INNER JOIN USER ON user.id = post_view.viewer_id  WHERE category_id = ".$id." AND is_public = 1 AND user.is_active = 1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function get4News(){
		$sql = "select * from ".self::$tablename." where is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function get4Offers(){
		$sql = "select * from ".self::$tablename." where is_offer=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getNews(){
		$sql = "select * from ".self::$tablename." where is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getFeatureds(){
		
		$sql = "SELECT image,post.name,post.id FROM post INNER JOIN post_view ON post_view.post_id = post.id INNER JOIN USER ON user.id = post_view.viewer_id WHERE is_featured=1 AND is_public=1 AND user.is_active = 1 LIMIT 6";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%' or description like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}


}

?>