<html>
<body>
  <?php
  if (isset( $_POST['paymentProcess'] ) ){

    //start the session
    session_name('gtmSession');
    session_start();

    //set variables for verification
    $firstName=$_POST['firstnameTF'];
    $lastName=$_POST['lastnameTF'];
    $address=$_POST['addressTF'];
    $city=$_POST['cityTF'];
    $state=$_POST['stateTF'];
    $zipCode=$_POST['zipTF'];
    $cardNumber=$_POST['cardTF'];
    $cvvNumber=$_POST['cardTF'];
    $expirationDate=$_POST['expdateTF'];

    $is_alpha_space = ctype_alpha(str_replace(' ', '', $city));
    $regex = '/[A-Za-z0-9\-\\,.]+/';
    $is_address_valid = preg_match($regex, $address);

    //check if zip code is numeric
    if (is_numeric($zipCode))
      $zipVerif=true;
    else
      $zipVerif=false;

    //check if cvv is numeric
    if (is_numeric($cvvNumber))
      $cvvVerif=true;
    else
      $cvvVerif=false;

    //check if card number is only numeric
    if (is_numeric($cardNumber))
      $cardVerif=true;
    else
      $cardVerif=false;

    //check if name/state/city are alpha
    if(ctype_alpha($firstName)&&ctype_alpha($lastName))
      $nameVerif=true;
    else
      $nameVerif=false;

    if(ctype_alpha($state))
      $stateVerif=true;
    else
      $stateVerif=false;

    if($is_alpha_space)
      $cityVerif=true;
    else
      $cityVerif=false;

    if($is_address_valid)
      $addressVerif=true;
    else
      $addressVerif=false;


    //check booleans
    if($nameVerif==false)
      echo "<h4>You entered an incorrect name</h4>";

    if($cityVerif==false)
      echo "<h4>You entered an incorrect city</h4>";

    if($stateVerif==false)
      echo "<h4>You entered an incorrect state</h4>";

    if($zipVerif==false)
      echo "<h4>You entered an incorrect zip code</h4>";

    if($cvvVerif==false)
      echo "<h4>You entered an incorrect CVV code</h4>";

    if($cardVerif==false)
      echo "<h4>You entered an incorrect credit card number</h4>";

    if($addressVerif==false)
      echo "<h4>You entered an incorrect address</h4>";


    //echo success if nothing false
    else if($nameVerif==true&&$cityVerif==true&&$stateVerif==true&&$zipVerif==true&&$cvvVerif==true&&$cardVerif==true&&$addressVerif==true)
      echo "<h4>Success! Thank you, ".$firstName.", for your order.</h4>";

    //clear specific file and destroy session
    file_put_contents("specificCustomerOrder.txt", "");
    session_unset();   // Remove the $_SESSION variable information.
    session_destroy(); // Remove the server-side session information.

  }
  ?>
</body>
</html>
