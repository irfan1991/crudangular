var app = angular.module('crudApp', []);

app.controller('crudController', function($scope, $http) {

	$scope.buttonName = "Add";

	$scope.displayUsers = function() {
		$http.get('select.php')
		.success(function(data) {
			$scope.students = data;
		})
	}

	$scope.insertData = function() {
		if($scope.name==null || $scope.email==null) {
			$scope.message_color = "red";
			$scope.message = "All fields are required.";
		} else {

			$http.post('insert.php', {
			'name': $scope.name, //ng-model of textbox name
			'email': $scope.email, //ng-model of textbox email
			'buttonName': $scope.buttonName, //ng-model of button
			'id': $scope.id //hidden id
			})
			.success(function() {
				$scope.message_color = "green";
				$scope.message = "Success.";
				$scope.name = null; //reset textbox values
				$scope.email = null; //reset textbox values
				$scope.buttonName = "Add"; //Change textbox value to Add
				$scope.displayUsers(); //Update the users table
			//	$location.url('index.php');
			})
			.error(function() {
				console.log("Error");
			})

		}
		
	}

	$scope.updateData = function(id, name, email) {
		$scope.id = id;
		$scope.name = name;
		$scope.email = email;
		$scope.buttonName = "Update";
	}

	$scope.deleteData = function(id) {
		if(confirm("Are you sure you want to delete this record?"))
		{
			$http.post("delete.php", {'id': id})
			.success(function() {
				$scope.message_color = "blue";
				$scope.message = "Data deleted.";
				$scope.displayUsers();
			})
			.error(function() {
				console.log("Error");
			})
		}
		else
		{
			return false;
		}
	}
});