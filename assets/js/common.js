
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

  validate() {
    for (const field in this.data) {
      if (this.data.hasOwnProperty(field)) {
        const fieldData = this.data[field];
        const { value, rules } = fieldData;

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
            // Add more cases for other validation types as needed
          }

          if (this.errors[field]) {
            break;
          }
        }
      }
    } // all fields traversed

    //check for errors
    const hasErrors = Object.values(this.errors).some((error) => error !== null);

    return {
      error: hasErrors,
      errorMsgs: this.errors,
    };
  }
}

// Example usage:

const fields = {
  name: {
    value: 'vaibhavi D',
    rules: [
      {
        type: 'required',
        message: "Name can't be empty",
      },
      {
        type: 'minLength',
        message: "Name can't be less than 6 characters",
        minLength: 6,
      },
    ],
  },
  // other fields
  email: {
    value: 'dixit@example.com',
    rules: [
      {
        type: 'email',
        message: 'Email is invalid',
      },
      {
        type: 'custom',
        message: 'Email already in use',
        validate: function () {
          // Perform custom validation logic
          // can give ajax request here to check if email exist in db or not (but its better to do at php instead of ajax req in js)
          return true;
        },
      },
    ],
  },

  domain: {
    value: 'google',
    rules: [
      {
        type: 'domain',
        message: 'Domain is invalid',
      },
      
    ],
  },


  // Add more fields as needed
};

const validator = new Validator(fields);
const validationResults = validator.validate();

if (validationResults.error) {
  console.log('Validation errors:', validationResults.errorMsgs);
} else {
  console.log('Validation successful');
}


