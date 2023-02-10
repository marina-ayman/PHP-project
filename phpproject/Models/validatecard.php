
<?php
//validation on credit card [visa,master] == 16
//valid date    current date =< input date 
//cvv == 3

$date=$_POST['date_expiration'];
$cvv=$_Post['cvv'];
$cardNumber= $_POST['credit'];


            

class  payment_valid {

    public $error="";
//_____________________________cvv______________________
    public function cvv_valid($cvv){
        if(strlen($cvv) != 3  || $cvv<0  || empty($cvv) ||!is_numeric($cvv) )
        {
         return $this->error="cvv is invalid";
        }
        else return true;
     
    }
//________________________date expiration_______________
    public function date_expiration($date){
    if(!empty($date)){
 
     $date_valid=explode("/", $date);
     $current_date=explode("/", date("m/y"));

     if(  $date_valid[1] = $current_date[1] )
     {
         if( !($date_valid[0]>= $current_date[0]))
      
         return $error="invalid expiration date";
     }

    else if ($date_valid[1] < $current_date[1] ) 
    { 
    return $this->error="please enter date expiration";
    }
    else return true;
 }
}
//________________________validate card_________________
public function validatecard($cardNumber)
{  global $type;
   $cardtype = array(
       "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
       "mastercard" => "/^5[1-5][0-9]{14}$/",
   );
    if(strlen($cardNumber) == 16 && $cardNumber>0  && !empty($cardNumber) && is_numeric($cardNumber))
   {

    //  if (preg_match($cardtype['visa'],$cardNumber))
    //  {
    //   $type='visa';
    //    return $_SESSION['purchased']="true";
    //   }
    //   else if (preg_match($cardtype['mastercard'],$cardNumber))
    //  { $type='mastercard';
    //    return $_SESSION['purchased']="true";
    //  }
    //  else
    //  { 
    //      return $_SESSION['purchased']="false";
    //  } 
    return true;
     } else return $this->error="enter valid card number";
}

public function payment_validation($cardNumber,$date,$cvv){
    if($this->validatecard($cardNumber) && $this->date_expiration($date) && $this->cvv_valid($cvv))
{
    $_SESSION['purchased']="true";
    header("location:./download.php");

}else{
    $_SESSION['purchased']="false";
    header("location:./payform.php");
    return $this->error;
}
}
}
   

?>


















<!-- 


class payment extends login 
{
    public $date;
    public $credit;

    public function payment_valid(){

        $this->credit =
    }
} --> 