<?php
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 



    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->check_available($checkin, $checkout);
        if(!($result))
        {
            echo $result;
        }


    }
        




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>THE MARBELLA</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
     
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>
    
    
    <style>
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }
        
        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h4 {
            color: #ffbb2b;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }
        label
        {
            color:#ffbb2b;
            font-size: 13px;
            font-weight: 100;
        }

    </style>
    
    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/home_banner.jpeg" style="width:100%; height:180px;">      
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Book Online</a></li>
                    <li class="active"><a href="reservation.php">Check Availability</a></li>

                   <li><a href="admin.php">Admin Login</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>                    
                </ul>
            </div>
        </nav>
        
       <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-5 well'>
         <form action="" method="post" name="room_category">
              
              
               <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="date" class="datepicker" name="checkin">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;&nbsp;
                    <input type="date" class="datepicker" name="checkout">
                </div>
                 
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary button" name="submit">Check Availability</button>

            </form>
           </div>
           <div class="col-md-3"></div>
        </div> 
<?php   
        
         if(isset($_REQUEST[ 'submit']))
         {
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    
                    $room_cat=$row['room_cat'];
                    $sql="SELECT * FROM room_category WHERE roomname='$room_cat'";
                    $query = mysqli_query($user->db, $sql);
                    $row2 = mysqli_fetch_array($query);
                    
                   echo "
                            <div class='row'>
                            <div class='col-md-4'></div>
                            <div class='col-md-5 well'>
                                <h4>".$row2['roomname']."</h4><hr>
                                <h6>No of Beds: ".$row2['no_bed']." ".$row2['bedtype']." bed.</h6>
                                <h6>Available Rooms: ".$row2['available']."</h6>
                                <h6>Facilities: ".$row2['facility']."</h6>
                                <h6>Price: ".$row2['price']." tk/night.</h6>
                            </div>
                            <div class='col-md-3'>
                                <a href='./booknow.php?roomname=".$row2['roomname']."'><button class='btn btn-primary button'>Book Now</button></a>
                            </div>   
                            </div>
                            
                            
                        
                    
                         ";
                    
                    
                }
                
                
                          
            }
         }
        
        
?>


    </div>
    
    
    
    
    





   
</body>

</html>