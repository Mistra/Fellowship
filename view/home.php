<?php

class home_view {

  public function __construct() {
    //require "blocks/header.php";
    //require "blocks/footer.php";
    //$this->head = new header;
    //$this->tail = new footer;
  }

  public function index() {
    echo "hello";
    $this->head->add_style("login");
    $this->head->add_style("menu");
    $this->head->add_style("default");
    $this->head->add_style("chat");
    $this->head->add_jqscript("login_fade_in");
    $this->head->add_jqscript("login_fade_out");
    $this->head->display();
  
    echo "<nav id=\"menu\">";
    echo "<ul>";
    echo "<li id=\"login_pop\"><div>Log In</div></li>";
    echo "<li><a href=\"/\">Home</a></li>";
    echo "</ul>";
    echo "</nav>";
    echo "<div id=\"title\">Titolo</div>";
    echo "<div id=\"container\">";
    echo '<div class="overlay" id="login_form"></div>
         <div class="popup">
            <h2>Welcome Guest!</h2>
            <form>
            

            <a class="close" href="#close"></a>
        </div>';
   ?>

<div class="reset"></div>
<div class="message">
  <div class="head">
    <span class="image">
      <img src="/user.png">
    </span>
      <div class="author">
        Mistra
      </div>
      <div class="date">
        Oggi
      </div>
  </div>
  <div class="reset"></div>
  <div class="body">
    Corpo del messaggio. Corpo del messaggio.<br>Corpo del messaggio. Corpo del messaggio. Corpo del messaggio. Corpo del messaggio. Corpo del messaggio. Corpo del messaggio.
  </div>
</div>
<div class="message">
  <div class="head">
    <span class="image">
      <img src="/user.png">
    </span>
      <div class="author">
        Mistra
      </div>
      <div class="date">
        Oggi
      </div>
  </div>
  <div class="reset"></div>
  <div class="body">
    Corpo del messaggio. Corpo del messaggio.<br>Corpo del messaggio. Corpo del messaggio. Corpo del messaggio. Corpo del messaggio. Corpo del messaggio. Corpo del messaggio.
  </div>
</div>


    <canvas id="myCanvas" width="578" height="200"></canvas>
    <script>
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');

      context.beginPath();
      context.moveTo(100, 20);

      // line 1
      context.lineTo(200, 160);
      context.lineTo(300, 160);
      // quadratic curve
      context.quadraticCurveTo(230, 200, 250, 120);

      // bezier curve
      context.bezierCurveTo(290, -40, 300, 200, 400, 150);

      // line 2
      context.lineTo(500, 90);

      context.lineWidth = 5;
      context.strokeStyle = 'blue';
      context.stroke();

    </script>  

<?php
    
  
    echo "</div>";
    $this->tail->display();
  }

}
