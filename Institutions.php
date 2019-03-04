
<?php

  session_start();
  require 'functions.php';
  require 'connect.php';
        global $link;
        $sql = "SELECT * FROM ins";
        $results = mysqli_query($link, $sql);
        $sql1 = "SELECT * FROM insname";
        $results1 = mysqli_query($link, $sql1);
        $sql2 = "SELECT * FROM contact";
        $results2 = mysqli_query($link, $sql2);
?><!DOCTYPE html>
<html>
<head>
<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
 //   alert(val);
  $.ajax({
  type: "POST",
  url: "get_ins.php",
  data:'insid='+val,
  success: function(data){
    $("#ins-list").html(data);
  }
  });
}
function getins(val) {
  $.ajax({
  type: "POST",
  url: "functions1.php",
  data:'insnameid='+val,
  success: function(data){
    $("#myTable").html(data);
  }
  });
}
function getcon(val) {
 // alert(val);
  $.ajax({
  type: "POST",
  url: "get_con.php",
  data:'insnameid='+val,
  success: function(data){
  $("#contact").html(data);
  }
  });
}
function getagr(val) {
 // alert(val);
  $.ajax({
  type: "POST",
  url: "get_agr.php",
  data:'insnameid='+val,
  success: function(data){
  $("#agreement").html(data);
  }
  });
}
</script>
<link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
<div class="gallery">
    <img src="ajv.png" alt="ajv">
  <div class="desc">JASON IRM</div>
</div>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="institutions.php">Institutions</a></li>
</ul>
<br>
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Institutions Relationship Management (IRM)</h1>
<br>
<br>
<br>  
<div class="frmDronpDown">
<div class="row">
<label>Institution Type:</label><br/>
<select name="type" id="type-list" onChange="getState(this.value);">
<option value="">Select Type</option>
    <?php
    foreach($results as $type) {
    ?>
    <option value="<?php echo $type["insid"]; ?>"><?php echo $type["instype"]; ?></option>
    <?php
    }
    ?>
    </select>

</div>
<div class="row">
<label>Institution:</label><br/>
<select name="ins" id="ins-list" onChange="getins(this.value); getcon(this.value); getagr(this.value);">
</select></br></br>
   
</div></br>

<table id="myTable">
</table></br>

</br>


<table id="agreement">
</table></br>
</br>

     
<table id="contact">
</table></br></br>



    <!-- Institution Type            : <span id="msgC"></span><br>
    Institution Name            : <span id="msgS"></span><br> -->
    <!-- Institution Primary Contact : <span id="msgp"></span><br>
    Institution Phone Number    : <span id="msgph"></span><br>
    Institution Fax             : <span id="msgf"></span><br>
    Institution Website         : <span id="msgw"></span><br>
    Institution Facebook        : <span id="msgfb"></span><br>
    Institution Email-id        : <span id="msge"></span><br>
    Institution Street          : <span id="msgst"></span><br>
    Institution City            : <span id="msgci"></span><br>
    Institution State           : <span id="msgsta"></span><br>
    Institution Postal Code     : <span id="msgp"></span> --> 

</body>
</html>
<?php

    unset($_SESSION['status']);

?>