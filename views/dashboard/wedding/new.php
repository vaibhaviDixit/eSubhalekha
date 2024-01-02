<?php
locked(['user', 'host', 'manager', 'admin']);
require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');

DB::connect();
$weddings = DB::select('weddings', '*', "lang = 'en'")->fetchAll();

$languages = enumToArray(DB::select('information_schema.COLUMNS', 'COLUMN_TYPE', "TABLE_NAME = 'weddings' AND COLUMN_NAME = 'lang'", 'COLUMN_TYPE DESC')->fetch()[0]);

DB::close();


sort($languages);
controller("Wedding");
$wedding = new Wedding();
?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">
    <h1 class="h2">Create Wedding</h1>

     <div>
     	
     	<form>
    	
    	<div class="row">
    		<!-- Wedding ID -->
		    <div class="mb-3 col-sm-6">
		      <label for="weddingID" class="form-label">Wedding ID</label>
		      <input type="text" class="form-control" id="weddingID" placeholder="Enter Wedding ID" required>
		      <strong id="weddingIDMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

		    <!-- Wedding Name -->
		    <div class="mb-3 col-sm-6">
		      <label for="weddingName" class="form-label">Wedding Name</label>
		      <input type="text" class="form-control" id="weddingName" placeholder="Enter Wedding Name" required minlength="20">
		      <strong id="weddingNameMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

    	</div>

   	<div class="row">
   		 <!-- From (Bride/Groom) -->
		    <div class="mb-3 col-sm-6">
		      <label class="form-label">From</label>
		      <div class="d-flex gap-2">
		      	<div class="form-check">
		        <input class="form-check-input" type="radio" name="fromRadio" id="brideRadio" value="bride" required checked>
		        <label class="form-check-label" for="brideRadio">
		          Bride
		        </label>
		      	</div>

		      <div class="form-check">
		        <input class="form-check-input" type="radio" name="fromRadio" id="groomRadio" value="groom" required>
		        <label class="form-check-label" for="groomRadio">
		          Groom
		        </label>
		      </div>

		      </div>

		      <strong id="fromRadioMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    
		    </div>

		    <!-- Language -->
		    <div class="mb-3 col-sm-6">
		      <label for="languageSelect" class="form-label">Language</label>
		      <select class="form-select" id="languageSelect" required>
			    <option value="en">English</option>
			    <option value="as">Assamese</option>
			    <option value="bn">Bengali</option>
			    <option value="gu">Gujarati</option>
			    <option value="hi">Hindi</option>
			    <option value="kn">Kannada</option>
			    <option value="ml">Malayalam</option>
			    <option value="mr">Marathi</option>
			    <option value="ne">Nepali</option>
			    <option value="or">Odia</option>
			    <option value="pa">Punjabi</option>
			    <option value="ta">Tamil</option>
			    <option value="te">Telugu</option>
			    <option value="ur">Urdu</option>
		      
		      </select>
		       <strong id="languageSelectMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
		    </div>

   	</div>

    <div class="row">
    	<!-- Bride Name -->
	    <div class="mb-3 col-sm-6">
	      <label for="brideName" class="form-label">Bride Name</label>
	      <input type="text" class="form-control" id="brideName" placeholder="Enter Bride Name" required maxlength="12">
	       <strong id="brideNameMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
	    </div>

	    <!-- Groom Name -->
	    <div class="mb-3 col-sm-6">
	      <label for="groomName" class="form-label">Groom Name</label>
	      <input type="text" class="form-control" id="groomName" placeholder="Enter Groom Name" required maxlength="12">
	       <strong id="groomNameMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
	    </div>

    </div>

    <!-- Submit Button -->
    <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
  </form>

     </div>
    

=======
	<h1 class="h2">Create Wedding</h1>

	<div>

		<form method="post" name="createWedding" class="form-wedding">

			<?php

			$config['APP_TITLE'] = "Create Wedding | " . $config['APP_TITLE'];
			if (isset($_POST['btn-submit'])) {

				$_REQUEST['host'] = App::getUser()['userID'];
				$createWedding = $wedding->create($_REQUEST);

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
					redirect("wedding/" . $_REQUEST['weddingID'] . "/" . $_REQUEST['lang']."/basic-details");

			}

			?>
			<div class="row">

				<!-- Groom Name -->
				<div class="mb-3 col-sm-6">
					<label for="groomName" class="form-label">Groom Name</label>
					<input type="text" class="form-control" id="groomName" name="groomName"
						placeholder="Enter Groom Name" value="<?= $_REQUEST['groomName'] ?? '' ?>">
				</div>

				<!-- Bride Name -->
				<div class="mb-3 col-sm-6">
					<label for="brideName" class="form-label">Bride Name</label>
					<input type="text" class="form-control" id="brideName" name="brideName"
						placeholder="Enter Bride Name" value="<?= $_REQUEST['brideName'] ?? '' ?>">
				</div>

				<!-- From (Bride/Groom) -->
				<div class="mb-3 col-sm-6">
					<label class="form-label" for="fromRole">From</label>

					<select class="form-select" id="fromRole" name="fromRole">
						<option value="bride" <?= ($_REQUEST['fromRole'] == 'bride') ? 'selected' : '' ?>>Bride</option>
						<option value="groom" <?= ($_REQUEST['fromRole'] == 'groom') ? 'selected' : '' ?>>Groom</option>

					</select>
				</div>

				<!-- Language -->
				<div class="mb-3 col-sm-6">
					<label for="lang" class="form-label">Language</label>
					<select class="form-select" id="lang" name="lang">
						<?php foreach ($languages as $lang) {
							?>
							<option value="<?= $lang ?>" <?php
							  if ($_REQUEST['lang'] == $lang)
								  echo 'selected';
							  elseif ($lang == 'en')
								  echo 'selected' ?>>
								<?= Locale::getDisplayLanguage($lang, "en")?>
							</option>
							<?php
						} ?>
					</select>
				</div>
				<!-- Wedding Name -->
				<div class="mb-3 col-sm-6">
					<label for="weddingName" class="form-label">Wedding Name</label>
					<input type="text" class="form-control" id="weddingName" name="weddingName"
						placeholder="Thota vaari pelli sandhadi" value="<?= $_REQUEST['weddingName'] ?? '' ?>">
				</div>




				<!-- Wedding ID -->
				<div class="mb-3 col-sm-6">
					<label for="weddingID" class="form-label">Wedding ID</label>
					<input type="text" class="form-control" id="weddingID" name="weddingID"
						placeholder="KishoreWedsSwathi" value="<?= $_REQUEST['weddingID'] ?? '' ?>">
				</div>
			</div>

			<!-- Submit Button -->
			<button type="submit" name="btn-submit" class="btn btn-primary">Create Wedding</button>
		</form>

	</div>

	<script>
		let weddings = []
		<?php
		foreach ($weddings as $wedding) {
			echo "weddings.push('" . $wedding['weddingID'] . "')\n";
		}
		?>

		function generateWeddingID(groomName, brideName) {
			let weddingID = groomName + "Weds" + brideName;

			if (weddings.includes(weddingID)) {
				weddingID = groomName + "-Weds-" + brideName;
			}

			return weddingID;
		}

		function updateWeddingID() {
			const groomName = document.querySelector('#groomName').value.trim();
			const brideName = document.querySelector('#brideName').value.trim();
			const weddingIDField = document.querySelector('#weddingID');

			if (groomName.length && brideName.length) {
				const newWeddingID = generateWeddingID(groomName, brideName);
				weddingIDField.value = newWeddingID;
			} else weddingIDField.value = "";
		}

		document.querySelector('#groomName').addEventListener('focusout', updateWeddingID);
		document.querySelector('#brideName').addEventListener('focusout', updateWeddingID);
		document.querySelector('#groomName').addEventListener('keyup', updateWeddingID);
		document.querySelector('#brideName').addEventListener('keyup', updateWeddingID);
	</script>
</main>
<script type="text/javascript">
  

  class Validator {
  constructor(data) {
    this.data = data;
    this.errors = {};
  }

   required(value, message) {
    if (!value || value.trim() === '') {
      return message;
    }
    return null;
  }

  minLength(value, length, message) {
    if (value.length < length) {
      return message;
    }
    return null;
  }

  email(value, message) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(value)) {
      return message;
    }
    return null;
  }

  maxLength(value, length, message) {
    if (value.length > length) {
      return message;
    }
    return null;
  }

  phone(value, message) {
    // Simple phone validation: 10 digits
    const phoneRegex = /^[6-9][0-9]{9}$/;
    if (!phoneRegex.test(value)) {
      return message;
    }
    return null;
  }

  pan(value, message) {
    // PAN format: ABCDE1234F
    const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    if (!panRegex.test(value)) {
      return message;
    }
    return null;
  }

  aadhar(value, message) {
    // Aadhar format: 12 digits
    const aadharRegex = /^[2-9]{1}[0-9]{11}$/;
    if (!aadharRegex.test(value)) {
      return message;
    }
    return null;
  }

  password(value, message) {
    // Password must be at least 8 characters long and include at least one digit
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(value)) {
      return message;
    }
    return null;
  }

  url(value, message) {
    // Simple URL format validation
    const urlRegex = /^(https?:\/\/)[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(\/\S*)?$/;
    if (!urlRegex.test(value)) {
      return message;
    }
    return null;
  }

  domain(value, message) {
    // Simple domain format validation
    const domainRegex = /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!domainRegex.test(value)) {
      return message;
    }
    return null;
  }

  eventID(value, message) {
    // Event ID format: E followed by 4 digits
    const eventIDRegex = /^[a-zA-Z0-9_.-]+$/;
    if (!eventIDRegex.test(value)) {
      return message;
    }
    return null;
  }

  custom(validateFn, message) {
    if (!validateFn()) {
      return message;
    }
    return null;
  }


  // New method for real-time validation on input change or blur
  validateField(field, value) {
    this.errors[field] = null; // Reset error for the field

    const fieldData = this.data[field];
    const { rules } = fieldData;

    for (const rule of rules) {
      const { type, message, minLength, validate } = rule;

      switch (type) {
        case 'required':
          this.errors[field] = this.required(value, message);
          break;
        case 'minLength':
          this.errors[field] = this.minLength(value, minLength, message);
          break;
        case 'maxLength':
          this.errors[field] = this.maxLength(value, maxLength, message);
          break;
        case 'phone':
          this.errors[field] = this.phone(value, message);
          break;
        case 'pan':
          this.errors[field] = this.pan(value, message);
          break;
        case 'aadhar':
          this.errors[field] = this.aadhar(value, message);
          break;
        case 'password':
          this.errors[field] = this.password(value, message);
          break;
        case 'url':
          this.errors[field] = this.url(value, message);
          break;
        case 'domain':
          this.errors[field] = this.domain(value, message);
          break;
        case 'eventID':
          this.errors[field] = this.eventID(value, message);
          break;
        case 'email':
          this.errors[field] = this.email(value, message);
          break;
        case 'custom':
          this.errors[field] = this.custom(validate, message);
          break;       
        // Add cases for other validation types as needed

      }

      if (this.errors[field]) {
        break;
      }
    }

    // Display or hide error message dynamically (assuming you have a function to update the UI)
    this.updateErrorMessage(field, this.errors[field]);

    return this.errors[field];
  }

  // New method to update UI with error messages
  updateErrorMessage(field, error) {
    let currentField=document.getElementById(field);
    
    if(this.errors[field]){
      document.getElementById(`${field}Msg`).innerText = error;
      document.getElementById(field).focus();
        
    currentField.classList.remove("is-valid");
    currentField.classList.add("is-invalid"); 
    }
    else{
      document.getElementById(`${field}Msg`).innerText = "";
      currentField.classList.remove("is-invalid");
      currentField.classList.add("is-valid");
     
    }
    
  }

  // Modified validate method to perform real-time validation for all fields
  validate() {
    for (const field in this.data) {
      if (this.data.hasOwnProperty(field)) {
        const fieldData = this.data[field];
        const { value } = fieldData;

        // Validate the field in real-time
        this.validateField(field, value);
      }
    }

    // Check for errors
    const hasErrors = Object.values(this.errors).some((error) => error !== null);

    return {
      error: hasErrors,
      errorMsgs: this.errors,
    };
  }
}

// Example usage with real-time validation

// Assuming you have a form with input elements and error message elements
const formElements = document.querySelectorAll('input[type=text], textarea, select');

// Create a map to store the initial values of each field
const initialFieldValues = new Map();

// Initialize the map with the current values of form elements
formElements.forEach((element) => {
  initialFieldValues.set(element.id, element.value);
});

// Dynamically generate 'fields' object based on form elements
const fields = {};

formElements.forEach((element) => {

  if(element.type=="submit"){
    return;
  }

  fields[element.id] = {
    value: element.value,
    rules: [],
  };

  // Example: add required rule if the element has the 'required' attribute
  if (element.hasAttribute('required')) {
    fields[element.id].rules.push({
      type: 'required',
      message: `${element.id} is required`,
    });
  }

  if (element.hasAttribute('domain')) {
    fields[element.id].rules.push({
        type: 'domain',
        message: 'Domain is invalid',
      });
  }

  if (element.hasAttribute('email')) {
    fields[element.id].rules.push({
        type: 'email',
        message: 'Email is invalid',
      });
  }

  if (element.hasAttribute('minLength')) {
    fields[element.id].rules.push({
        type: 'minLength',
        message: `Name can't be less than ${element.minLength} characters`,
        minLength: element.minLength,
      });
  }


  // Add more rules or conditions based on your requirements

  // Initialize the element's value as the initial value
  fields[element.id].initialValue = element.value;
});

// Initialize the validator
const validator = new Validator(fields);

// Attach event listeners for input change or blur events
formElements.forEach((element) => {
  element.addEventListener('input', () => {
    
    const fieldName = element.id;
    const fieldValue = element.value;

    // Perform real-time validation on input change
    validator.validateField(fieldName, fieldValue);
  });

  element.addEventListener('blur', () => {
    const fieldName = element.id;
    const fieldValue = element.value;

    // Perform validation on blur if the value has changed
    if (initialFieldValues.get(fieldName) !== fieldValue) {
      validator.validateField(fieldName, fieldValue);
    }
  });
});


// Example usage for validating the entire form on submit
const validationResults = validator.validate();

if (validationResults.error) {
  document.querySelector("#submit-btn").disabled = true;
} else {
  document.querySelector("#submit-btn").disabled = false;
}



</script>


<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>