<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get All Emergency Calls
$app->get('/api/employees', function(Request $request, Response $response){
    $sql = "SELECT * FROM employees";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $calls = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($calls);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single Emergency Call
$app->get('/api/employee/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM employees WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $calls = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($calls);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add Emergency Call
$app->post('/api/employee/add', function(Request $request, Response $response){
    $company_name = $request->getParam('company_name');
    $phone = $request->getParam('phone');


    $sql = "INSERT INTO employees (company_name,phone) VALUES
    (:company_name,:phone)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':phone',      $phone);

        $stmt->execute();

        echo '{"notice": {"text": "Emergency Call Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Emergency Call
$app->put('/api/employee/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $company_name = $request->getParam('company_name');
    $phone = $request->getParam('phone');
    $body = $request->getParam('body');

    $sql = "UPDATE employees SET
				company_name	= :company_name,
                phone		    = :phone,
                body            = :body
			WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':company_name',   $company_name);
        $stmt->bindParam(':phone',          $phone);
        $stmt->bindParam(':body',           $body);

        $stmt->execute();

        echo '{"notice": {"text": "Employee Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Delete Emergency Call
$app->delete('/api/employee/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM employees WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Employee Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});