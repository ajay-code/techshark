$(document).ready(function() {
	$(".slider #1").show("fade",1000);
	$(".slider #1").delay(5500).hide("slide",{direction:'left'},1000);

	var sc= $(".slider img").size();
	var count=2;

	setInterval(function  () {
		$(".slider #"+count).show("slide",{direction:'right'},500);
		$(".slider #"+count).delay(5500).hide("slide",{direction:'left'},1000);

		if(count == sc){
			count=1;
		}
		else{
			count=count + 1;
		}
	},7000);
	
});