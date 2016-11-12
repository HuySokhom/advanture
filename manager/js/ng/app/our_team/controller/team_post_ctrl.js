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
		vm.our_team = {};
		$scope.tinymceOptions = {
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons template paste textcolor colorpicker textpattern media code"
			],
			toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			toolbar2: "print preview media | forecolor backcolor emoticons",
			image_advtab: true,
			paste_data_images: true
		};
		vm.our_team.gender = 'Male';
		vm.service = new Services();
		vm.currentPage = $state.current.name;
		console.log(vm.currentPage);
		if(vm.currentPage == "our_team/post"){
			vm.header = 'Create Our Team';
		}else{
			vm.header = 'Edit Our Team';
			var data = {
				id: $stateParams.id
			};
			Restful.get(url, data).success(function(data){
				console.log(data);
				vm.our_team = data.elements[0];
			});
		}

		vm.clear = function(){
			vm.our_team = {};
			vm.our_team.gender = 'Male';
		};

		vm.save = function() {
			if (!$scope.our_teamForm.$valid) {
				$anchorScroll();
				return;
			}
			console.log(vm.our_team);

			vm.isDisabled = true;
			if (vm.currentPage == "our_team/edit") {
				Restful.put(url + vm.our_team.id, vm.our_team).success(function (data) {
					console.log(data);
					vm.service.alertMessage('<strong>Complete: </strong>Save Success.');
					vm.isDisabled = false;
					$state.go('our_team');
				});
			} else {
				Restful.post(url, vm.our_team).success(function (data) {
					console.log(data);
					vm.service.alertMessage('<strong>Complete: </strong>Save Success.');
					vm.isDisabled = false;
					$state.go('our_team');
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
						vm.our_team.photo = response.data.image;
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