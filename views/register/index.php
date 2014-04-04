<h1>Register</h1>


<form action="/register/finish_register" method="post" id="myform">
    
    <label>email</label><input type="text" name="login" id=email> <?php echo $this->error; ?><br />
    <label>Password</label><input type="password" name="password" id=password_one><br />
    <label>Reenter Password</label><input type="password" name="password" id=password_two><br />
    <label></label><input type="submit" />

</form>

<script>

	$( "#myform" ).submit(function() {
	
	   password_one = $('#password_one').val();

	    password_two = $('#password_two').val();

	    email = $('#email').val();

	  if(password_one === password_two && email != ''){

	  	return true;

	  }
	  else
	  {

	  	alert('Password should be same or please enter email');

	  return false;


	  }	


	});

</script>