var app = angular.module('todoApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
 
app.controller('taskController', function($scope, $http, $timeout) {
 
	$scope.tasks = [];
	$scope.loading = false;
	$scope.selected = {};  
 
	$scope.init = function() {
		$scope.loading = true;
		$http.get('/api/tasks').
		success(function(data, status, headers, config) {
			$scope.tasks = data;
			$scope.loading = false;


		});
	};
 
	$scope.addTask = function() {
		$scope.loading = true;
 
		$http.post('/api/tasks', {
			taak: $scope.task.taak,
			done: $scope.task.done
		}).success(function(data, status, headers, config) {
			$scope.tasks.push(data);
			$scope.task = '';
			$scope.loading = false;
			$scope.SuccessMessage = true;
			$timeout(function() {
				$scope.SuccessMessage = false;
			}, 5000);
		});			

	};

	$scope.getTemplate = function(task) {  
	    if (task.id === $scope.selected.id) {  
	        return 'edit';  
	    }  
	    else return 'display';  
	};

	$scope.editTask = function (task) {  
    	$scope.selected = angular.copy(task);  
	}; 

	$scope.reset = function() {  
   		$scope.selected = {};  
   		$scope.init();
	};




 
	$scope.updateTask = function(task) {
		$scope.loading = true;
 
		$http.put('/api/tasks/' + task.id, {
			taak: task.taak,
			done: task.done
		}).success(function(data, status, headers, config) {
			task = data;
			$scope.loading = false;
 			$scope.reset();
		});;


	};
 
	$scope.deleteTask = function(index) {
		$scope.loading = true;
 
		var task = $scope.tasks[index];
 
		$http.delete('/api/tasks/' + task.id)
			.success(function() {
				$scope.tasks.splice(index, 1);
				$scope.loading = false;
 
			});;
	};


 
 
	$scope.init();
 
});