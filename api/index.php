<?php
require './vendor/autoload.php';



 



$app = new Slim\App();

$app->post("/up",function(){ 
    $username = $_REQUEST["username"];
    if (is_uploaded_file($_FILES["pic"]["tmp_name"])) 
    {
        move_uploaded_file($_FILES["pic"]["tmp_name"], "posted projects/$username/avatar.jpg");
       
    } else 
    {
       
    }
});
$app->post('/', function ($request, $response) 
{
    $data = $request->getParsedBody();
   	$login=$data['email']; 
    $pass=$data['password'];
    $ans["status"] = 'received';
    try
     {
        $db=new PDO("mysql:host=localhost;dbname=projects.inha.uz", "root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = sprintf("SELECT * FROM users WHERE email=%s AND password=%s;", $db->quote($login), $db->quote($pass));
        
        $user=$db->prepare($query); 
        $user->execute();
        $res = $user->fetchAll(PDO::FETCH_ASSOC);
        $ans["exists"] = count($res);
        if(count($res))
        {
            $ans['right']=$res[0]['admin'];
            if($ans['right']==1)
            {session_start();
            $_SESSION['admin']=1;}
            else
            {session_start();
            $_SESSION['admin']=0;}
        }
        
     }
    catch(PDOException $ex)
     {
         print $ex->getMessage();
     } 
    return $response->withJson($ans);
});

$app->run();
?>





