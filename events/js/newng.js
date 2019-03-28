angular.module('eventApp',['ngSanitize','ngAnimate'])
	.controller('demoCtrl',['$scope',function($scope){

		firebase.database().ref('/Events').once('value',function(snap){
			$scope.flag=false
			$scope.$apply(function(){
				//branch,about,coordinators array,detail,name,prize array,rules array,
				var zz=snap.val()
				var e=[];
				for(var i in zz){
					if(zz[i].branch==branchname){
						e.push(zz[i]);
						
					}
				}
				console.log(e);
				var temp=[]
				var temp2=[]

				for(var j in e){
					if(e[j].prize.Firstyear)
						for(var i in e[j].prize){
							// console.log(i+"<br>"+e[j].prize[i])
							//Put every object in separate array that would be iterated
							temp.push(e[j].prize[i])
						}
				}
				for(var j in e){
					if(e[j].prize.firstyear)
						for(var i in e[j].prize){
							// console.log(i+"<br>"+e[j].prize[i])
							//Put every object in separate array that would be iterated
							temp2.push(e[j].prize[i])
						}
				}
				$scope.obb2=temp2
				$scope.obb=temp
				$scope.events=e;
				$scope.flag=true;
			
				$('.load-img').hide();
				$('#headline').show();
				$('.event-img').show();

			})
		})
			
	}])

	.filter('removeBrackets',function(){
		return function(x){
			x=x.replace(/\(|\)/g, '').replace(/&/g,"").replace(/'/g,"").replace(/!/g,"").replace(/,/g,"").split('.').join("");
			return x;
		}
	})

	.filter('html', ['$sce', function ($sce) { 
    return function (text) {
        return $sce.trustAsHtml(text);
    	};    
	}])
