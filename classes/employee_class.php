<?php
session_start();

class Products
{

	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function addCategory($name, $artiname)
	{
		$q = $this->con->query("SELECT * FROM articles WHERE article_name = '$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status' => 303, 'message' => 'Employee Already Exists'];
		} else {
			$q = $this->con->query("INSERT INTO articles (article_name,artiname) VALUES ('$name','$artiname')");
			if ($q) {
				return ['status' => 202, 'message' => 'Employee added Successfully'];
			} else {
				return ['status' => 303, 'message' => 'Failed to run query'];
			}
		}
	}

	public function getCategories()
	{
		$q = $this->con->query("SELECT * FROM articles");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status' => 202, 'message' => $ar];
	}


	public function deleteCategory($cid = null)
	{
		if ($cid != null) {
			$q = $this->con->query("DELETE FROM articles WHERE cat_id = '$cid'");
			if ($q) {
				return ['status' => 202, 'message' => 'Employee removed'];
			} else {
				return ['status' => 202, 'message' => 'Failed to run query'];
			}
		} else {
			return ['status' => 303, 'message' => 'Invalid Employee id'];
		}
	}



	public function updateCategory($post = null)
	{
		extract($post);
		if (!empty($cat_id) && !empty($e_cat_title) && !empty($e_artiname)) {
			$q = $this->con->query("UPDATE articles SET article_name = '$e_cat_title' , artiname = '$e_artiname' WHERE cat_id = '$cat_id'");
			if ($q) {
				return ['status' => 202, 'message' => 'Employee updated'];
			} else {
				return ['status' => 202, 'message' => 'Failed to run query'];
			}
		} else {
			return ['status' => 303, 'message' => 'Invalid Employee id'];
		}
	}
}


if (isset($_POST['add_category'])) {
	if (isset($_SESSION['admin_id'])) {
		$article_name = $_POST['article_name'];
		$artiname = $_POST['artiname'];
		if (!empty($article_name)) {
			$p = new Products();
			echo json_encode($p->addCategory($article_name, $artiname));
		} else {
			echo json_encode(['status' => 303, 'message' => 'Empty fields']);
		}
	} else {
		echo json_encode(['status' => 303, 'message' => 'Session Error']);
	}
}

if (isset($_POST['GET_CATEGORIES'])) {
	$p = new Products();
	echo json_encode($p->getCategories());
	exit();
}

if (isset($_POST['DELETE_CATEGORY'])) {
	if (!empty($_POST['cid'])) {
		$p = new Products();
		echo json_encode($p->deleteCategory($_POST['cid']));
		exit();
	} else {
		echo json_encode(['status' => 303, 'message' => 'Invalid details']);
		exit();
	}
}

if (isset($_POST['edit_category'])) {
	if (!empty($_POST['cat_id'])) {
		$p = new Products();
		echo json_encode($p->updateCategory($_POST));
		exit();
	} else {
		echo json_encode(['status' => 303, 'message' => 'Invalid details']);
		exit();
	}
}
