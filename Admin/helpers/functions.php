<?php 

function Clean($input){
 
    return  stripslashes(strip_tags(trim($input)));
}





function Validate($input,$flag){

     $status = true; 

     switch ($flag) {
        
         case "required":
             if(empty($input)){

                $status = false; 
             }
             break;


         case "email":
                if(!filter_var($input, FILTER_VALIDATE_EMAIL)){
   
                   $status = false; 
                }
                break; 
                case"date":
                    $datedata =explode('-',$input);
                    if(!checkdate($datedata[1],$datedata[2],$datedata[0])){
                        $status=false;   
                    }
                    break;
            case "nextdate":
                $date= strtotime($input);
                if($date < time()){
                    $status=false; 
                }
                break;
                
            case"string":
                if (!preg_match("/^[a-zA-Z\s]*$/",$input)) {
                    $status=false; 

                }
                break;

                case"phone":
                    if (!preg_match("/^01[0-2,5][0-9]{8}$/",$input)) {
                        $status = false;
                       }
                 
                    break;

     }

    return $status; 
}






function PrintMessages($message = null){

    if(isset($_SESSION['Message'])){
            
        foreach ($_SESSION['Message'] as $key => $value) {

            echo ' <li class="breadcrumb-item active">'.$key.':'.$value.'</li>';
        }

         unset($_SESSION['Message']);

    }  else{
        echo '   <li class="breadcrumb-item active">'.$message.'</li>';
    }  
}


 function doQuery($sql){
     $result = mysqli_query($GLOBALS['con'],$sql);
     return $result; 
 }


 function DBRemove($table,$id){

     $sql = "delete from $table where id = $id"; 
     $op  = mysqli_query($GLOBALS['con'],$sql); 

     if($op){
         $status = true;
     }else{
         $status = false; 
     }


    mysqli_close($GLOBALS['con']);

     return $status;
 }

 function Upload($input)
{



    $image = null;

    $imgType    = $input['image']['type'];

    $imgArray = explode('/', $imgType);

    $imageExtension =  strtolower(end($imgArray));



    $FinalName = time() . rand() . '.' . $imageExtension;

    $disPath = 'upload/images/' . $FinalName;

    $imgTemName = $_FILES['image']['tmp_name'];


    if (move_uploaded_file($imgTemName, $disPath)) {

        $image = $FinalName;
    }

    return $image;
}


 
 function url($input=null){
             
    return "http://".$_SERVER['HTTP_HOST']."/project/Admin/".$input;
       
 } 


?>