<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->options('/{routes:.+}', function ($request, $response, $args) {
	return $response;
});
$app->add(function ($req, $res, $next) {
	$response = $next($req, $res);
	return $response
	->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', 'X-Request-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


$app = new \Slim\App();

// Get All Streaming Services
$app->get('/api/streamingservices', function (Request $request, Response $response) {

	$sql = 'SELECT * FROM serviset_ss';
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$serviset_ss = $stmt->fetchALL(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($serviset_ss);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Get Single Service
$app->get('/api/streamingservice/{id}', function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	
	$sql = "SELECT * FROM serviset_ss WHERE id_SS = '$id'";
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$serviset_ss = $stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($serviset_ss);
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Add Service
$app->post('/api/streamingservice/add', function (Request $request, Response $response) {
	
	$Servisi_SS = $request->getParam('Servisi_SS');
	$Lansimi_SS = $request->getParam('Lansimi_SS');
	$Perdoruesit_SS = $request->getParam('Perdoruesit_SS');
	$Mbulueshmeria_SS = $request->getParam('Mbulueshmeria_SS');
	$Progresi_SS = $request->getParam('Progresi_SS');
	$Kontenti_SS = $request->getParam('Kontenti_SS');
	$Vlera_SS = $request->getParam('Vlera_SS');
	$CmimiMinimal_SS = $request->getParam('CmimiMinimal_SS');
	
	$sql = "INSERT INTO serviset_ss (Servisi_SS, Lansimi_SS, Perdoruesit_SS, Mbulueshmeria_SS, Progresi_SS, Kontenti_SS, Vlera_SS, CmimiMinimal_SS)
	VALUES(:Servisi_SS, :Lansimi_SS, :Perdoruesit_SS, :Mbulueshmeria_SS, :Progresi_SS, :Kontenti_SS, :Vlera_SS, :CmimiMinimal_SS)";
	
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':Servisi_SS',$Servisi_SS);
		$stmt->bindParam(':Lansimi_SS',$Lansimi_SS);
		$stmt->bindParam(':Perdoruesit_SS',$Perdoruesit_SS);
		$stmt->bindParam(':Mbulueshmeria_SS',$Mbulueshmeria_SS);
		$stmt->bindParam(':Progresi_SS',$Progresi_SS);
		$stmt->bindParam(':Kontenti_SS',$Kontenti_SS);
		$stmt->bindParam(':Vlera_SS',$Vlera_SS);
		$stmt->bindParam(':CmimiMinimal_SS',$CmimiMinimal_SS);
		
		$stmt->execute();
		echo'{"notice":{"text":"E dhena u shtua"}';
		
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Update Service 
$app->put('/api/streamingservice/update/{id}', function (Request $request, Response $response) {

	$id = $request->getAttribute('id');
	
	$Servisi_SS = $request->getParam('Servisi_SS');
	$Lansimi_SS = $request->getParam('Lansimi_SS');
	$Perdoruesit_SS = $request->getParam('Perdoruesit_SS');
	$Mbulueshmeria_SS = $request->getParam('Mbulueshmeria_SS');
	$Progresi_SS = $request->getParam('Progresi_SS');
	$Kontenti_SS = $request->getParam('Kontenti_SS');
	$Vlera_SS = $request->getParam('Vlera_SS');
	$CmimiMinimal_SS = $request->getParam('CmimiMinimal_SS');
	
	$sql = "UPDATE serviset_ss SET
	Servisi_SS = :Servisi_SS,
	Lansimi_SS = :Lansimi_SS,
	Perdoruesit_SS = :Perdoruesit_SS,
	Mbulueshmeria_SS = :Mbulueshmeria_SS,
	Progresi_SS = :Progresi_SS,
	Kontenti_SS = :Kontenti_SS,
	Vlera_SS = :Vlera_SS,
	CmimiMinimal_SS = :CmimiMinimal_SS
	WHERE id_SS = '$id'";
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':Servisi_SS',$Servisi_SS);
		$stmt->bindParam(':Lansimi_SS',$Lansimi_SS);
		$stmt->bindParam(':Perdoruesit_SS',$Perdoruesit_SS);
		$stmt->bindParam(':Mbulueshmeria_SS',$Mbulueshmeria_SS);
		$stmt->bindParam(':Progresi_SS',$Progresi_SS);
		$stmt->bindParam(':Kontenti_SS',$Kontenti_SS);
		$stmt->bindParam(':Vlera_SS',$Vlera_SS);
		$stmt->bindParam(':CmimiMinimal_SS',$CmimiMinimal_SS);
		
		$stmt->execute();
		echo'{"notice":{"text":"E dhena u modifikua"}';
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Delete Service
$app->delete('/api/streamingservice/delete/{id}', function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	
	$sql = "DELETE FROM serviset_ss WHERE id_SS = '$id'";
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->execute();
		echo'{"notice":{"text":"E dhena u fshi!"}';
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

?>
