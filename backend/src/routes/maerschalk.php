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
$app->get('/api/emergency_calls', function(Request $request, Response $response){
    $sql = "SELECT * FROM emergency_calls";

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
$app->get('/api/emergency_call/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM emergency_calls WHERE id = $id";

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
$app->post('/api/emergency_call/add', function(Request $request, Response $response){
    function toDutch($datum)
    {
        setlocale(LC_ALL, 'nl_NL');
        $datum = date("l, j F Y");
        return $datum;
    }
    $company_name = $request->getParam('company_name');
    $phone = $request->getParam('phone');
    $status = 'Nieuw';
    $date = toDutch($request->getParam('date'));

    $sql = "INSERT INTO emergency_calls (company_name,status,phone,date) VALUES
    (:company_name, :status, :phone, :date)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':status',       $status);
        $stmt->bindParam(':phone',        $phone);
        $stmt->bindParam(':date',         $date);

        $stmt->execute();

        echo '{"notice": {"text": "Emergency Call Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Emergency Call
$app->put('/api/emergency_call/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $company_name = $request->getParam('company_name');
    $phone = $request->getParam('phone');
    $status = $request->getParam('status');
    $body = $request->getParam('body');

    $sql = "UPDATE emergency_calls SET
				company_name	= :company_name,
                phone		    = :phone,
                status          = :status,
                body            = :body
			WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':company_name',   $company_name);
        $stmt->bindParam(':status',         $status);
        $stmt->bindParam(':phone',          $phone);
        $stmt->bindParam(':body',           $body);

        $stmt->execute();

        echo '{"notice": {"text": "Emergency Call Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Delete Emergency Call
$app->delete('/api/emergency_call/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM emergency_calls WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Emergency Call Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});