<?php

  $id1=0;
  $id2=0;
  $id3=0;
  $id4=0;
  $id5=0;
  
  if  (trim($_POST["message"])==""){
    $id4=1;
    $_SESSION['message']="";
  }else{
   $_SESSION['message']= $_POST["message"];
  }
  
 

  if  (trim($_POST["phone"])==""){
    $id3=1;
  }else{
   $id3=$_POST["phone"];
  }

  if  (trim($_POST["email"])==""){
    $id2=1;
  }else{
      if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $id5=$_POST["email"] ;
      }else{
          $id5=1;
      }  
  }
  
  if  (trim($_POST["name"])==""){
    $id1=1;
  }else{
   $id1=$_POST["name"] ;
  }
  

  
  if (($id1==1) || ($id2==1) || ($id3==1) || ($id4==1) || ($id5==1)  ){
      header("Location: http://www.strijk-dienst.be/?id1=".$id1."&id2=".$id2."&id3=".$id3."&id4=".$id4."&id5=".$id5."#contact");
      exit;  
  }else{
 
 
 
 
	$owner_email = 'info@strijk-dienst.be';
  //$owner_email = 'chethinie@hotmail.com';
	//$headers = 'From:' . $_POST["email"];
  //$headers .= 'cc: info@strijk-dienst.be' . "\r\n";
  //$headers .= 'bcc: sudesh_jayatunga@hotmail.com' . "\r\n";
  
  $headers = 'From:' . $_POST["email"]. "\r\n" .
  //Bcc : sudesh1970@gmail.com';    
  
	$subject = 'Contact from ATS Strijkdienst - ' . $_POST["name"];
	$messageBody = "";
	
	$messageBody .= '<p>Naam: ' . $_POST["name"] . '</p>' . "\n";
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Email: ' . $_POST['email'] . '</p>' . "\n";
	$messageBody .= '<p>Telefoon: ' . $_POST['phone'] . '</p>' . "\n"; 
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Boodschap: ' . $_POST['message'] . '</p>' . "\n";
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
  
	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
		}else{
     
			header("Location: http://www.strijk-dienst.be/?id=1#contact");
      exit;
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
  
 
 
 
 }
?>