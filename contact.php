<?php
  $conn = mysqli_connect("localhost", "root", "", "amplifier");
  // Check connection
  if($conn === false)
  {
      die("ERROR: Could not connect. ".mysqli_connect_error());
  }

  $FristName =  $_POST['fname'];
  $LastName =$_POST['lname'];
  $Email = $_POST['Email'];
  $Mobileno =  $_POST['mobileno'];
  $message = $_POST['message'];
    $select = mysqli_query($conn, "SELECT `Email` FROM `contactdata` WHERE `Email` = '".$_POST['Email']."'") or exit(mysqli_error($conn));
    if(mysqli_num_rows($select)) {        
      echo"
          <script type='text/javascript'>
          alert('This email is already being used');
          window.location='contact.html';
          </script>";
     }
    if($FristName == "" ||   $LastName == "" ||  $Email == "" ||  $Mobileno == "" || $message == "")
    {
      echo "
      <script type='text/javascript'>
      alert('Frist Fill All Your Data .');
      window.location ='contact.html';
      </script>
      ";   
     }
     else
    {
      $sql = "insert into contactdata(FristName,LastName,Email,MobileNo,Message) value ( '".$FristName."','".$LastName."','".$Email."','".$Mobileno."','".$message."')";
          if(mysqli_query($conn, $sql))
          {
              echo "
              <script type='text/javascript'>
              alert('Thanks For Feedback !');
              window.location ='contact.html';
             </script>
             ";     
          } 
          else
          {
              echo "
              <script type='text/javascript'>
              alert('Please Fill Correct Data !');
              window.location ='contact.html';
              </script>
              ";     
          }
    
    }

  // Close connection
  mysqli_close($conn);
?>