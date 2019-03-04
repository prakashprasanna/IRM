<?php

  session_start();
  require 'functions.php';
?><!DOCTYPE html>
<html>
<head>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css" />

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
  $(document).ready(function() {
 
  $("#parent_cat").change(function() {
    $(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
    $.get('loadsubcat.php?parent_cat=' + $(this).val(), function(data) {
      $("#sub_cat").html(data);
      $('#loader').slideUp(200, function() {
        $(this).remove();
      });
    }); 
    });
 
});
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
</ul>
<br>
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Institutions Relationship Management (IRM)</h1>
<br>
<br>
<br>  
<?php 
?>
<label>Institute Type</label>
<?php
        global $link;
        $sql = "SELECT distinct I_type FROM institution";
        $results = mysqli_query($link, $sql);
?>

 <select id="instype" name="instype" onchange = "getData(this)">
    <option value=''>Select</option>
    <?php while ($row = mysqli_fetch_array($results)){
          echo "<option value='" . $row['I_type'] . "'>" . $row['I_type'] . "  
          </option>";}
    ?>
</select></br>


    <label>Institutions</label>

<script>
function getData(dropdown) {
    var type = dropdown.options[dropdown.selectedIndex].value;
    var dataString = "instype="+catagory;


    $.ajax({
    type: "POST",
    url: "get_ins.php", // Name of the php files
    data: {'instype': dropdown.options[dropdown.selectedIndex].value},
    success: function(getins)
    {
        <?php
          if (isset($_POST['instype']))
          {
              global $link;
              $value_of_instype = $_POST['instype'];
              echo($_POST['instype']);
              $sql = "SELECT I_name FROM institution where I_type = '".$value_of_instype."'";
              $results = mysqli_query($link, $sql);
              echo(mysqli_num_rows($results));
              die();
              if(mysqli_num_rows($results) >= 1)
             {
              //    echo("success");
              //    die();    
              echo "<select name='I_name'>";
              while ($row = mysqli_fetch_array($results)) {
              echo "<option value='" . $row['I_name'] . "'>" . $row['I_name'] . "</option>";
             }
              echo "</select>";
              return true;
          } else {  
            return false; 
        }  
  }      
?>
    }
});

    }
    </script>

</body>
</html>
<?php

    unset($_SESSION['status']);

?>