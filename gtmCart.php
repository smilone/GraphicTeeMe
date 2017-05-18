<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="shopCSS.css">
</head>
<body>
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
  <div id="bodyBox" style="height: auto;">
    <center>
      <h1>Order Confirmation</h1>
      <hr>
      <?php
      session_name('gtmSession');
      session_start();

      echo "<h3 style='color: #434444;'>Order ID#: ".$_SESSION['orderID']."</h3>";

      foreach($_SESSION['cart'] as $result) {
          echo "<h4 style='color: #434444; padding-left:320px; text-align:left;'>".$result."</h4>";
          echo "<hr>";
        }

      $local_variable = $_SESSION['totalPrice'];
      echo "<h3 style='color: #434444;'>Total Price: $".$local_variable."</h3>";
      ?>

      <br><br>
      <h1>Payment</h1>
      <hr>
      <form method="post" action="paymentVerification.php" style="text-align:left; padding-left:320px; color: #434444;">
        <p><label style="float:left; width: 120px;">First Name:</label>
          <input style="width:120px;"type="text" name="firstnameTF" size="25" maxLength="30" required>
        </p>
        <p><label style="float:left; width: 120px;">Last Name:</label>
          <input style="width:120px;"type="text" name="lastnameTF" size="25" maxLength="30" required>
        </p>
        <p><label style="float:left; width: 120px;">Address:</label>
          <input style="width:120px;"type="text" name="addressTF" size="30" maxLength="30" required>
        </p>
        <p><label style="float:left; width: 120px;">City:</label>
          <input style="width:120px;"type="text" name="cityTF" size="25" maxLength="30" required>
        </p>
        <p><label style="float:left; width: 120px;">State:</label>
          <input type="text" name="stateTF" size="2" minLength="2" maxLength="2" required>
        </p>
        <p><label style="float:left; width: 120px;">Zip Code:</label>
          <input type="text" name="zipTF" size="5" minLength="5" maxLength="5" required>
        </p>
        <br>
        <p><label style="float:left; width: 120px;">Card Number:</label>
          <input style="width:120px;"type="text" name="cardTF" size="16" minLength="16" maxLength="16" required>
        </p>
        <p><label style="float:left; width: 120px;">CVV:</label>
          <input type="text" name="cvvTF" size="4" minLength="3" maxLength="4" required>
        </p>
        <p><label style="float:left; width: 120px;">Expiration Date:</label>
          <input style="width:150px;"type="month" name="expdateTF" min="2016-12" max="2040-12" size="50" required>
        </p>
        <br>
        <button class="button" style="left:0;top:0; height:40px;" type="submit" name="paymentProcess">Purchase</button>
      </form>
      </center>
    </div>
    <h5 id="copyright">Copyright 2016 Graphic Tee Me</h5>
  </body>
  </html>
