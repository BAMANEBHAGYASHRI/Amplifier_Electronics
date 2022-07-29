<?php
    $conn = mysqli_connect("localhost","root", "", "amplifier");
    //check connnection
    if($conn === false)
    {
        die("ERROR : Could not connect.".mysqli_connect_error());
    }
       $EmailId = $_POST['email'];
       $select = mysqli_query($conn, "SELECT `email` FROM `emaildata` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($connectionID));
        if(mysqli_num_rows($select)) {        
            echo"
                <script type='text/javascript'>
                alert('This email is already being used');
                window.location='index.html';
                </script>";
        }
    
        if($EmailId != "") 
        {
            $query= "insert into emaildata(Email) values('".$EmailId."')";
            if(mysqli_query($conn,$query))
            
            {
                echo"
                <script type='text/javascript'>
                alert('Thank you For Contacting !');
                window.location='index.html';
                </script>";
            }
            else{
                echo"
                <script type='text/javascript'>
                alert('please fill Correct data');
                window.location='index.html';
                </script>";
            }
        }
        else
        {
            echo"
            <script type='text/javascript'>
            alert('frist fill  All The Data');
            window.location='index.html';
            </script>";
        }
        //Close connection
        mysqli_close($conn);
        
   
?>
