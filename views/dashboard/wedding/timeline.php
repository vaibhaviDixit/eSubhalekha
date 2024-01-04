<?php
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');

DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();
DB::close();

// current user id
$userID=App::getUser()['email'];

?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Timeline</h1>

     <div>
      
      <form id="form">
      <?php
      if($_REQUEST['btn-sbmit']){
        print_r($_REQUEST);
      }
      ?>
      <div class="row">
        <!-- Event -->
        <div class="mb-3 col-sm-4">
          <label for="event" class="form-label">Event</label>
          <input type="text" class="form-control" id="event" placeholder="Enter Event" required>
          <strong id="eventMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
        </div>

        <!-- Time -->
        <div class="mb-3 col-sm-4">
          <label for="time" class="form-label">Time</label>
          <input type="time" class="form-control" id="time" placeholder="Enter Time" required>
          <strong id="timeMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
        </div>

        <!-- location url -->
         <div class="mb-3 col-sm-4">
          <label for="locationURL" class="form-label">LocationURL</label>
          <input type="text" class="form-control" id="locationURL" placeholder="Enter Location URL" required url>
           <strong id="locationURLMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
        </div>

      </div>

    <div class="row">
       <!-- Venue -->
        <div class="mb-3 col-sm-6">
          <label for="venue" class="form-label">Venue</label>
            <textarea class="form-control" id="venue" rows="3" required></textarea>
          <strong id="venueMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
        </div>

        <!-- Address -->
        <div class="mb-3 col-sm-6">
         
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" rows="3" required></textarea>

           <strong id="addressMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
        </div>

    </div>


    <!-- Submit Button -->
    <button type="submit" id="btn-submit" class="btn btn-primary">Add</button>
  </form>

   <!-- Display Table -->
  <div class="container mt-4">
    <h2>Submitted Data</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Event</th>
          <th>Time</th>
          <th>Location URL</th>
          <th>Venue</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="dataTableBody"></tbody>
    </table>
  </div>
<!-- display table ends -->

     </div>
    

</main>

<script type="text/javascript">

document.querySelector("#form").addEventListener("submit", function(event) {
  
    event.preventDefault();
     alert("Timeline added");
      // Get form values
      var event = $("#event").val();
      var time = $("#time").val();
      var locationURL = $("#locationURL").val();
      var venue = $("#venue").val();
      var address = $("#address").val();

      // Validate form fields (you can add your validation logic here)

      // Create a new table row
      var newRow = $("<tr>");
      newRow.append("<td>" + event + "</td>");
      newRow.append("<td>" + time + "</td>");
      newRow.append("<td>" + locationURL + "</td>");
      newRow.append("<td>" + venue + "</td>");
      newRow.append("<td>" + address + "</td>");
      newRow.append("<td><button type='button' class='btn btn-danger' onclick='removeRow(this)'>Remove</button></td>");

      // Append the new row to the table body
      $("#dataTableBody").append(newRow);

      // Clear form fields
      $("#form")[0].reset();

});

    function removeRow(button) {
      // Remove the corresponding row when the remove button is clicked
      $(button).closest("tr").remove();
    } 
  
</script>

<!-- <script type="text/javascript" src="<?php assets("js/validation.js");?>"></script> -->

<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>












