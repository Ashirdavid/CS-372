//javascript for function access of signupPage
function SignUpForm(event){ 
	//form id is "SignUp".

	var elements = event.currentTarget;


	// declaration of variables 
	// Password as elements in event.curretTarget
	var a = elements[0].value;  //declare variable a for the firstname value
	var b = elements[1].value;  //declare variable b for the secondname value
	var c = elements[2].value;  //declare variable c for the emailaddress value
	var d = elements[3].value;  //declare variable d for the dateofbirth value
	var e = elements[4].value;  //declare variable e for the password value
	var f = elements[5].value;  //declare variable f for the passwordconfirmation value

	var result = true;    
	    
	// declare variables for valid input in regular expression for username and password

	var fname_v =/^\w+$/;
	var lname_v =/^\w+$/;
	var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
	var dob_v = /^\d{4}-\d{2}-\d{2}$/;
	var pswd_v = /^(\S*)?\d+(\S*)?$/;

	// initialize uname_msg and pswd_msg
	document.getElementById("fname_msg").innerHTML ="";
	document.getElementById("lname_msg").innerHTML ="";
	document.getElementById("email_msg").innerHTML ="";
	document.getElementById("date_msg").innerHTML ="";
	document.getElementById("pwd_msg").innerHTML ="";
	document.getElementById("pwdr_msg").innerHTML ="";


	//first name cannot be empty 
	if (a==null || a	==""||!fname_v.test(a))
	    {	   
	   document.getElementById("fname_msg").innerHTML="first name is empty";
	       result = false;
	    }

	//last name cannot be empty 
	if (b==null || b=="" ||lname_v.test(b) == false){  
	    document.getElementById("lname_msg").innerHTML="last name is empty";
	    result = false;
	}

	//email can not be empty or wrong format
	if (c==null || c==""||email_v.test(c) == false)
	    {	   
	   document.getElementById("email_msg").innerHTML="Email is empty or invalid(example: cs215@uregina.ca)";
	       result = false;
	    }

	//proper date format
	if (d==null || d=="" ||dob_v.test(d) == false){  
	    document.getElementById("date_msg").innerHTML="Date is empty or invalid[example(YYYY-MM-DD): 1992-12-18]";
	    result = false;
	}

	//validate password (8 characters long, at least one non
	if (e==null || e=="" ||pswd_v.test(e) == false){  
	    document.getElementById("pwd_msg").innerHTML="Please enter the correct format for password. (8 characters or longer, no spaces)";
	    result = false;
	}
	//confirm password (matches the password)
	if (e!=f){  
	    document.getElementById("pwdr_msg").innerHTML="The confirmed password should be the same as the password above";
	    result = false;
	}
	if (e==null || e==""){  
	    document.getElementById("pwdr_msg").innerHTML="";
	    result = false;
	}

	//prevent form to be submitted if one of above field is invalid		
	if(result == false )
	    {    
	        event.preventDefault();
	    }
	}


//javascript for function access of loginPage
function LogInForm(event){ 

	    // This example treats all 2 input fields (Password, Passcode)
	    // as elements of the event currentTarget.
	    // form id is "LogIn".

	    var elements = event.currentTarget;


	    // declaration of variables 
	    // Password as elements in event.curretTarget
	    var a = elements[0].value;  //declare variable a for the username value
	    var b = elements[1].value;  //declare variable b for the password value

	    var result = true;    
	        
	    // declare variables for valid input in regular expression for username and password

	    var uname_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
	    var pswd_v = /^.(\S*){8,}$/;
	   
	    // initialize uname_msg and pswd_msg
	    document.getElementById("uname_msg").innerHTML ="";
	    document.getElementById("pswd_msg").innerHTML ="";
	    
	 
	    //email can not be empty or wrong format
	    if (a==null || a==""||!uname_v.test(a))
	        {	   
		   document.getElementById("uname_msg").innerHTML="Email is empty or invalid(example: cs215@uregina.ca)";
	           result = false;
	        }
	    
		//validate password
		if (b==null || b=="" ||pswd_v.test(b) == false){  
		    document.getElementById("pswd_msg").innerHTML="Please enter the correct format for password. (8 characters or longer, no spaces)";
		    result = false;
	    }
		
		//prevent form to be submitted if one of above field is invalid		
	    if(result == false )
	        {    
	            event.preventDefault();
	        }
	}

//clear all data in the designated page
function ResetForm(event)
	{
	    document.getElementById("fname_msg").innerHTML ="";
	    document.getElementById("lname_msg").innerHTML ="";
	    document.getElementById("email_msg").innerHTML ="";
	    document.getElementById("date_msg").innerHTML ="";
	    document.getElementById("pwd_msg").innerHTML ="";
	    document.getElementById("pwdr_msg").innerHTML ="";
	}

