<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Ojass '19 | FAQs</title>
		<meta name="description" content="Blueprint: Responsive Icon Grid" />
		<meta name="keywords" content="icon grid, hover, responsive, portfolio, template" />
		<meta name="author" content="Codrops" />

		<link rel="stylesheet" href="css/materialize.css">
		<link rel="shortcut icon" href="../img/logo_black.png">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />

		<script src="js/modernizr.custom.js"></script>
		<style>
			.cbp-ig-icon img {
				width:224px;
				height: 224px;
			}
		
		</style>


	</head>
	<body style="background:#2C2E43;" ng-app="faqApp"> 
		<div class="container ng-cloak" ng-controller="demo">
		

			<header class="clearfix">
			<a class="brand-logo" href="/"><img style="width:90px;position:relative;float:left;" src="../img/small.png"></a>
				<h1>Frequently Asked Questions</h1>
				<nav>
					<a href="/" class="bp-icon bp-icon-prev" data-info="Home"><span>Home</span></a>
				</nav>
			</header>

			<div class="material">
				<div class="row">
					<div class="col s12 center-align" >
						<div class="loading" ng-if="!flag">
							<h5 style="color:white;font-family: Raleway;">Loading...</h5><img src="../img/loader.svg">
						</div>

						<div class="row faq" ng-if="flag">
							<div class="col s6" ng-repeat="i in faq">
								<div class="content">
									<a class="cardd" href="#!" ng-if='flag'>
									  <div class="frontt" style="background-image: url(//sosurce.unsplash.com/300x401);">
									    <p class="before1">{{i.ques}}</p>
									  </div>
									  <div class="back">
									    <div>
									      <p class="after1">{{i.ans}}</p>


									    </div>
									  </div>
									</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>

		<script type="text/javascript"
		 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>

		 <script type="text/javascript">
		 	var config = {
  apiKey: "AIzaSyCkzQoWfPO7H4KPfTvX551uSSUu-OPh768",
  authDomain: "ojass-19.firebaseapp.com",
  databaseURL: "https://ojass-19.firebaseio.com",
  projectId: "ojass-19",
  storageBucket: "ojass-19.appspot.com",
  messagingSenderId: "549832382038"
};
firebase.initializeApp(config);

angular.module('faqApp',[])
		.controller('demo',['$scope',function($scope){
			$scope.flag=false;
			firebase.database().ref('/Faq').once('value',function(snap){
				$scope.$apply(function(){
					var zz=snap.val();
					$scope.faq=zz;
					$scope.flag=true;
				})
			})
		}])
  
  
		 </script>
	</body>
</html>
