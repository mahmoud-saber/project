<?php 

function Clean($input){
 
    return  stripslashes(strip_tags(trim($input)));
}





function Validate($input,$flag){

     $status = true; 

     switch ($flag) {
        
         case "required":
             # code...
             if(empty($input)){

                $status = false; 
             }
             break;


         case "email":
                # code...
                if(!filter_var($input, FILTER_VALIDATE_EMAIL)){
   
                   $status = false; 
                }
                break; 
                

     }

    return $status; 
}






function PrintMessages($message = null){

    if(isset($_SESSION['Message'])){
            
        foreach ($_SESSION['Message'] as $key => $value) {
            # code...

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


?>