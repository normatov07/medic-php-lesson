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
 $query = 'SELECT *, FIRST_NAME, NID, PHONE_NUMBER,EMAIL, ROLE
              FROM transaction T
              JOIN customer1 C ON T.`CUST_ID`=C.`EMPLOYEE_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE TRANS_ID ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['FIRST_NAME'];
          $lname = $row['NID'];
          $pn = $row['PHONE_NUMBER'];
          $date = $row['DATE'];
          $tid = $row['TRANS_D_ID'];
          $cash = $row['CASH'];
          $sub = $row['SUBTOTAL'];
          $less = $row['LESSVAT'];
          $net = $row['NETVAT'];
          $add = $row['ADDVAT'];
          $grand = $row['GRANDTOTAL'];
          $role = $row['EMAIL'];
          $roles = $row['ROLE'];
        }
?>
            
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h5 class="font-weight-bold">
                  Sotish va inventarizatsiya
                  </h5>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    Sana: <?php echo $date; ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    FIO:<?php echo $fname; ?>
                  </h6>
				  <h6 class="font-weight-bold">
                    ID: <?php echo $lname; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Telefon raqam: <?php echo $pn; ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    O'tkazma #<?php echo $tid; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Email: <?php echo $role; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    <?php echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Maxsulotlar</th>
                <th width="8%">Miqdor</th>
                <th width="20%">Narx</th>
                <th width="20%">Umumiy</th>
              </tr>
            </thead>
            <tbody>
<?php  
           $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['PRICE'];
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '</tr> ';
                        }
?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                    To'lov usullari: sum <?php echo number_format($cash, 2); ?>
                  </h4>
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Umumiy</td>
                      <td class="text-right">sum <?php echo $sub; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Kamida QQS</td>
                      <td class="text-right">sum <?php echo $less; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">QQS sof</td>
                      <td class="text-right">sum <?php echo $net; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">QQS qo'shish</td>
                      <td class="text-right">sum <?php echo $add; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Umumiy</td>
                      <td class="font-weight-bold text-right text-primary">sum <?php echo $grand; ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>


<?php
include'../includes/footer.php';
?>
