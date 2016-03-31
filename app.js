var app = angular.module('app', ['ngRoute']);


//定义一个服务
app.factory('countryService', function($http) {
    return {
        getCountries: function() {
            return $http.get("services/getCountries.php");
        },
        
        getStates: function(countryCode) {
            return $http.get("services/getStates.php?countryCode="+
            encodeURIComponent(countryCode));
        }
    }
});
app.controller("CountryController", function(countryService) {
    this.logo = "http://www.cnblogs.com/images/logo_small.gif";

    //1.直接初始化数据
    // this.countries = [
    //     {
    //         name: "Germany",
    //         code: "de",
    //         states: [{ name: 'Bavaria' }, { name: "Berlin" }]
    //     },
    //     {
    //         name: "United States",
    //         code: "us",
    //         states: [{ name: 'Bavaria' }, { name: "Berlin" }]
    //     },
    //     {
    //         name: "China",
    //         code: "cn",
    //         states: [{ name: 'jiangsu' }, { name: "jiangxi" }]
    //     }
    // ];

    //2.在controller里面调用$http请求
    // var that = this;

    // $http({
    //     method: "GET",
    //     url: "services/getCountries.php"
    // }).success(function(data) {
    //     //this.countries=data;//这里的this是全局windows对象
    //     that.countries = data;
    // });

    //3.将$http请求放到service中

    var that = this;
    countryService.getCountries().success(function(data) {
        that.countries = data;
    });




});

// app.controller('StateController', function() {

// });

// app.directive('stateView', function() {
//     return {
//         restrict: 'E',
//         templateUrl: "state-view.html",
//         controller: function() {
//             this.addStateTo = function(country) {
//                 if (!country.states) {
//                     country.states = [];
//                 }
//                 country.states.push({ name: this.newState });
//                 this.newState = "";
//             }
//         },
//         controllerAs: 'stateCtrl'
//     }
// });

app.config(function($routeProvider){
    $routeProvider.when('/states/:countryCode',{
        templateUrl:"state-view.html",
        controller:function($routeParams,countryService){
            this.params=$routeParams;
            var that=this;
            
            countryService.getStates(this.params.countryCode||'').success(function(data){
                that.states=data;
                
            });
            
            this.addStateTo = function(country) {
                if (!this.states) {
                    this.states = [];
                }
                this.states.push({ name: this.newState });
                this.newState = "";
            }
        },
        controllerAs:'stateCtrl'
    });
});