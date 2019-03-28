<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Ojass'19 | Events</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../img/small_black.png">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato|Raleway|Bree+Serif" rel="stylesheet"> 
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/updated.css">
    <link rel="stylesheet" type="text/css" href="css/scroll/clean-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/scroll/dabblet.css">
    <link rel="stylesheet" type="text/css" href="css/events.css">
    <link rel="stylesheet" type="text/css" href="../css/particles.css">
    
    

    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>

<!-- Custom Scripts -->
    <script type="text/javascript" src="js/firebase.js"></script>

    <script type="text/javascript">
          
          var branches={
            'AAKRITI':'../img/icons/akriti-01.png',
            'Armageddon':'../img/icons/armageddon-01.png',
            'ARTHASHASTRA':'../img/icons/arthashastra-01.png',
            'AVARTAN':'../img/icons/avartan-01-01.png',
            'Circuit_House': '../img/icons/CircuitHouse-01.png' ,
            'Deus-X-Machina': '../img/icons/deus-x-machina-01.png' ,
            'EXPOSICION': '../img/icons/exposition.png',
            'Live CS':'../img/icons/liveCS-01.png',
            'nscent':'../img/icons/NSCET-01.png',
            'Neo Drishti':'../img/icons/neodrishti-01.png',
            'No Ground Zone':'../img/icons/NoGroundZone-01.png',
            'Paraphernalia':'../img/icons/paraphernalia-01.png',
            'PRAYAS':'../img/icons/prayas-01.png',
            'Produs':'../img/icons/akriti-01.png',
            'Rise of Machines':'../img/icons/riseofmachines-01.png',
            'Silicon Valley':'../img/icons/siliconvalley-01.png',
            'VishwaCodegenesis':'../img/icons/vishwacodegenesis-01.png',
            'School Events':'../img/icons/SCHOOL%20EVENTS-01.png'
          }



        </script>
</head>
<body ng-app="eventApp">
  	<!-- particles.js container --> 
    <div id="particles-js"></div>
  
        
    <!-- <div data-0="background-position:0px 0px;" data-end="background-position:0px -15000px;" id="stars"></div> -->
    <a class="backtotop" href="#top"></a>
    <div class="container-fluid" ng-controller="demoCtrl">
      <div>
        <div class="row">
          <div class="col-md-4"><a href="/"><img src="../img/small.png" style="width: 90px;"></a></div>
          <div class="col-md-4 text-center"> <h4 style="font-family: Bree Serif !important; font-style:normal;"><?php echo $_GET['branch']; ?></h4></div>
          <div class="col-md-4">
            <!-- Globe Placing here -->
            
          </div>
        </div>

        <div class="row img-row">
          <div class="col-md-12 text-center imm"></div>
        </div>
        <div ng-repeat="event in events" class="event-wrapper" id="{{event.name.split(' ').join('') | removeBrackets}}" style="display:none;">
        <div class="row">
          <div class="col-md-3 sidebar">
            <nav class="menu-navigation-dark sidebarmenu" style="position: absolute;left:20px;">
              <br>
              <a href="#" style="position: relative;right:26px;" name='about'><i class="fa fa-address-book-o" ></i><span >About</span></a><br>
                  <a href="#" style="position: relative;right:26px;" name='detail'><i class="fa fa-info"></i><span>Details</span></a><br>
                  <a href="#" style="position: relative;right:26px;" name='prizes'><i class="fa fa-trophy"></i><span>Prizes</span></a><br>
                  <a href="#" style="position: relative;right:26px;" name='rules'><i class="fa fa-book"></i><span>Rules</span></a><br>
                  <a href="#" style="position: relative;right:26px;" name='coordinators'><i class="fa fa-users"></i><span>Co-ordinators</span></a><br>

           
          </nav>
          </div>
          <div class="col-md-9 mainarea">
            <div class="row text-center">
              <div class="col-md-12" id='stuffname'></div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="details">
                  
                  <!-- Tabs for 1st Sub Event -->
                  <div class="{{event.name.split(' ').join('') | removeBrackets}} about" style="display:none;">
                    
                    <h4 class="text-center" style="text-decoration: underline;">About</h4>
                    
                    <div ng-bind-html="event.about | html" class="txtdetail"></div>
                  </div>

                  <div class="{{event.name.split(' ').join('') | removeBrackets}} detail" style="display:none;">
         
                    <h4 class="text-center" style="text-decoration: underline;">Details</h4>
                    
                    <div ng-bind-html="event.detail | html" class="txtdetail"></div>
                  </div>

                  <div class="{{event.name.split(' ').join('') | removeBrackets}} rules" style="display:none;">
                    
                    <h4 class="text-center" style="text-decoration: underline;">Rules</h4>
                   
                    <div class="txtdetail">
                      <ol>
                      <li ng-repeat="rule in event.rules">
                          
                          <div ng-bind-html="rule.text | html"></div>
                          
                      </li>
                    </ol>
                    </div>
                  </div>

                  <div class="{{event.name.split(' ').join('') | removeBrackets}} prizes" style="display:none;">
                
                    <h4 class="text-center" style="text-decoration: underline;">Prizes</h4>
                   
                        
                   
                        <div class="txtdetail">
                          <!-- Condition for normal Prizes -->
                    <ol ng-if="!event.prize.Firstyear && !event.prize.firstyear">
                      <li ng-repeat="(key,val) in event.prize">{{key}}: {{val}}</li>
                    </ol>

                    <!-- Condition for High Voltage Concepts in Ciruit_House -->
                    <div ng-if="event.prize.Firstyear">

                      <b>First year</b>: <br>
                      <li ng-repeat="(key,val) in obb[0]">
                        {{key}} : {{val}}
                      </li>

                      <b>Second year</b>: <br>
                      <li ng-repeat="(key,val) in obb[1]">
                        {{key}} : {{val}}
                      </li>

                      <b>Third year</b>: <br>
                      <li ng-repeat="(key,val) in obb[2]">
                        {{key}} : {{val}}
                      </li>

                      <b>Total</b>:{{obb[3]}}
                     
                    </div>

                    <!-- Condition for WHO AM I (WHI) in Ciruit_House -->
                    <div ng-if="event.prize.firstyear">

                      <b>First year</b>: <br>
                      <li ng-repeat="(key,val) in obb2[0]">
                        {{key}} : {{val}}
                      </li>

                      <b>Second year</b>: <br>
                      <li ng-repeat="(key,val) in obb2[1]">
                        {{key}} : {{val}}
                      </li>
                      
                      <b>Total</b>:{{obb2[2]}}
                     
                    </div>
                        </div>

                  </div>
                  <div class="{{event.name.split(' ').join('') | removeBrackets}} coordinators" style="display:none;">
                  
                    <h4 class="text-center" style="text-decoration: underline;">Co-ordinators</h4>
                    
                    <div class="row text-center" ng-repeat="c in event.coordinators">
                      <div class="col-md-6">{{c.name}}</div>
                      <div class="col-md-6">{{c.phone}}</div>
                    </div>
                  </div>
</div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row" >
          <div class="col-md-1"></div>
          <div class="col-md-9" style="position: fixed;bottom:30px;left:200px;">
            <br>
            <nav class="menu-navigation-dark" id='bottomMenu' class="fade-element-in" ng-if="flag" ng-cloak>
                    <a style="word-wrap: break-word;" ng-repeat="event in events" href="#" class="event-name" name="{{event.name.split(' ').join('').split('.').join('')}}">
                      <span >{{ event.name }}</span></a>
            </nav>
            <center style="position: relative;top:20px;">
              
              <h4 class="fade-element-in" ng-if="!flag"><span>Loading...</span> 
                <br>
                <img src="img/loader.svg">
              </h4>
            </center>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>

  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
  <!-- <script src="http://threejs.org/examples/js/libs/stats.min.js"></script> -->
	<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='../js/particles.js'></script>

</body>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
          var branchname= '<?php echo $_GET['branch']; ?>';
          var html='<img src='+branches[branchname]+' class="event-img">'; 
          $('.imm').html(html);

          $("a").mouseenter(function(){
              $("<audio></audio>").attr({ 
                'src':'../audio/pi.mp3', 
                'volume':1,
                'autoplay':'autoplay'
              }).appendTo("body");
            });
          $(document).on('mouseenter','#bottomMenu > a',function(){
            $("<audio></audio>").attr({ 
                'src':'../audio/pi.mp3', 
                'volume':1,
                'autoplay':'autoplay'
              }).appendTo("body");
          })
    </script>

    <!-- Vendor Scripts -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.5.1/angular-sanitize.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.0/angular-animate.min.js"></script>
       
        <script type="text/javascript" src="js/events.js"></script>
        <script type="text/javascript" src="js/newng.js"></script>


</html>