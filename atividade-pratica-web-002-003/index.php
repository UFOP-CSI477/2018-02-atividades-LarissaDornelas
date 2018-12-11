<?php 

session_start();

require_once("vendor/autoload.php");
use \Slim\Slim;
use \Atvp\Page;
use \Atvp\PageAdmin;
use \Atvp\Model\User;
use \Atvp\Model\Product;
use \Atvp\Model\Cart;


$app = new \Slim\Slim();

$app->config('debug', true);

require_once("functions.php");

$app->get('/', function() {

	$products = Product::listLast();

	$page = new Page();

	$cart = new Cart();

	$page->setTpl("index",[
		"products"=>Product::checkList($products),	

	]);


});

$app->get('/shop', function(){
	
	$products = Product::listAll();

	$page = new Page();

	$page->setTpl("shop",[
		"products"=>Product::checkList($products)	
	]);

});

$app->get('/shop/:id', function($id){

	$product = new Product();

	$product->get((int)$id);

	$page = new Page();

	$page->setTpl("single-product", [
		"product"=>$product->getValues()
	]);

});


$app->get('/admin', function() {

	User::verifyLogin(1);

	$page = new PageAdmin();

	$page->setTpl("index");


});

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");


});

$app->post('/admin/login', function() {

	User:: login($_POST["login"], $_POST["password"]);

	header("Location: /admin");

	exit;


});

$app->get('/admin/logout', function() {

	User:: logout();

	header("Location: /admin/login");

	exit;


});

$app->get('/admin/users', function(){

	User::verifyLogin(1);

	$users = User::listAll();

	$page = new PageAdmin();

	$page -> setTpl("users", array(
		"users" => $users
	));

});

$app->get('/admin/users/create', function(){

	User::verifyLogin(1);

	$page = new PageAdmin();

	$page -> setTpl("users-create");

});

$app->get('/admin/users/:id/delete', function($id){

	User::verifyLogin(1);

	$user = new User();

	$user->get((int)$id);

	$user->delete();

	header("Location: /admin/users");

	exit;


});

$app->get('/admin/users/:id', function($id){

	User::verifyLogin(1);

	$user = new User();

	$user->get((int)$id);

	$page = new PageAdmin();

	$page -> setTpl("users-update", array(
		"user"=>$user->getValues()
	));

});

$app->post('/admin/users/create', function(){

	User::verifyLogin(1);

	$user = new User();

	$_POST["type"] = (isset($_POST["type"]))?2:0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");

	exit;



});

$app->post('/admin/users/:id', function($id){

	User::verifyLogin(1);

	$user = new User();

	$_POST["type"] = (isset($_POST["type"]))?2:0;

	$user->get((int)$id);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");

	exit;
});

$app->get("/admin/products",function(){

	User::verifyLogin(1);

	$products = Product::listAll();

	$page = new PageAdmin();

	$page->setTpl("products", [
		"products"=>$products
	]);
});

$app->get("/admin/products/create",function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("products-create");
});

$app->post("/admin/products/create",function(){

	User::verifyLogin(1);

	$product = new Product();

	$product->setData($_POST);

	$product->save();

	header("Location: /admin/products");
	exit;
});

$app->get('/admin/products/:id', function($id){

	User::verifyLogin(1);

	$product = new Product();

	$product->get((int)$id);

	$page = new PageAdmin();

	$page -> setTpl("products-update", array(
		"product"=>$product->getValues()
	));

});

$app->post('/admin/products/:id', function($id){

	User::verifyLogin(1);

	$product = new Product();

	$product->get((int)$id);

	$product->setData($_POST);

	$product->update();

	header("Location: /admin/products");

	exit;
});

$app->get('/admin/products/:id/delete', function($id){

	User::verifyLogin(1);

	$product = new Product();

	$product->get((int)$id);

	$product->delete();

	header("Location: /admin/products");

	exit;
});


$app->get('/carrinho', function(){

	$Page = new Page();

	$cart = new Cart();

	if(isset($_SESSION["carrinho"]))
	{
	$Page->setTpl("carrinho", array(
		"carrinho"=> $_SESSION["carrinho"],
		"total"=>$cart->getTotal()

	));	

	}

	else echo "Não há itens no carrinho";
});

$app->get('/carrinho/add/:id', function($id){

	$cart = new Cart();

	if(isset($_GET["quantity"]))
	{	
		$qtd = (int)$_GET["quantity"];
	} else {

		$qtd = 1;

	}

	$cart->add($id, $qtd);

	header("Location: \shop");

	exit;

});

$app->get("/checkout", function(){

	User::verifyLogin(2);

	$cart = new Cart();

	$page = new Page();

	$page->setTpl("checkout", array(
		"carrinho"=> $_SESSION["carrinho"],
		"total"=>$cart->getTotal()
	));

});

$app->get("/login", function(){

	$page = new Page();

	$page->setTpl("login");

});

$app->post('/login', function() {

	User:: login($_POST["login"], $_POST["password"]);

	header("Location: /checkout");

	exit;


});

$app->get("/register", function(){

	$page = new Page();

	$page->setTpl("register");

});

$app->post('/register-user', function(){

	$user = new User();

	$user->setData($_POST);

	$user->save();

	header("Location: /login");

	exit;



});



$app->run();

 ?>

