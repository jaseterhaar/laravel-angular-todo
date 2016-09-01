@extends('layout')

@section('content')
	<div class="container" ng-app="todoApp" ng-controller="taskController">

		<h1>Todo App</h1>
		<div class="">
			<div class="form-group">
				<input type="text" ng-model="task.taak" class="form-control" />
				<button id="toevoegen" ng-disabled="!task.taak.length" class="btn btn-default btn-sm" ng-click="addTask()">TAAK TOEVOEGEN</button>
				<i ng-show="loading" class="fa fa-spinner fa-spin"></i>
			</div>
			<div class="alert alert-success" transition="success" ng-show="SuccessMessage">Nieuwe taak is toegevoegd.</div>

		</div>
		<br>


			<table class="table table-striped" >

				<tr ng-repeat="task in tasks" ng-include="getTemplate(task)">

					<script type="text/ng-template" id="display">  
					
						<td width="15px"><input class="checkbox" type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="task.done" ng-change="updateTask(task)" /></td>
						<td width="85%"><div class="taak"><span ng-class="{strike: task.done}"><% task.taak %></span></div></td>
						<td><button class="btn btn-default btn-sm" ng-click="editTask(task)"><span class="glyphicon glyphicon-pencil" ></span></button></td>
						<td><button class="btn btn-danger btn-sm" ng-click="deleteTask($index)"><span class="glyphicon glyphicon-trash" ></span></button></td>

					</script>

					<script type="text/ng-template" id="edit"> 

						<td colspan="2"><input type="text" ng-model="task.taak" class="form-control" /></td>
						<td><button type="button" ng-disabled="!task.taak.length" class="btn btn-primary btn-sm" ng-click="updateTask(task)"><span class="glyphicon glyphicon-floppy-disk" ></span></button></td>
     					<td><button type="button" class="btn btn-danger btn-sm" ng-click="reset()"><span class="glyphicon glyphicon-remove"></span></button></td>

   					</script>

				</tr>

			</table>

	</div>
@endsection