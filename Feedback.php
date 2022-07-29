<?php
  $conn = mysqli_connect("localhost", "root", "", "amplifier");
  // Check connection
  if($conn === false)
  {
      die("ERROR: Could not connect. ".mysqli_connect_error());
  }
  $Name =  $_POST['Name'];
  $Email = $_POST['Email'];
  $Mobileno =  $_POST['Mobileno'];
  $Feedback = $_POST['Feedback'];
    $select = mysqli_query($conn, "SELECT `email` FROM `feedback` WHERE `email` = '".$_POST['Email']."'") or exit(mysqli_error($conn));
    if(mysqli_num_rows($select)) {        
      echo"
          <script type='text/javascript'>
          alert('This email is already being used');
          window.location='Feedback.html';
          </script>";
     }


  if($Name == "" || $Email == "" || $Mobileno == "" || $Feedback == "")
  {
      echo "
      <script type='text/javascript'>
      alert('Firts Fill All Your Data .');
      window.location ='Feedback.html';
      </script>
      ";   
  }
  else
  {
      $sql = "insert into feedback(Name,Email,MobileNo,feedback) value ('$Name','$Email','$Mobileno','$Feedback')";
   
          if(mysqli_query($conn, $sql))
          {
              echo "
              <script type='text/javascript'>
              alert('Thanks For Feedback !');
              window.location ='Feedback.html';
             </script>
             ";     
          } 
          else
          {
              echo "
              <script type='text/javascript'>
              alert('Please Fill Correct Data !');
              window.location ='Feedback.html';
              </script>
              ";     
          }
    
    }

  // Close connection
  mysqli_close($conn);
?>