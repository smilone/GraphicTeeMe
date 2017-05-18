<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="shopCSS.css">
  <script type="text/javascript">
  function shirtColor(){
    var color=document.test.shirtcolor.value;
    switch(color){
      case "Blue":
      document.getElementById("shirtPic").innerHTML="<img src='blue-tshirt.jpeg', height='400px', width='400px'/>";
      break;
      case "Red":
      document.getElementById("shirtPic").innerHTML="<img src='red-tshirt.jpeg', height='400px', width='400px'/>";
      break;
      case "Green":
      document.getElementById("shirtPic").innerHTML="<img src='green-tshirt.jpeg', height='400', width='400'/>";
      break;
      case "Yellow":
      document.getElementById("shirtPic").innerHTML="<img src='yellow-tshirt.jpeg', height='400', width='400'/>";
      break;
      case "Black":
      document.getElementById("shirtPic").innerHTML="<img src='black-tshirt.jpeg', height='400', width='400'/>";
      break;
    }
    document.getElementById("userInput").value="1";
    var price=30;
    if(document.test.print.value=="None")
    price=20;
    document.getElementById("priceTag").innerHTML="$" + price;
    document.getElementById("finalColor").innerHTML=color;
  }
  function shirtPrint(){
    document.getElementById("userInput").value="1";
    var price=30;
    switch(document.test.print.value){
      case "None":
      document.getElementById("mystery").innerHTML="<img src='none.jpeg',height='300', width='300'/>";
      price=20;
      break;
      case "Baseball":
      document.getElementById("mystery").innerHTML="<img src='baseball.jpeg', height='70', width='70'/>";
      break;
      case "Dinosaur":
      document.getElementById("mystery").innerHTML="<img src='dino.jpeg', height='70', width='70'/>";
      break;
      case "Fries":
      document.getElementById("mystery").innerHTML="<img src='fries.jpeg', height='70', width='70'/>";
      break;
      case "Rocketship":
      document.getElementById("mystery").innerHTML="<img src='rocketship.jpeg', height='70', width='70'/>";
      break;
    }
    var print=document.test.print.value;
    document.getElementById("priceTag").innerHTML="$" + price;
  }
  function shirtSize(){
    document.getElementById("userInput").value="1";
    var price;
    if(document.test.print.value=="None")
    price=20;
    else
    price=30;
    document.getElementById("priceTag").innerHTML="$" + price;
    var size=document.test.size.value;
  }
  function cartMath(){
    var quantity=document.getElementById("userInput").value;
    var price;
    if(document.test.print.value=="None")
    price=20;
    else
    price=30;
    price*=quantity;
    document.getElementById("priceTag").innerHTML="$" + price;
  }
  </script>
</head>
<body>
  <?php
  session_name('gtmSession');
  session_start();
  if( !isset($_SESSION['cart'])){
       $_SESSION['cart']=array();
     }
   ?>
  <ul id="navBar">
    <li><a href="gtmHome.html">Home</a></li>
    <li><a href="gtmAbout.html">About</a></li>
    <li><a href="shop.php">Shop</a></li>
    <li><a href="gtmContact.html">Contact</a></li>
    <li id="rightAlign"><a href="gtmCart.php"><img src="cart.png" width="30px" height="30px"></a></li>
  </ul>
  <div id="header">
    <h1 id="title">Graphic Tee Me</h1>
    <p id="slogan">You Design. We Deliver.</p>
    <div id="socialMedia">
      <ul class="share-buttons">
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" src="Facebook.png"></a></li>
        <li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img alt="Tweet" src="Twitter.png"></a></li>
        <li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"><img alt="Share on Google+" src="Google+.png"></a></li>
      </ul>
    </div>
  </div>
  <br><br>
  <div id="bodyBox">
    <p id="explain">Use the form below to design your own t-shirt.<br>
      All you need to do is provide your size, what color you want the shirt to be,<br>
      and what print you want the shirt to have. We'll take care of the rest.</p>
      <form name="test" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div id="formBox">
          <div class="details">
            <p style="font-size: 15px; text-align: center;"><strong>Size</strong></p>
            <input type="radio" name="size" value="X-Sm" onchange="shirtSize()" checked>X-Small<br>
            <input type="radio" name="size" value="Sm" onchange="shirtSize()">Small<br>
            <input type="radio" name="size" value="Med" onchange="shirtSize()">Medium<br>
            <input type="radio" name="size" value="Lg" onchange="shirtSize()">Large<br>
            <input type="radio" name="size" value="X-Lg" onchange="shirtSize()">X-Large<br>
          </div>
          <div class="details">
            <p style="font-size: 15px; text-align: center;"><strong>Color</strong></p>
            <input type="radio" name="shirtcolor" value="Blue" onchange="shirtColor()" checked>Blue<br>
            <input type="radio" name="shirtcolor" value="Red" onchange="shirtColor()">Red<br>
            <input type="radio" name="shirtcolor" value="Green" onchange="shirtColor()">Green<br>
            <input type="radio" name="shirtcolor" value="Yellow" onchange="shirtColor()">Yellow<br>
            <input type="radio" name="shirtcolor" value="Black" onchange="shirtColor()">Black<br>
          </div>
          <div class="details">
            <p style="font-size: 15px; text-align: center;"><strong>Print</strong></p>
            <input type="radio" name="print" value="Baseball" onchange="shirtPrint()" checked>Baseball<br>
            <input type="radio" name="print" value="Dinosaur" onchange="shirtPrint()">Dinosaur<br>
            <input type="radio" name="print" value="Fries" onchange="shirtPrint()">Frech Fries<br>
            <input type="radio" name="print" value="Rocketship" onchange="shirtPrint()">Rocket Ship<br>
            <input type="radio" name="print" value="None" onchange="shirtPrint()">None<br>
          </div>
          <h2 class="itemInfo">Price: <b id="priceTag">$30</b></h2>
          <p class="itemInfo">Quantity: <input onclick="cartMath()" name="quantity" id="userInput" type="number" min="1"	max="5" step="1" value="1"/></p>
          <button class="button" type="submit" name="submitButton" value="updateCart">Add To Cart</button>
        </div>
      </form>
      <div id="displayBox">
        <div id="shirtPic">
          <img src="blue-tshirt.jpeg" height="400px" width="400px">
        </div>
        <div id="mystery">
          <img src="baseball.jpeg" height='70' width='70'>
        </div>
      </div>
    </div>
    <h5 id="copyright">Copyright 2016 Graphic Tee Me</h5>
    <?php
      if (isset( $_POST['submitButton'] ) ){

      //start the session
      session_name('gtmSession');
      session_start();

      //declare session variables
      $_SESSION['shirtSize']=$_POST['size'];
      $_SESSION['color']=$_POST['shirtcolor'];
      $_SESSION['shirtPrint']=$_POST['print'];
      $_SESSION['shirtQuantity']=(int)$_POST['quantity'];
      $_SESSION['ID']=session_id();
      $_SESSION['orderID']=uniqid();


      //open file
      $fp=fopen("CustomerOrder.txt", "a");

      if (!$fp)
      {
        echo "Your order could not be processed at this time.";
        exit;
      }

      //set price
      if($_SESSION['shirtPrint']=='None')
        $_SESSION['price']=20;
      else
        $_SESSION['price']=30;

      $_SESSION['price']=$_SESSION['price']*$_SESSION['shirtQuantity'];
      $_SESSION['totalPrice']+=$_SESSION['price'];
      //array_push($_SESSION['cart'],$_SESSION['price'],$_SESSION['totalPrice']);

      //formatting
      $outputString0 = "Order ID: ".$_SESSION['ID'];
      $outputString1 = "\nSize: ".$_SESSION['shirtSize'];
      $outputString2 = "\nColor: ".$_SESSION['color'];
      $outputString3 = "\nPrint: ".$_SESSION['shirtPrint'];
      $outputString4 = "\nQuantity: ".$_SESSION['shirtQuantity'];
      $outputString5 = "\nPrice: $".$_SESSION['price'];
      $outputString6 = "\n<h4 style='color: #434444;text-align:center'>Item "."</h4>";


      array_push($_SESSION['cart'],$outputString6,$outputString1,$outputString2,$outputString3,$outputString4,$outputString5);

      fwrite($fp, $outputString0.$outputString1.$outputString2.$outputString3.$outputString4.$outputString5);

      //close files
      fclose($fp);

    }
      ?>
    </body>
    </html>
