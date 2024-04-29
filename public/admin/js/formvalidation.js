$(function () {
	$.validator.addMethod('nicChars', function (value, element) {
	  // Check if the value is empty
	  return this.optional(element) || /^\d{12}$/.test(value); // Check if the value contains exactly 12 digits
	});
//check 000 or then 9 digits or 19 or 20 with  10 digits
	$.validator.addMethod('nicFormat', function (value, element) {
		return /^(000\d{9}|1[9]\d{10}|2[0]\d{10})$/.test(value); 
	  });
	
	  //check phone No hAS 10 digits
	$.validator.addMethod('mobileIdigits', function (value, element) {
		return this.optional(element) || /^07\d{8}$/.test(value);
	  }, "Please enter a valid mobile number");

	  $.validator.addMethod('zscore', function (value, element) {
		// Check if the value is empty or contains a valid mobile number format
		return this.optional(element) || /^\d+(\.\d{1,4})?$/.test(value);
	}, "Enter a valid zscore");

	    //check the year
		$.validator.addMethod('year', function (value, element) {
			return this.optional(element) || /^(19|20)\d{2}$/.test(value);
		}, "Please enter a valid year");

		$.validator.addMethod('yearnew', function (value, element) {
			// Get the current year
			var currentYear = new Date().getFullYear();
		
			// Check if the value is optional or if it's a valid year between 1900 and the current year
			return this.optional(element) || /^(19|20)\d{2}$/.test(value) && parseInt(value) >= 2004 && parseInt(value) <= currentYear && parseInt(value) <= 2024;
			}, "Please enter a year between 2004 - 2024)");

	    //check phone No hAS 10 digits
	$.validator.addMethod('phoneIdigits', function (value, element) {
		return this.optional(element) || /^0\d{9}$/.test(value);
	  }, "Please enter a valid phone number");

	//check whether all 12 digits are not repeating
	$.validator.addMethod('nicRepeat', function (value, element) {
		// Check if the value is empty
		if (this.optional(element)) {
			return true;
			}	
		// Check if all digits are not the same
		return !/(\d)\1{11}/.test(value);
	}, 'Please enter a valid NIC number.');

	//PDF Validation
	$.validator.addMethod('pdfOnly', function (value, element) {
		// Check if the value is empty
			if (this.optional(element)) {
				return true;
  			}

  		// Get the file extension
  		var extension = value.split('.').pop().toLowerCase();

  		// Check if the file has a '.pdf' extension
  		return extension === 'pdf';
		}, 'Please choose a PDF file.');

		//check whether maximum file size is 10MB or not
		$.validator.addMethod('pdfSize', function (value, element) {
			// Check if the value is empty
			if (this.optional(element)) {
				return true;
			}
		
			// Check file size (in bytes)
			var fileSize = element.files[0].size;
		
			// Check if the file size is below 10MB (10 * 1024 * 1024 bytes)
			return fileSize <= 5242880; // 5 MB in bytes
		}, 'Please choose a PDF file below 10MB.');
		
	//Check for letters with basic punctions
	$.validator.addMethod('letterswithbasicpunc', function (value, element) {
			return /^[A-Za-z.,'"\s]+$/.test(value);
		  }, 'Please enter a valid name');

		  $.validator.addMethod('alschoolname', function (value, element) {
			// Check if the value is empty or contains only letters and basic punctuation
			if ($.trim(value) === '') {
				return true; // Pass validation if the value is empty
			}
			return /^[A-Za-z.,'"\s]+$/.test(value); // Otherwise, validate the value
		}, 'Please enter a school name');

		  $.validator.addMethod('emailValidation', function (value, element) {
			// Check if the value is empty or it is a valid email address
			return this.optional(element) || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
		}, 'Please enter a valid email address');

		$.validator.addMethod('indexValidation', function (value, element) {
			return this.optional(element) || /^\d{5,8}$/.test(value);
		}, "Enter a valid index number");

		$.validator.addMethod('rank', function (value, element) {
			return this.optional(element) || /^\d{1,5}$/.test(value);
		}, "Enter a valid rank");

		$.validator.addMethod('commontest', function (value, element) {
			if (this.optional(element)) {
		        return true;
		    }

			// Convert the value to a number
			var mark = parseFloat(value);
		
			// Check if the mark is not greater than 100, not negative, and doesn't contain decimal points
			return !isNaN(mark) && mark >= 0 && mark <= 100 && mark === parseInt(value, 10);
		}, "Enter a valid result");

		$.validator.addMethod('numbersOnly', function(value, element) {
		    // Allow the field to pass validation if it's empty
		    if (this.optional(element)) {
		        return true;
		    }
		    // Check if the value contains only numbers
		    return /^[0-9]+$/.test(value);
		}, 'Please enter only numbers');

	// Check for letters with spaces
	$.validator.addMethod('letterswithspaces', function(value, element) {
    return /^[A-Za-z\s]+$/.test(value);
	}, 'Please enter a valid name containing only letters and spaces');

	$.validator.addMethod('addressValidation', function (value, element) {
		// Regular expression to allow letters, numbers, basic punctuation, spaces, dashes, forward slashes, and #
		return /^[A-Za-z0-9.,'"\s\-\/#]+$/.test(value);
	}, 'Please enter a valid address');

	// Check if the length of the value is at least 3 characters
	$.validator.addMethod('charLength', function (value, element) {
		// Check if the value is empty
		if (this.optional(element)) {
			return true;
		}
		// Check if the value's length is between 3 and 100 characters
		return value.length >= 3 && value.length <= 100;
	}, 'Please enter between 3 and 100 characters');

	$.validator.addMethod('income', function (value, element) {
		// Check if the value is empty or contains numbers and a single dot
		return this.optional(element) || /^[0-9]+(\.[0-9]+)?$/.test(value);
	}, "Enter your family income");

	// Check if the length of the value is at least 3 characters
	$.validator.addMethod('charLength50', function (value, element) {
		// Check if the value is empty
		if (this.optional(element)) {
			return true;
		}
		// Check if the value's length is between 3 and 100 characters
		return value.length >= 3 && value.length <= 50;
	}, 'Please enter between 3 and 50 characters');
  
	$.validator.addMethod('dateBefore', function(value, element, param) {
		// Convert the input date and comparison date to Date objects
		var inputDate = new Date(value);
		var comparisonDate = new Date(param);
	
		// Check if the input date is before the comparison date
		return inputDate < comparisonDate;
	}, 'Please enter a date before {0}');

	$.validator.addMethod('dateValidation', function(value, element, param) {
		// Convert the input date and comparison date to Date objects
		var inputDate = new Date(value);
		var comparisonDate = new Date(param);
	
		// Check if the input date is before the comparison date and not greater than January 1, 1989
		return inputDate < comparisonDate && inputDate > new Date('1989-01-01');
	}, 'Please enter a date within {0} - 1989-01-01');

	// Initialize form validation on the indexform form..........................................................
	$("#indexform").validate({
	  rules: {
		// Specify validation rules
		// Uses the name attribute
		formnic: {
		  required: true,
		  nicChars: true, // additional methods
		  nicRepeat: true,
		  nicFormat: true,
		},
	  },
	  // Specify validation error messages
	  messages: {
		formnic: {
		  nicChars: "Please enter a valid NIC number",
		  required: "Please enter a NIC Number",
		  nicFormat: "Please enter the NIC in correct format"
		},
	  },
/* 	  errorPlacement: function (error, element) {
		error.appendTo(element.next(".formerror"));
	  }, */
	  // Submit the form
	  submitHandler: function (form) {
		form.submit();
	  },
	});

		// Initialize form validation on the applicationform1 form..........................................................
	$("#applicationform1").validate({
		
		rules: {
  
		  formprovince: {
			required:true,
		  },

		  formdictrict: {
			required:true,
		  },

		  formdsoffice: {
			required:true,
		  },
		  
		  formfullname: {
			  required: true,
			  letterswithspaces: true,
			  charLength: true
			},

			formnamewithini: {
				required: true,
				letterswithbasicpunc: true,
				charLength50: true
			  },

			  formgender: {
				required:true,
			  },

			  formdob: {
				required:true,
				dateValidation: '2009-01-01',
			  },

			  formaddress: {
				required:true,
				addressValidation: true,
				charLength: true,

			  },

			  formemail: {
				emailValidation: true,
			  },

			  formmobile: {
				required: true,
				mobileIdigits: true,
			  },

			  formmland: {
				phoneIdigits: true,
			  },

			//   formdob:  {
			// 	required: true,
			// 	dateBefore: true,
			//   },
		},
		// Specify validation error messages
		messages: {
			formfullname: {
				required: "Please enter your full name",
				
		  },
		  formnamewithini: {
			required: "Please enter your name with initials",
			
	  	},
		  formprovince: {
			required: "Please select",
		  },

		  formdictrict: {
			required:"Please select"
		  },

		  formdsoffice: {
			required:"Please select"
		  },

		  formgender: {
			required:"Please select a gender"
		  },
		  formaddress: {
			required:"Please enter your address"
		  },
		  formmobile: {
			required:"Please enter your mobile number"
		  },

		  formdob: {
			required:"Enter your date of birth",
		  },
		  
		},
		errorPlacement: function (error, element) {
            if (element.attr("name") == "formgender") {
                error.appendTo("#genderError"); // Append error message to the specified container
            } else {
                error.insertAfter(element); // Default error placement for other fields
            }
        },
		submitHandler: function (form) {
		  form.submit();
		},
	  });

	  	// Initialize form validation on the applicationform1 form..........................................................
	$("#applicationform2").validate({
		
		rules: {
  
			formolschool: {
				required:true,
				letterswithbasicpunc: true,
				charLength50: true
		  },

		  formolyear: {
			required:true,
			yearnew: true,

		  },

		  formolindex: {
			required:true,
			indexValidation:true,
		  },
		  
		  formalschool: {
			alschoolname: true,
			},

			formalyear: {
				yearnew: true,

			},

			formalindex: {
				indexValidation:true,
			},
			formaldrank: {
				rank:true,
			},
			formalirank: {
				rank:true,
			},
			formalzscore: {
				zscore:true,
			},
			formalres5:{
				commontest:true,
				numbersOnly:true,
			},

			formincome: {
				required:true,
				income: true,
			  },

		},
		// Specify validation error messages
		messages: {
			formolschool: {
				required: "Please enter",
				
		  },
		  formolyear: {
			required:"Please enter",

		  },
		  formolindex: {
			required:"Please enter",
		  },

		  formincome: {
			required:"Please enter"
		  },
		  
		},
		submitHandler: function (form) {
		  form.submit();
		},
	});

	  // Initialize form validation on the completeform form..........................................................
	  $("#completeform").validate({
		rules: {
			formniccopy: {
				required: true,
				pdfOnly:true,
				pdfSize:true,
			},
			formincomecert: {
				required: true,
				pdfOnly:true,
				pdfSize:true,
			},
			exampleCheck1: {
				required: true,
			},
			exampleCheck2: {
				required: true,
			},
		},
		// Specify validation error messages
		messages: {
			formniccopy: {
				required: "Please select a pdf",
				pdfOnly: "please select only pdf file",
				pdfSize:"File should be below 5MB",
			},
			formincomecert: {
				required: "Please select a pdf",
				pdfOnly: "please select only pdf file",
				pdfSize:"File should be below 5MB",
			},
			exampleCheck1: {
				required: "Please check the box",
			},
			exampleCheck2: {
				required: "Please check the box",
			},
		},
		submitHandler: function (form) {
			form.submit();
		},
	});

  });

  