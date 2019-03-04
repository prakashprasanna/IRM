 <?php
	session_start();
	require 'functions.php';
 <?php
 echo("view_institution");
 die();
   if(viewins() === true){
   		
        $_SESSION['status']['view_institution']['success'] = true;
      } else {
        $_SESSION['status']['view_institution']['error'][] = 'something went wrong';
      }

  		//	echo("header"); die();
		header('Location: add_agreement.php');
  ?>    


  <!-- <tr>
    <td>Wintec</td>
    <td>Diab</td>
  </tr>
  <tr>
    <td>AUT</td>
    <td>Issac</td>
  </tr>
  <tr>
    <td>Waikato university</td>
    <td>Roman</td>
  </tr>
    <tr>
    <td>Otago university</td>
    <td>Tenny Mary</td>
  </tr>
    <tr>
    <td>Victoria university</td>
    <td>Shalima</td>
  </tr>
    <tr>
    <td>NZMA</td>
    <td>Ramya</td>
  </tr>
    <tr>
    <td>Whitireia</td>
    <td>Mohan</td>
  </tr> -->
</table>
		

	<!-- } else {
		header('Location: add_agreement.php');

	} -->