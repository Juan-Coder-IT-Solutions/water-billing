<?php 
  include '../core/config.php';

  $fetch_commercial = $mysqli->query("SELECT * FROM tbl_system_charges WHERE customer_type='C'") or die(mysqli_error());
  $commercial_row = $fetch_commercial->fetch_array();

  $fetch_residential = $mysqli->query("SELECT * FROM tbl_system_charges WHERE customer_type='R'") or die(mysqli_error());
  $residential_row = $fetch_residential->fetch_array();

?>

<div class="row">
    <div class="col-sm-6">
       <div class="col-sm-12" style="padding: 10px;border: solid 1px #ccc;border-radius: 5px;">
            <center><label>Commercial</label></center><br>
          
            <div class="form-group">
                <label>Cubic Meter Rate:</label>
                <input type="number" class="form-control form-control-sm" name="c_cubic_meter_rate" value="<?=$commercial_row['cubic_meter_rate']?>" placeholder="Cubic Meter Rate" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Late Penalty Amount:</label>
                <input type="number" class="form-control form-control-sm" name="c_late_penalty_amount"  value="<?=$commercial_row['late_penalty_amount']?>" placeholder="Late Penalty Amount" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Maximum cubic:</label>
                <input type="number" class="form-control form-control-sm" name="c_maximum_cubic"  value="<?=$commercial_row['maximum_cubic']?>" placeholder="Maximum cubic" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Minimum Rate:</label>
                <input type="number" class="form-control form-control-sm" name="c_minimum_rate"  value="<?=$commercial_row['minimum_rate']?>" placeholder="Minimum Rate" autocomplete="off">
            </div>
       </div>
    </div>

    <div class="col-sm-6">
       <div class="col-sm-12" style="padding: 10px;border: solid 1px #ccc;border-radius: 5px;">
            <center><label>Residential</label></center><br>
          
            <div class="form-group">
                <label>Cubic Meter Rate:</label>
                <input type="number" class="form-control form-control-sm" name="r_cubic_meter_rate" value="<?=$residential_row['cubic_meter_rate']?>" placeholder="Cubic Meter Rate" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Late Penalty Amount:</label>
                <input type="number" class="form-control form-control-sm" name="r_late_penalty_amount" value="<?=$residential_row['late_penalty_amount']?>" placeholder="Late Penalty Amount" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Maximum cubic:</label>
                <input type="number" class="form-control form-control-sm" name="r_maximum_cubic"  value="<?=$residential_row['maximum_cubic']?>" placeholder="Maximum cubic" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Minimum Rate:</label>
                <input type="number" class="form-control form-control-sm" name="r_minimum_rate"  value="<?=$residential_row['minimum_rate']?>" placeholder="Minimum Rate" autocomplete="off">
            </div>
       </div>
    </div>
</div>