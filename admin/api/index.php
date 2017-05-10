<?php
require './vendor/autoload.php';

$app = new Slim\App();

$app->get('/{message}', function ($request, $response, $args) 
{
   $message=$args['message'];
   if($message=="signout")
   {
    $ans["m"]=1;
    return $response->withJson($ans);
    $_SESSION["admin"]=0;
   }	
});

//user requests


$app->get('/user_request/{code}', function ($request, $response, $args) 
{ 
  $code= $args['code'];
  try
  {
    $db=new PDO("mysql:host=localhost;dbname=projects.inha.uz", "root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($code==0)
    {
      $data= $request->getParsedBody();
      $ui=$data['user_id'];
      $e=$data["email"];
      $s = $data['subject'];
      $c = $data['content'];
      $query = sprintf("INSERT INTO user_requests (user_id, email, subject, content) VALUES (%s, %s, %s, %s);", $ui, $e, $s, $c);    
      $statement = $db->prepare($query); 
      $ans = $statement->execute();
    }
    if($code == 1)
    {
      //dsmail("ravshan97779@gmail.com", "this is message");
      $query ="SELECT * FROM user_requests;";    
      $user=$db->prepare($query); 
      $user->execute();
      $res = $user->fetchAll(PDO::FETCH_ASSOC);
      $ans["count"] = count($res);
      foreach($res as $row) {
        $id=$row['id'];
        $ui=$row['user_id']; 
        $e=$row['email'];
        $s=$row['subject'];
        $c=$row['content'];
      
        $attr = array('id'=> $id,'user_id'=> $ui,'email'=> $e,'subject'=> $s,'content'=> $c);
        $ans[]=$attr;
        $ans["columns"]=5;
        }
    }  
  }catch(PDOException $ex){$res['err'] = $ex->getMessage();}
  return $response->withJson($ans);

});





$app->delete('/{del}',function ($request, $response, $args){
  if($args['del'])
  {
    try{
      $db=new PDO("mysql:host=localhost;dbname=projects.inha.uz", "root","");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $table="";
      switch($args['del'])
      {
        case "users":
          $table="users";
          break;
        case "projects":
          $table="projects";
          break;
        case "news":
          $table="news";
          break; 
      }
      
      $data =$request->getParsedBody();
      $name = $data['name'];
      $id = $data['id'];

      $query =sprintf("DELETE FROM %s WHERE name =%s AND id=%s;", $table ,$db->quote($name), $db->quote($id));    
      $user=$db->prepare($query); 
      $res = $user->execute();
    }
    catch(PDOException $ex)
    {
         print $ex->getMessage();
    } 
      return $response->withJson(array('status' => $res));
  }
  else 
  {
    $m['message']="could not receive";
    return $response->withJson($m);
  }
});


$app->post('/modify/', function ($request, $response, $args){
 
  try{
    $db=new PDO("mysql:host=localhost;dbname=projects.inha.uz", "root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $request->getParsedBody();
    $table=$data['arg'];
    $ans['mes']="received";
    if($table=="user_modify")
    {
      $table="users";
      $id=$db->quote($data['id']);
      $name = $db->quote($data['name']);
      $lastName = $db->quote($data['last_name']);
      $email = $db->quote($data['email']);
      $pass = $db->quote($data['password']);
      $right = $db->quote($data['right']);

      $query = sprintf("UPDATE %s SET name = %s , surname = %s , email = %s , password = %s , admin = %s WHERE id = %s;", $table, $name, $lastName, $email, $pass, $right, $id);    
      $statement = $db->prepare($query); 
      $res = $statement->execute();
      $ans['status']=$res;
    }
    if($table=="project_modify")
    { 
      $table="projects";
      $id=$db->quote($data['id']);
      $name = $db->quote($data['project_name']);
      $pu = $db->quote($data['posted_user_name']);
      $pt = $db->quote($data['posted_time']);
      $prt =$db->quote($data['project_type']);
      $r = $db->quote($data['rate']);

      $query = sprintf("UPDATE %s SET name = %s , type = %s , posted_user_name = %s , posted_date = %s , rate = %s WHERE id = %s;", $table, $name, $prt, $pu, $pt, $r, $id);    
      $statement = $db->prepare($query); 
      $res = $statement->execute();  
      $ans['status']=$res;
     }
  }
  catch(PDOException $ex)
  {
    $ans['er'] = $ex->getMessage();  
  } 
  return $response->withJson($ans);//array('status' => $res));
});



$app->post('/create/', function ($request, $response, $args){
 
  try{
    $db=new PDO("mysql:host=localhost;dbname=projects.inha.uz", "root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $request->getParsedBody();
    $table="";
   
    if($data['arg']=="user_create")
    {
      $table='users';
      $name = $db->quote($data['name']);
      $lastName = $db->quote($data['last_name']);
      $email = $db->quote($data['email']);
      $pass = $db->quote($data['password']);
      $right = $db->quote($data['right']);
      $query = sprintf("INSERT INTO %s (name, surname, email, password, admin) VALUES (%s, %s, %s, %s, %s);", $table, $name, $lastName, $email, $pass, $right);    
      $statement = $db->prepare($query); 
      $res = $statement->execute();
    }
    $ans['trace']="inside user_create";
    if($data['arg']=="project_post")
    { 
      $table='projects';
      $name = $db->quote($data['project_name']);
      $pu = $db->quote($data['posted_user_name']);
      $pt = $db->quote($data['posted_time']);
      $prt =$db->quote($data['project_type']);
      $r = $db->quote($data['rate']);
      $query = sprintf("INSERT INTO %s (name, type, posted_user_name, posted_date, rate) VALUES (%s, %s, %s, %s, %s);", $table, $name, $pu, $prt, $pt, $r);  
      $statement = $db->prepare($query); 
      $res = $statement->execute();
     } 
  }
  catch(PDOException $ex)
  {
    $ans['er'] = $ex->getMessage();  
  } 
  return $response->withJson(array('status' => $res));
});



$app->get('/soap/',  function ($request, $response, $args){
  $wsdl = "http://services.taxwatch.biz/rates/kansas/sstp.wsdl";
  $options = array('uri' => $wsdl);
  $soapclient = new SoapClient (null, $options);
  return $response->write($soapclient->sum(123, 221));
});


$app->post('/', function ($request, $response) 
{
    $data = $request->getParsedBody();
    $message=$data['message']; 
    
    $ans["status"] = 'received';
    $ans["received_message"]=$message;
    try{
      $db=new PDO("mysql:host=localhost;dbname=projects.inha.uz", "root","");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if($message==2)
      {
        $query ="SELECT * FROM projects;";    
        $user=$db->prepare($query); 
        $user->execute();
        $res = $user->fetchAll(PDO::FETCH_ASSOC);
        $ans["count"] = count($res);
        $ans["trace"]="in message 2";
        foreach($res as $row) {
          $id=$row['id'];
          $name=$row['name']; 
          $type=$row['type'];
          $pd=$row['posted_date'];
          $pu=$row['posted_user_name'];
          $rate=$row['rate'];
          $attr = array('name'=> $name,'type'=> $type,'pd'=> $pd,'pu'=> $pu,'rate'=> $rate, 'id'=>$id);
          $ans[]=$attr;
          $ans["columns"]=6;
          }
      }
      if($message==1)
      {
        $query ="SELECT * FROM users;";    
        $user=$db->prepare($query); 
        $user->execute();
        $res = $user->fetchAll(PDO::FETCH_ASSOC);
        $ans["count"] = count($res);

        foreach($res as $row) {
          $id=$row['id'];
          $name=$row['name']; 
          $lastName=$row['surname'];
          $email=$row['email'];
          $pass=$row['password'];
          $right=$row['admin'];
          $attr = array('name'=> $name,'last_name'=> $lastName,'email'=> $email,'password'=> $pass,'right'=> $right, 'id'=>$id);
          $ans[]=$attr;
          $ans["columns"]=6;
          }
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





