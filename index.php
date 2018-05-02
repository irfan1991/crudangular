<!DOCTYPE html>
<html lang="en" ng-app="crudApp">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body ng-controller="crudController">
<br /> <br />

<div class="container" style="width: 500px;" ng-init="displayUsers()">
<h3>AngularJS dan PHP PDO CRUD  </h3>
	<form role="form" id="formid">
		<input type="hidden" ng-model="id">
		<label>Full Name:</label>
		<input type="text" ng-model="name" name="name" class="form-control" placeholder="Ex. Johne Doe"> <br />
		<label>Email:</label>
		<input type="text" ng-model="email" name="email" class="form-control" placeholder="Ex. yourmail@gmail.com">
		<p style="color:{{message_color}};">{{message}}</p> <br />
		<a href="index.php"><button type="button" ng-click="insertData()" class="btn btn-info">{{ buttonName }}</button></a>
	</form>
	<br />
	<label>Search:</label>
	<input type="search" class="form-control" ng-model="searchUser" placeholder="Live Search"> <br />

	<a href="form.php"><button>Add</button></a>

	<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
	<tr ng-repeat="student in students | filter:searchUser">
		<td>{{ student.name }}</td>
		<td>{{ student.email }}</td>
		<td>
		<button class="btn btn-info" ng-click="updateData(student.id, student.name, student.email)" onclick="myFunction()">Edit</button>
		<button class="btn btn-danger" ng-click="deleteData(student.id)">Delete</button>
		</td>
	</tr>
	</table>		

</div>
<script type="text/javascript">
	document.getElementById("formid").style.display= "none";

	function myFunction() {
    var x = document.getElementById("formid").style.display='block';
    if (x.style.display = "none") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
	  

</script>
	<script src="js/angular.js"></script>
	<script src="js/app.js"></script>

</body>
</html>