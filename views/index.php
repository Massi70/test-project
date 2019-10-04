<script> 

function filterCity() {
	
  var input, table, tr, td, i, txtValue;
  input = document.getElementById("myInput").value;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];

    if (td) {
		txtValue = td.textContent.toLowerCase() ||td.innerText.toLowerCase();
      if (txtValue.indexOf(input.toLowerCase()) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  
}

</script> 
<script>
$(function() {
    $('.error').hide();
    $(".btn-primary").click(function() {
    
      $('.error').hide();
	  var name_regex = /^[a-zA-Z ]*$/;
	  var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	  var city_regex = /^[a-zA-Z ]*$/;
	  var phone_regex = /^[0-9]+$/;
  	   var name = $("input#name").val();
  		if (name == "") {
        $("label#name_error").show();
        $("input#name").focus();
        return false;
      }
	  
	  if (!name.match(name_regex)) {
	    $("label#name_error").show();
        $("input#name").focus();
        return false;
      }
	  
  		var email = $("input#email").val();
  		if (email == "") {
        $("label#email_error").show();
        $("input#email").focus();
        return false;
      }
	  
	   if (!email.match(email_regex)) {
	    $("label#email_error").show();
        $("input#email").focus();
        return false;
      } 
	  
	  var city = $("input#city").val();
  		if (city == "") {
        $("label#city_error").show();
        $("input#city").focus();
        return false;
      }
	  
	   if (!city.match(city_regex)) {
	    $("label#city_error").show();
        $("input#city").focus();
        return false;
      } 
	  
  		var phone = $("input#phone").val();
  		if (phone == "") {
        $("label#phone_error").show();
        $("input#phone").focus();
        return false;
      }
	  
	    if (!phone.match(phone_regex)) {
	    $("label#phone_error").show();
        $("input#phone").focus();
        return false;
      } 
	  
	  var dataString = 'name='+ name + '&email=' + email + '&city=' + city + '&phone=' + phone;
  $.ajax({
    type: "POST",
    url: "create.php",
    data: dataString,
    success: function() {
	  alert('Record added successfully');
    }

  });
      return true;
    });
  });
</script>
</body>
</html>



<h1>PHP Test Application</h1>
<div class="form-group" align="right">
<input type="text" id="myInput" onkeyup="filterCity()" placeholder="Filter/Search by City..">
</div>
<br>
<div id='message'></div>


<div class="table-responsive">
<table id="myTable" class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody>
		<?php		
			foreach($users as $user){?>
		<tr>
			<td><?php echo $user->getName();?></td>
			<td><?php echo $user->getEmail();?></td>
			<td><?php echo $user->getCity();?></td>
			<td><?php echo $user->getPhone();?></td>
		</tr>
		<?php }?>
	</tbody>
</table>				
</div>

<form method="post" id="form" class="form-horizontal">

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Name:</label>
	
	<div class="col-sm-10">
	<input name="name" input="text" id="name" class="form-control" required />
	<label class="error" for="name" id="name_error">Please enter name (* only aphabets and space).</label>
	</div>
</div>

<div class="form-group">
	<label for="email" class="col-sm-2 control-label">E-mail:</label>
	<div class="col-sm-10">
	<input name="email" input="text" type="email" id="email" class="form-control" required />
	<label class="error" for="email" id="email_error">Please enter email (valid).</label>
	</div>
</div>

<div class="form-group">
	<label for="city" class="col-sm-2 control-label">City:</label>
	<div class="col-sm-10">
	<input name="city" input="text" id="city" class="form-control" required />
	<label class="error" for="city" id="city_error">Please enter city name (* only aphabets and space)</label>
	</div>
</div>
	
<div class="form-group">
	<label for="phone" class="col-sm-2 control-label">Phone:</label>
	<div class="col-sm-10">
	<input name="phone" type="telephone" id="phone" class="form-control" required />
	<label class="error" for="phone" id="phone_error">Please enter phone number (* only digits)</label>
	</div>
</div>
	

	<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<button class="btn btn-primary">Create new row</button>
	</div>
	</div>
</form>
