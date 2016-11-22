app.controller(
	'category_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, '$location'
	, 'Upload'
	, 'alertify'
	, '$timeout'
	, function ($scope, Restful, Services, $location, Upload, $alertify, $timeout){
		var vm = this;
		vm.service = new Services();
		vm.category = {};
		var url = "api/Category/";
		var params = {pagination: 'yes'};
		function init(params){
			Restful.get(url, params).success(function(data){
				vm.categories = data;
				vm.totalItems = data.count;
				console.log(data);
			});
		};
		init(params);

		vm.clear = function(){
			vm.category = {};
			vm.getCategory();
			vm.picFile = '';
		};


		vm.getCategory = function(){
			Restful.get(url).success(function(data){
				vm.categoriesDropdown = data;
			});
		};

		vm.edit = function(params){
			vm.picFile = '';
			$('#categoryPopup').modal('show');
			var temp = angular.copy(params);
			console.log(params);
			vm.category.parent_id = temp.parent_id;
			vm.category.categories_name = temp.detail[0].categories_name;
			vm.category.sort_order = temp.sort_order;
			vm.category.categories_image = temp.categories_image;
			vm.category.id = temp.categories_id;
			vm.getCategory();
		};

		vm.save = function(){
			var data = {
				category: [{
					parent_id: vm.category.parent_id,
					sort_order: vm.category.sort_order,
					categories_image: vm.category.categories_image,
				}],
				detail: [
					{
						categories_name: vm.category.categories_name,
						language_id: 1
					},{
						categories_name: vm.category.categories_name,
						language_id: 2
					}
				]
			};
			console.log(vm.category);
			vm.isDisabled = true;
			if( vm.category.id ){
				Restful.put(url + vm.category.id, data).success(function(data){
					init(params);
					$('#categoryPopup').modal('hide');
					vm.service.alertMessage('<strong>Complete: </strong>Save Success.');
					vm.isDisabled = false;
					console.log(data);
				});
			}else{
				Restful.post(url, data).success(function(data){
					init(params);
					console.log(data);
					vm.service.alertMessage('<strong>Complete: </strong>Save Success.');
					$('#categoryPopup').modal('hide')
					vm.isDisabled = false;
				});
			}
		};

		vm.remove = function($index, params){
			$alertify.okBtn("Ok")
				.cancelBtn("Cancel")
				.confirm("<b>Waring: </b>If you delete this category it will " +
						"delete all product that use this category.", function (ev) {
					// The click event is in the
					// event variable, so you can use
					// it here.
					ev.preventDefault();
					Restful.delete( url + params.categories_id, params ).success(function(data){
						vm.disabled = true;
						vm.service.alertMessage('<strong>Complete: </strong>Delete Success.');
						vm.categories.elements.splice($index, 1);
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
			init(params);
		};


		//functionality upload
		vm.uploadPic = function(file) {
			console.log(file);
			if (file) {
				file.upload = Upload.upload({
					url: 'api/ImageUpload',
					data: {file: file, username: vm.username},
				});
				file.upload.then(function (response) {
					console.log(response);
					$timeout(function () {
						console.log(response);
						file.result = response.data;
						vm.category.categories_image = response.data.image;
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