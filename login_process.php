<?php
include('connection.php');
$username=$_POST['username'];
$password = $_POST['password'];

session_start();
$query="SELECT traveluser.UID,traveluser.Pass
FROM traveluser 
WHERE UserName='$username';";
                $result=$conn->query($query);
                if($result->num_rows>0){
	                while($row=$result->fetch_assoc())
	                {
                        if($password == $row['Pass']){
                            $_SESSION['UID'] = $row['UID']; // userid in session

                            $query2="SELECT traveluserdetails.Privacy
                            FROM traveluserdetails
                            WHERE Email = '$username';";
                            $result2=$conn->query($query2);
                            if($result2->num_rows>0){
                                while($row2=$result2->fetch_assoc())
                                {
                                    if($row2['Privacy'] == '2'){  //Taking privacy 2 as admin
                                        $_SESSION['is_admin']=1; 
                                    }
                                }
                            }
                                                       
                            header("Location: travel/index.php");
                    }    
                        else{
                            echo ('<script>alert("Please Enter Valid Username And Password!!")</script>');
                            echo ('<script>history.back();</script>');
                        }
                    }
                }
                else{
                    echo ('<script>alert("Please Enter Valid Username And Password!!")</script>');
                    echo ('<script>history.back();</script>');
                }
?>