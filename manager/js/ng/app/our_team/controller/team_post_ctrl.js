app.controller(
	'team_post_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, '$stateParams'
	, 'Upload'
	, '$state'
	, '$anchorScroll'
	, '$timeout'
	, function ($scope, Restful, Services, $stateParams, Upload, $state, $anchorScroll, $timeout){
		var vm = this;
		var url = "api/OurTeam/";
		vm.doctor = {};
		vm.doctor.gender = 'Male';
		vm.service = new Services();
		vm.currentPage = $state.current.name;
		console.log(vm.currentPage);
		if(vm.currentPage == "our_team.post"){
			vm.header = 'Create Our Team';
		}else{
			vm.header = 'Edit Our Team';
			var data = {
				id: $stateParams.id
			};
			Restful.get(url, data).success(function(data){
				console.log(data);
				vm.doctor = data.elements[0];
			});
		}

		vm.clear = function(){
			vm.doctor = {};
			vm.doctor.gender = 'Male';
		};

		vm.save = function() {
			if (!$scope.doctorForm.$valid) {
				$anchorScroll();
				return;
			}
			console.log(vm.doctor);

			vm.isDisabled = true;
			if (vm.currentPage == "doctorsEdit") {
				Restful.put(url + vm.doctor.id, vm.doctor).success(function (data) {
					console.log(data);
					vm.service.alertMessage('<strong>Complete: </strong>Save Success.');
					vm.isDisabled = false;
					$state.go('doctors');
				});
			} else {
				Restful.post(url, vm.doctor).success(function (data) {
					console.log(data);
					vm.service.alertMessage('<strong>Complete: </strong>Save Success.');
					vm.isDisabled = false;
					$state.go('doctors');
				});
			}
		};


		//functionality upload
		vm.uploadPic = function(file) {
			console.log(file);
			if (file) {
				file.upload = Upload.upload({
					url: 'api/ImageUpload',
					data: {file: file, username: $scope.username},
				});
				file.upload.then(function (response) {
					console.log(response);
					$timeout(function () {
						console.log(response);
						file.result = response.data;
						vm.doctor.photo = response.data.image;
						vm.image_thumbnail = response.data.image_thumbnail;
						//file.result.substring(1, file.result.length - 1);
					});
				}, function (response) {
					if (response.status > 0)
						vm.errorMsg = response.status + ': ' + response.data;
				}, function (evt) {
					// Math.min is to fix IE which reports 200% sometimes
					file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
				});
			}
		};

	}
]);