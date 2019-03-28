<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="test.css">
    <style>
        .nav-tab {
            width:19%;
        }

        .content-tab {
            height : 260px;
            overflow-y : auto;
        }

        .btn-clicked {
            background: #e5e5e5;
            -webkit-box-shadow: inset 0px 0px 5px #c1c1c1;
                -moz-box-shadow: inset 0px 0px 5px #c1c1c1;
                    box-shadow: inset 0px 0px 5px #c1c1c1;
            outline: none;
        }
       
    </style>
</head>
<body>
    <div class="row">
    <div class="col-md-12"></div>
    <div class="col-md-12">
    
    <main>
    

    <input id="tab1" type="radio" name="tabs" checked>
    <label for="tab1" class="nav-tab">About</label>

    <input id="tab2" type="radio" name="tabs">
    <label for="tab2" class="nav-tab">Details</label>

    <input id="tab3" type="radio" name="tabs">
    <label for="tab3" class="nav-tab">Prizes</label>

    <input id="tab4" type="radio" name="tabs">
    <label for="tab4" class="nav-tab">Rules</label>

    <input id="tab5" type="radio" name="tabs">
    <label for="tab5" style="width:22%" class="nav-tab">Co-ordinators</label>





    <section id="content1">
        <div class="content-tab" id="tab-about"></div>
    </section>

    <section id="content2">
        <div class="content-tab" id="tab-detail"></div>
    </section>

    <section id="content3">
        <div class="content-tab" id="tab-prize"></div>
    </section>

    <section id="content4">
        <div class="content-tab" id="tab-rules"></div>
    </section>

    <section id="content5">
        <div class="content-tab" id="tab-coordinators"></div>
    </section>

    </main>
    </div>

    <div class="col-md-12" id="">
        <div class="button-group text-center" id="event-nav">
            
        </div>   
    </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
    <script src="js/firebase.js"></script>
    
    <script>
        var branchname= "<?php echo $_GET['branch']; ?>";
        console.log(branchname);

        var e=[];
        var coord=[];
        var prize=[];
        var rule=[];

        firebase.database().ref('/Events').once('value',function(snap){
            var zz=snap.val();
            console.log(zz);

            
            for(var i in zz ) {
                //console.log(zz[i].branch);
                if(zz[i].branch == branchname) {
                    var z = zz[i];
                    e.push(zz[i]);
                }
            }
            //console.log(e);
            var html1="",html2,html3="";
            for( var i in e) {
                var y= e[i].coordinators;
                for(var j in y) {
                    html1+= '<p><strong>'+y[j].name+"</strong> : "+y[j].phone+ "</p>";      
                }
                coord.push(html1);
                html1="";

                var y = e[i].prize;
                html2="<ul>";
                for( var j in y ) {
                    if(typeof y[j]=== 'object' && y[j]!= null) {
                        var yy = y[j];
                        html2+="<li><strong>"+j+"</strong></li><ul>"
                        for( var k in yy) {
                            html2+="<li>"+k+" : "+yy[k] + "</li>";
                        }
                        html2+='</ul><br/>'
                    }
                    else
                        html2+="<li><strong>"+j+"</strong> : "+y[j] + "</li>";
                }
                html2+="</ul>"
                prize.push(html2);
                
                

                var y = e[i].rules;
                for(var j in y) {
                    html3+="<p>"+y[j].text+"</p>";
                }
                rule.push(html3);
                html3="";


            }

            var html="";
            for( i=0; i<e.length; i++) {
                html += '<button class="btn btn-lg btn-default" onclick="selectEvent(this.id)" id='+i+'>'+ e[i].name +'</button>';
                $('#event-nav').html(html);
            };

            
        });
        console.log(coord);
        console.log(rule);

        function selectEvent(id) {
            console.log(e[id].about);
            $("#tab-about").html(e[id].about);
            $("#tab-detail").html(e[id].detail);
            $("#tab-prize").html(prize[id]);
            $("#tab-rules").html(rule[id]);
            $("#tab-coordinators").html(coord[id]);

            $(".btn-clicked").removeClass("btn-clicked");
            $("#"+id).addClass("btn-clicked");
        }
        //console.log(e);

    
    </script>
</body>
</html>