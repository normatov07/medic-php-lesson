<?php

require('../includes/connection.php');
require('session.php');
if (isset($_POST['btnlogin'])) {


  $users = trim($_POST['user']);
  $upass = trim($_POST['password']);
  $h_upass = $upass;
if ($upass == ''){
     ?>    <script type="text/javascript">
                alert("Parol xatoooooo!");
                window.location = "login.php";
                </script>
        <?php
}else{
//create some sql statement             
        $sql = "SELECT ID,e.FIRST_NAME,e.NID,e.GENDER,e.EMAIL,e.PHONE_NUMBER,j.JOB_TITLE,l.PROVINCE,l.CITY,t.TYPE
        FROM  `users` u
        join `customer1` e on e.EMPLOYEE_ID=u.EMPLOYEE_ID
        JOIN `location` l ON e.LOCATION_ID=l.LOCATION_ID
        join `job` j on e.JOB_ID=j.JOB_ID
          join `type` t ON t.TYPE_ID=u.TYPE_ID
        WHERE  `USERNAME` ='" . $users . "' AND  `PASSWORD` =  '" . $h_upass . "'";
        // echo $sql;
        // exit;
        $result = $db->query($sql);

        if ($result){
        //get the number of results based n the sql statement
        //check the number of result, if equal to one   
        //IF theres a result
            if ( $result->num_rows > 0) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);
                //fill the result to session variable
                $_SESSION['MEMBER_ID']  = $found_user['ID']; 
                $_SESSION['FIRST_NAME'] = $found_user['FIRST_NAME']; 
                $_SESSION['NID']  =  $found_user['NID'];  
                $_SESSION['GENDER']  =  $found_user['GENDER'];
                $_SESSION['EMAIL']  =  $found_user['EMAIL'];
                $_SESSION['PHONE_NUMBER']  =  $found_user['PHONE_NUMBER'];
                $_SESSION['JOB_TITLE']  =  $found_user['JOB_TITLE'];
                $_SESSION['PROVINCE']  =  $found_user['PROVINCE']; 
                $_SESSION['CITY']  =  $found_user['CITY']; 
                $_SESSION['TYPE']  =  $found_user['TYPE'];
                $AAA = $_SESSION['MEMBER_ID'];

        //this part is the verification if admin or user ka
        if ($_SESSION['TYPE']=='Admin'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      // alert("<?php echo  $_SESSION['FIRST_NAME']; ?> Xush kelibsiz!");
                      window.location = "index.php";
                  </script>
             <?php        
           
        }elseif ($_SESSION['TYPE']=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      // alert("<?php echo  $_SESSION['FIRST_NAME']; ?> Xush kelibsiz!");
                      window.location = "medicdash.php";
                  </script>
             <?php        
           
        }
            } else {
            //IF theres no result
              ?>
                <script type="text/javascript">
                alert("Username yoki parol xato!");
                window.location = "index.php";
                </script>
              <?php

            }

         } else {
                 # code...
        echo "Xato: " . $sql . "<br>" . $db->error;
        }
        
    }       
} 
 $db->close();
?>
<?php
include'../includes/footer.php';
?>