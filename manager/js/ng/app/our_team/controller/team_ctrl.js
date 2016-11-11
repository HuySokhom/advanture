app.controller(
	'team_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, 'alertify'
	, '$anchorScroll'
	, function ($scope, Restful, Services, $alertify, $anchorScroll){
		var vm = this;
		$anchorScroll();
		vm.service = new Services();
		var url = "api/OurTeam/";
		var params = {};
		vm.searchText = '';
		vm.init = function(){
			params.search_name = vm.searchText;
			params.pagination = 'yes';
			console.log(params);
			Restful.get(url, params).success(function(data){
				vm.doctors = data;
				console.log(data);
				vm.totalItems = data.count;
			});
		};
		vm.init();

		vm.remove = function($index, params){
			$alertify.okBtn("Ok")
				.cancelBtn("Cancel")
				.confirm("<b>Waring: </b>" +
						"Are you sure want to delete this doctor?", function (ev) {
					// The click event is in the
					// event variable, so you can use
					// it here.
					ev.preventDefault();
					Restful.delete( url + params.id, params ).success(function(data){
						vm.disabled = true;
						vm.service.alertMessage('<strong>Complete: </strong>Delete Success.');
						vm.doctors.elements.splice($index, 1);
					});
				}, function(ev) {
					// The click event is in the
					// event variable, so you can use
					// it here.
					ev.preventDefault();
				});
		};
		/**
		 * start functionality pagination
		 */
		vm.currentPage = 1;
		//get another portions of data on page changed
		vm.pageChanged = function() {
			vm.pageSize = 10 * ( vm.currentPage - 1 );
			params.start = vm.pageSize;
			vm.init();
		};
	}
]);