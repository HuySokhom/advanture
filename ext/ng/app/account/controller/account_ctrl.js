app.controller(
	'account_ctrl', [
	'$scope'
	, 'Restful'
	, '$anchorScroll'
	, function ($scope, Restful, $anchorScroll){
		$anchorScroll();
		var vm = this;
		var url = 'api/Session/Customer/';
		$scope.language_id = $('#language_id').val();
		$scope.init = function(params){
			Restful.get(url, params).success(function(data){
				vm.account = data.elements[0];
				console.log(data);
			});
		};
		$scope.init();

	}
]);