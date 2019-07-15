jQuery(document).ready(function($) {
	$("#info").attr('width', $(window).width());
	jQuery(window).scroll(function() {
		var doc = document.documentElement;
		var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
		var heightwin = $(window).height();

		var heightdoc = $(document).height();
		var percent = top/(heightdoc-heightwin)*100;
		$(".bar").attr('style', 'width:'+percent+"%");
		//console.log(percent);
		});
	$(".bar-bg").attr('style', 'min-width:'+$(window).width());
	$("#fbshare").click(function(){
		var url = "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fkhanhkid.github.io%2Fbanhtrang";
		var width = 550;
		var height = 650;
		var left = parseInt((screen.availWidth/2) - (width/2));
		var top = parseInt((screen.availHeight/2) - (height/2));
		var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
		myWindow = window.open(url, "subWind", windowFeatures);
	});
});
