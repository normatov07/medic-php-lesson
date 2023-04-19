<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    // alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}

// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected>Huquqni tanlang</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }

$opt .= "</select>";

        $query = 'SELECT * FROM appointment WHERE APPOINTCODE ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
          while($row = mysqli_fetch_array($result))
          {   
            $zz = $row['APPOINTCODE'];
            $fname = $row['CLNAME'];
            $lname = $row['GENDER'];
            $email = $row['APPDATE'];
            $phone = $row['PHONE_NUMBER'];
            $jobb = $row['HOSY'];
            $hdate = $row['APPTIME'];
            $prov = $row['REASON'];
            $cit = $row['STATUS'];
          }
            $id = $_GET['id'];
      ?>
  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Yangilash</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="viewappoint.php"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Ortga </a>
            <div class="card-body">
          
            <form role="form" method="post" action="appoint_edit1.php">
              <input type="hidden" name="id"  readonly value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                Mijoz ismi:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Ismi" readonly name="firstname" value="<?php echo $fname; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Jinsi:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Familyasi" name="lastname" readonly value="<?php echo $lname; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Sana:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Email" name="email" readonly value="<?php echo $email; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Aloqa #:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Telefon raqami" name="phone"  readonly value="<?php echo $phone; ?>" required>
                </div>
              </div>
              
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Vaqti:
                </div>
                <div class="col-sm-9">
                  <input placeholder="Qabul qilingan vaqti" type="text" id="FromDate" readonly name="hireddate" value="<?php echo $hdate; ?>" class="form-control" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                Sabablari:
                </div>
                <div class="col-sm-9">
                  <textarea class="form-control" placeholder="Hudud" readonly name="province" value="<?php echo $prov; ?>" required><?php echo $prov; ?></textarea>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Status:
                </div>
                <div class="col-sm-9">
                  <select class="form-control" placeholder="Shaxar/Hudud" name="city"  required>
				  <option value="Kutilmoqda">Kutilmoqda</option>
				  <option value="Tasdiqlangan">Tasdiqlangan</option>
				  </select>
                </div>
              </div>
<div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                Izoh:
                </div>
                <div class="col-sm-9">
                  <textarea class="form-control" placeholder="Izohlar" name="remarks"  required></textarea>
                </div>
              </div>


              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Yangilash</button>    
              </form>  
                    
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>