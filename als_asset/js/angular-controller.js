var app=angular.module('myApp', []);
//app.controller('ctrl', ['$scope', '$http', '$timeout', '$window', function($scope, $http, $timeout) {
app.controller('ctrl', function($scope, $http, $timeout, $window){   
    
    $scope.jawaban = [];
    var base_url = function(){
        return $("base").attr('href');
    }
   
    var clearMsg = function(){
        $scope.msg = "";
        $scope.name = "";
        $scope.alamat = "";
        $scope.no_hp = "";
        $scope.email = "";
        $scope.tgl_lahir = "";                 
    }  
    
    $scope.loadView = function(){
        $http.get('./php/tampilCustomer.php')
                .then(function(data){
                    $scope.datas = data.data;
        })
    } 
    
    $scope.updatedata = function(){
        $http.post("./php/temp_updateUser.php", {'id':$scope.edit_ids, 'name':$scope.edit_name, 'alamat':$scope.edit_alamat, 'no_hp':$scope.edit_no_hp, 'email':$scope.edit_email, 'tgl_lahir':$scope.edit_tgl_lahir })
                .then(function(){
                    $scope.msg = "Berhasil disimpan"; 
                    $timeout(clearMsg, 700);
                    $scope.loadView();
        })
    }     
    
    var clearNotif = function (){
        $scope.notif = "";
    }
    $scope.addKuesioer = function(bundlenya){
        $http.post('./php/buat_kuesioner.php?aksi=addKuesioer', {'topic': bundlenya})
                .then(function(){
                    $scope.LoadBundle();
                    $scope.notif = 'berhasil menambahkan pilihan kuesioner';
                    $scope.bundlenya = "";
                    $timeout(clearNotif, 1000);
        })     
    }  
    $scope.simpanKuesioner = function(bundlenya){
        data = {
            'ID': '',
            'bundle_id': $scope.bundle_id,
            'pertanyaan1': $scope.pertanyaan1,
            'pertanyaan2': $scope.pertanyaan2,
            'pertanyaan3': $scope.pertanyaan3,
            'pertanyaan4': $scope.pertanyaan4,
            'pertanyaan5': $scope.pertanyaan5
        }
        $http.post('./php/buat_kuesioner.php?aksi=simpanKuesioner',  data)
                .then(function(){
                    
        })     
    } 
    
    $scope.loadMenuAccess = function(){
        $http.get(base_url()+'menu/api_read_menu_access')
                .then(function(response){
//                    $scope.level = $("base").attr('href');
                    $scope.MenuList = response.data;
        })
        
    }
    
    
    
    
   
});
//}]);