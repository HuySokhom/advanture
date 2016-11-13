app.controller(
	'product_post_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, '$location'
	, 'Upload'
	, '$timeout'
	, '$anchorScroll'
	, '$stateParams'
	, '$state'
	, function ($scope, Restful, Services, $location, Upload, $timeout, $anchorScroll, $stateParams, $state){
		var vm = this;
		vm.service = new Services();
		// init tiny option
		vm.tinymceOptions = {
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

		vm.post = {
			products: {},
			products_description: {},
			products_image: {},
		};
		vm.optionalImage = [];
		// init category
		vm.initCategory = function(){
			Restful.get("api/Category").success(function(data){
				vm.categoryList = data;
			});
		};
		vm.initCategory();
		vm.disabled = true;
		// save functionality
		vm.save = function(){
			if (!$scope.myForm.$valid) {
				$anchorScroll();
				return;
			}
			vm.disabled = false;
			console.log(vm.post);
			if (vm.currentPage == "product/post") {
				Restful.post("api/Product", vm.post).success(function (data) {
					vm.disabled = true;
					console.log(data);
					vm.service.alertMessage('<b>Complete: </b>Save Success.');
					$state.go('/product');
				});
			} else {
				Restful.put("api/Product/" + $stateParams.id, vm.post).success(function (data) {
					console.log(data);
					vm.service.alertMessage('<strong>Complete: </strong>Save Success.');
					vm.isDisabled = false;
					$state.go('/product');
				});
			}

		};

		//functionality upload image
		vm.uploadPic = function(file) {
			if (file) {
				file.upload = Upload.upload({
					url: 'api/ImageUpload',
					data: {file: file, username: vm.username},
				});
				file.upload.then(function (response) {
					$timeout(function () {
						console.log(response);
						file.result = response.data;
						vm.post.products.products_image = response.data.image;
						vm.post.products.products_image_thumbnail = response.data.image_thumbnail;

					});
				}, function (response) {
					if (response.status > 0)
						vm.errorMsg = response.status + ': ' + response.data;
				}, function (evt) {
					// Math.min is to fix I	E which reports 200% sometimes
					file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
				});
			}
		};


		vm.currentPage = $state.current.name;
		console.log(vm.currentPage);
		if(vm.currentPage == "product/post"){
			vm.header = 'Create Product';
		}else{
			vm.header = 'Edit Product';
			var data = {
				id: $stateParams.id
			};
			Restful.get("api/Product", data).success(function(data){
				console.log(data);
				vm.post.products = data.elements[0];
				vm.post.products_description = data.elements[0].product_detail[0];
			});
		}
	}
]);