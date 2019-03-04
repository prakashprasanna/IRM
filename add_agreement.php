<?php

    session_start();
    require 'connect.php';
        global $link;
        $sql = "SELECT * FROM insname";
        $results = mysqli_query($link, $sql);
?><!DOCTYPE html>
<html>
<head>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css" />

        <!-- add the jQuery script -->
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script> 
    <!-- add the jQWidgets framework -->
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <!-- add one or more widgets -->
    <script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
    <!-- add the jQWidgets base styles and one of the theme stylesheets -->
    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="jqwidgets/styles/jqx.darkblue.css" type="text/css" />
         <!--  <title id="Description">jqxFileUpload can be used for uploading file(s) to a server. In this demo you can browse for files and click the widget's buttons to see how it will work in a real environment. For uploading files however, you should set the "uploadUrl" property to point to a Web Server file that will handle the actual Upload process.</title> -->
    <link type="text/css" rel="Stylesheet" href="../../jqwidgets/styles/jqx.base.css" />
    <script type="text/javascript" src="../../scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxfileupload.js"></script>
    <script type="text/javascript" src="../../scripts/demos.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#jqxFileUpload').jqxFileUpload({ width: 300, uploadUrl: 'imageUpload.php', fileInputName: 'fileToUpload' });
        });
    </script>

          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>jQuery UI Datepicker - Display month &amp; year menus</title> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#start" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
   <script>
  $( function() {
    $( "#exp" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>


</head>
<body>
<div class="gallery">
    <img src="ajv.png" alt="ajv">
  <div class="desc">JASON IRM</div>
</div>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="institutions.php">Institutions</a></li>
  <li><a href="contacts.php">Contacts</a></li>
  <li><a href="agreements.php">Agreements</a></li>
</ul>
<br>
<br>
<br>
<br>
<form method="post" action="addagreement.php">

<?php if(isset($_SESSION['status']['addagreement']['error'])){
    ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Error: </strong><br />
        <?php
            foreach($_SESSION['status']['addagreement']['error'] as $error){
                echo $error . '<br />';
            }
            ?>
        </p>
    </div>
<?php
}
?>
<?php if(isset($_SESSION['status']['addagreement']['success'])){
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Success: </strong><br />Agreement Added.</p>
    </div>
     <?php
    }
    ?>

       
<h1>Add New Agreement</h1>
   <input class="add_ag" name="save" type="submit" value="Save"/>

   <h3>Agreement Details</h3>
<div></br>
<label>Institution Name</label>
<select name="ins" id="ins">
<option value="">Select Institute</option>
    <?php
    foreach($results as $ins) {
    ?>
    <option value="<?php echo $ins["insnameid"]; ?>"><?php echo $ins["insname"]; ?></option>
    <?php
    }
    ?>
    </select>

</br>
<label>Contract Status</label>
<select name="con" id="con">
<option value="">Select Status</option>
<option value="active">Active</option>
<option value="closed">Closed</option>
</select></br>

<?php
    if(isset($_SESSION['status']['addagreement']['agent'])){
        $agent = $_SESSION['status']['addagreement']['agent'];
    } else {
        $agent = '';
    }
?>
    <label for="agent">Agent code</label>
    <input type="text" id="agent" name="agent" placeholder="Agent Code.." value="<?=$agent;?>"></br>

        <label for="clause">Any other clause</label>
    <input type="text" id="clause" name="clause" placeholder="Any other clause.."></br>

    <p>Start Date <input type="text" id="start" name="start" placeholder="Start Date"></p>
    <p>End Date <input type="text" id="exp" name="exp" placeholder="End Date"></p></br>

    <?php
    if(isset($_SESSION['status']['addagreement']['co'])){
        $co = $_SESSION['status']['addagreement']['co'];
    } else {
        $co = '';
    }
?>
    <label for="co">Commission</label>
    <input type="text" id="co" name="co" placeholder="Commission.." value="<?=$co;?>"></br>


    <?php
    if(isset($_SESSION['status']['addagreement']['bo'])){
        $bo = $_SESSION['status']['addagreement']['bo'];
    } else {
        $bo = '';
    }
?>
    <label for="bo">Bonus</label>
    <input type="text" id="bo" name="bo" placeholder="Bonus.." value="<?=$bo;?>"> </br>

  </form>
</div>
</br>
   <div id="jqxFileUpload">
    </div>
	
</body>
</html>
<?php

    unset($_SESSION['status']);

?>