<!-- Employee select and script -->
<?php
$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($db, $sqlforjob) or die ("Bad SQL: $sqlforjob");

$job = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected hidden>Kasbni tanlang</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $job .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }

$job .= "</select>";
?>

<?php
$sqlforhosy = "SELECT DISTINCT COMPANY_NAME, SUPPLIER_ID FROM hosy order by SUPPLIER_ID asc";
$result = mysqli_query($db, $sqlforhosy) or die ("Xato SQL: $sqlforhosy");

$hosy = "<select class='form-control' name='hosy' required>
        <option value='' disabled selected hidden>Tibbiy markazni tanlang</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $hosy .= "<option value='".$row['COMPANY_NAME']."'>".$row['COMPANY_NAME']."</option>";
  }

$hosy .= "</select>";
?>
<script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City();
  $.showProvinces("#province");
  $.showCities("#city");

  // ------------------
  // additional methods 
  // -------------------

  // will return all provinces 
  console.log($.getProvinces());
  
  // will return all cities 
  console.log($.getAllCities());
  
  // will return all cities under specific province (e.g Batangas)
  console.log($.getCities("Jizzax")); 
  
}
</script>
<!-- end of Employee select and script -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Platformadan chiqmoqchimisiz?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo  $_SESSION['FIRST_NAME']; ?> chiqishga tayyormisiz?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Bekor qilish</button>
          <a class="btn btn-primary" href="logout.php">Chiqish</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Customer Modal-->
  <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mijoz qo'shish</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cust_transac.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="Ismi" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Familyasi" name="lastname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Telefon raqami" name="phonenumber" required>
            </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Saqlash</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Tozalash</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Bekor qilish</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
  <!-- Customer Modal-->
  <div class="modal fade" id="poscustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mijoz qo'shish</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cust_pos_trans.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="Ismi" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Familyasi" name="lastname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Telefon raqami" name="phonenumber" required>
            </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Saqlash</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Tozalash</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Bekor qilish</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
  <!-- Employee Modal-->
  <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ishchi qo'shish</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="emp_transac.php?action=add">
              <div class="form-group">
                <input class="form-control" placeholder="Ishchi raqami" name="staffno" value="<?php $rn = rand(1000000, 9999999); echo $rn;?>" readonly required>
              </div>          
              <div class="form-group">
                <input class="form-control" placeholder="Ismi" name="firstname" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="ID" name="nid" required>
              </div>
              <div class="form-group">
                  <select class='form-control' name='gender' required>
                    <option value="" disabled selected hidden>Tanlang</option>
                    <option value="Erkak">Erkak</option>
                    <option value="Ayol">Ayol</option>
                  </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Telefon raqami" name="phonenumber" required>
              </div>
              <div class="form-group">
                <?php
                  echo $job;
                ?>
              </div>
			  <div class="form-group">
                <?php
                  echo $hosy;
                ?>
              </div>
              <div class="form-group">
                <input placeholder="Ishga qabul qilingan sana" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="FromDate" name="hireddate" class="form-control" />
              </div>
              <div class="form-group">
                <select class="form-control" id="province" placeholder="Hudud" name="province" required></select>
              </div>
              <div class="form-group">
                <select class="form-control" id="city" placeholder="Shaxar" name="city" required></select>
              </div>
              <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Saqlash</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Tozalash</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Bekor qilish</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>




<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Murojaatni yubormoq</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="apoint_transac.php?action=add">
              <div class="form-group">
                <input class="form-control" placeholder="kodi" name="apointcode" value="<?php $rn = rand(1000000, 9999999); echo $rn;?>" readonly required>
              </div>          
              <div class="form-group">
                <input class="form-control" placeholder="ism" name="clname" readonly value="<?php echo  $_SESSION['FIRST_NAME'];?>"required>
              </div>

              <div class="form-group">
                  <select class='form-control' name='gender' required>
                    <option value="" disabled selected hidden>Tanlang</option>
                    <option value="Erkak">Erkak</option>
                    <option value="Ayol">Ayol</option>
                  </select>
              </div>
             
              <div class="form-group">
                <input class="form-control" placeholder="Telefon raqami" name="phonenumber" required>
              </div>
              
			  <div class="form-group">
                <?php
                  echo $hosy;
                ?>
              </div>

              <div class="form-group">
                <input class="form-control"  placeholder="Sana" name="appdate" required type="date">
              </div>
              <div class="form-group">
                <input class="form-control"  placeholder="Vaqt" name="apptime" required type="time">
              </div>
			   <div class="form-group">
                <textarea class="form-control" placeholder="Sabab" name="reason" required></textarea>
              </div>
              <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Saqlash</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Tozalash</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Bekor qilish</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>


  <!-- Delete Modal-->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">O'chirishni tasdiqlash</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">O'chirishga ishonchingiz komilmi?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Bekor qilish</button>
          <a class="btn btn-danger btn-ok">O'chirish</a>
        </div>
      </div>
    </div>
  </div>
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>