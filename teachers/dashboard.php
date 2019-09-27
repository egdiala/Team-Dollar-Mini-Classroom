<?php
session_start();
require "logincheck.php";
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<title>Mini Class - Teacher Login</title>
</head>
<body>
	<h2>Welcome Mini Class Teacher</h2>


<div ng-app="myApp" ng-controller="myCtrl">
	<h1>Hi <span ng-bind="name"></span></h1>

	<table>
	  <tr>
	  	<td>S/N</td>
	  	<td>Class Id</td>
	  	<td>Class Name</td>
	  	<td>Action</td>
	  </tr>
	  <tr ng-repeat="c in classes">
	    <td>{{ $index + 1 }}</td>
	    <td>{{ c.cid }}</td>
	    <td>{{ c.name }}</td>
	    <td>View</td>
	  </tr>
	</table>

</div>

<script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', function($scope, $http, $window) {

		$scope.uid = <?php echo $_SESSION["id"] ?>;
		$scope.name = "<?php echo $_SESSION["name"] ?>";
		$scope.email = "<?php echo $_SESSION["email"] ?>";

		$http.get('api/get-classes.php').then(function (res) {
	             $scope.classes = res.data;
	             
	         }, function (res) {
				$scope.response = "There was an error.";
	            console.log("Error:", res.data); //there was an error
	    });


	});
</script>


</body>
</html>