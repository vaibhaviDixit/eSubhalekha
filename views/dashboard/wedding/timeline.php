<?php

locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');

DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();
DB::close();

controller("Wedding");
$wedding = new Wedding();

?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Timeline</h1>

      
      <form id="form" method="post">
      <?php
      
      if (isset($_POST['btn-submit'])) {
                
        $timeline = array();

        for($i=0;$i<count($_REQUEST['event']); $i++){
            $timeline[$i] = [
                'event' => $_REQUEST['event'][$i],
                'time' => $_REQUEST['time'][$i],
                'locationURL' => $_REQUEST['locationURL'][$i],
                'venue' => $_REQUEST['venue'][$i],
                'address' => $_REQUEST['address'][$i]
            ];
        }
        echo json_encode($timeline);
        exit;
        $_REQUEST['host'] = App::getUser()['userID'];

        
        // Initialize the new array
        $newArray = array();

        $eventArray=array();
        $timeArray=array();
        $locationURLArray=array();
        $venueArray=array();
        $addressArray=array();

        foreach ($_REQUEST['event'] as $key => $value) {
            $eventArray[$key]= $value;
        }

        foreach ($_REQUEST['time'] as $key => $value) {
            $timeArray[$key]= $value;
        }

        foreach ($_REQUEST['locationURL'] as $key => $value) {
            $locationURLArray[$key]= $value;
        }

        foreach ($_REQUEST['venue'] as $key => $value) {
            $venueArray[$key]= $value;
        }

        foreach ($_REQUEST['address'] as $key => $value) {
            $addressArray[$key]= $value;
        }

        for($i=0;$i<sizeof($eventArray);$i++){
          $temp=array();
          $temp['event']=$eventArray[$i];
          $temp['time']=$timeArray[$i];
          $temp['locationURL']=$locationURLArray[$i];
          $temp['venue']=$venueArray[$i];
          $temp['address']=$addressArray[$i];

          array_push($newArray,$temp);

        }
        
        // set timeline 
        $_REQUEST['timeline']=$newArray;

        $createWedding = $wedding->update($_REQUEST['id'],$_REQUEST['lang'],$_REQUEST);

        if ($createWedding['error']) {
          ?>
          <div class="alert alert-danger">
            <?php
            foreach ($createWedding['errorMsgs'] as $msg) {
              if (count($msg))
                echo $msg[0] . "<br>";
            }
            ?>
          </div>
          <?php
        } else
          redirect("wedding/" . $_REQUEST['id'] . "/" . $_REQUEST['lang']."/preview");

      }


      ?>
      <div class="row">
          <div class="col-md-12">
              <button type="button" class="btn btn-primary mb-3" id="addRowBtn"><i class="bi bi-node-plus-fill"></i> Add</button>
              <table class="table table-responsive" style="vertical-align: middle;">
                  <thead>
                      <tr>
                          <th>Event</th>
                          <th>Date Time</th>
                          <th>Location URL</th>
                          <th>Venue</th>
                          <th>Address</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="dynamicTableBody">
                      <!-- Rows will be added dynamically here -->
                  </tbody>
              </table>
          </div>
      </div>


    <!-- Submit Button -->
    <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-primary">Save & Next</button>
  </form>
    

</main>

<script>
// JavaScript code for dynamic form functionality
$(document).ready(function() {
    // Counter to keep track of the number of rows
    var rowCount = 0;

    // Event listener for the "Add Row" button
    $("#addRowBtn").click(function() {
        rowCount++;

        // HTML for a new row with your provided structure
        var newRow = `
            <tr id="row${rowCount}">
                <td><input type="text" class="form-control" name="event[]"></td>
                <td><input type="datetime-local" class="form-control" name="time[]"></td>
                <td><input type="text" class="form-control" name="locationURL[]"></td>
                <td><textarea class="form-control" name="venue[]" rows="3"></textarea></td>
                <td><textarea class="form-control" name="address[]" rows="3"></textarea></td>
                <td><button class="btn btn-danger" onclick="deleteRow(${rowCount})"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
        `;

        // Append the new row to the table body
        $("#dynamicTableBody").append(newRow);
    });

    // Function to delete a row
    window.deleteRow = function(rowId) {
        // Remove the row with the specified ID
        $("#row" + rowId).remove();
    };
});

</script>

<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>












