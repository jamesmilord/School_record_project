<?php
    include 'db.php';
    if ($_REQUEST['req_type'] == 'edit_req'){
        $sel_sql = "SELECT * FROM student_data WHERE id = '$_REQUEST[edit_id]'";
        $run_sql = mysqli_query($conn, $sel_sql);
        while($rows = mysqli_fetch_assoc($run_sql)){ ?>
          <div class="form-group">
            <label class="control-label col-md-2">student name</label>
            <div class="col-md-8">
              <input type="text" class="form-control" value="<?php echo $rows['student_name'];?>" id="ed_student_name" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2">student Subject</label>
            <div class="col-md-3">
              <select class="form-control" name="" id="ed_student_subject">
                <?php
                  if($rows['student_subject'] == 'psychology'){
                  echo '
                  <option value="psychology" selected >Psychology</option>
                  <option value="computer">Computer</option>
                  <option value="biology">Biology</option>
                  <option value="mechanical">Mechanical</option>';
                 }elseif ($rows['student_subject'] == 'computer') {
                   echo '
                   <option value="psychology">Psychology</option>
                   <option value="computer" selected >Computer</option>
                   <option value="biology">Biology</option>
                   <option value="mechanical">Mechanical</option>';
                 }elseif ($rows['student_subject'] == 'biology') {
                   echo '
                   <option value="psychology">Psychology</option>
                   <option value="computer">Computer</option>
                   <option value="biology" selected >Biology</option>
                   <option value="mechanical">Mechanical</option>';
                 }elseif ($rows['student_subject'] == 'mechanical') {
                   echo '
                   <option value="psychology">Psychology</option>
                   <option value="computer">Computer</option>
                   <option value="biology">Biology</option>
                   <option value="mechanical" selected >Mechanical</option>';
                 }
                 ?>
              </select>
            </div>
            <label class="control-label col-md-2">student Fee</label>
            <div class="col-md-3">
              <input type="number" class="form-control" value="<?php echo $rows['student_fee'];?>" id="ed_student_fee"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
              <button type="button" name="button" class="btn btn-danger btn-block"
              onclick="edit_request('edit_button', <?php echo $rows['id'];?>);">Edit record</button>
            </div>
          </div>

    <?php  }
  }elseif($_REQUEST['req_type'] == 'edit_button'){
     $ed_sql = "UPDATE student_data SET student_name = '$_REQUEST[ed_stu_name]',student_subject = '$_REQUEST[ed_stu_subject]',student_fee = '$_REQUEST[ed_stu_fee]' WHERE id = '$_REQUEST[edit_id]'";
     $ed_run = mysqli_query($conn, $ed_sql); ?>
   <?php }

 ?>
