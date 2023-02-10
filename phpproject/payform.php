<?php
require_once("./validatecard.php");

 $error_valid=new payment_valid ();
 $validerror=$error_valid->payment_validation(1234567891234567,"3/5",123);
 ?>
<html lang="en">

<body>

<form action="" method="POST">
<p> <?php echo " $validerror"?> </p>
Credit card number:
<input type="text" name="credit" /> 
cvv number:
<input type="text" name="cvv" /> 
Date Expiration:
<input type="date" name="date_expiration" /> 

<br><br>

<button type="submit" class="btn btn-primary">Submit</button>

</form>

    
</body>
</html>
