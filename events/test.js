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