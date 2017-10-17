$(function(){
	$("span#chat").css({
		opacity:"0.9",
		position:"absolute",
		display:"none"
	});
	$("span#chatMenu").mouseenter(function(){
		$("span#chat").fadeIn();
	}).mouseleave(function(){
		$("span#chat").fadeOut();
	}).mousemove(function(e){
		$("span#chat").css({
			// "top":e.pageY+10+"px",
			// "left":e.pageX+10+"px"
			"top": "-10px",
			"left": "25px"
		});
	});
});

$(function(){
	$("span#schedule").css({
		opacity:"0.9",
		position:"absolute",
		display:"none"
	});
	$("span#scheduleMenu").mouseenter(function(){
		$("span#schedule").fadeIn();
	}).mouseleave(function(){
		$("span#schedule").fadeOut();
	}).mousemove(function(){
		$("span#schedule").css({
			"top": "240px",
			"left": "25px"
		});
	});
});

$(function(){
	$("span#album").css({
		opacity:"0.9",
		position:"absolute",
		display:"none"
	});
	$("span#albumMenu").mouseenter(function(){
		$("span#album").fadeIn();
	}).mouseleave(function(){
		$("span#album").fadeOut();
	}).mousemove(function(){
		$("span#album").css({
			"top": "490px",
			"left": "25px"
		});
	});
});

$(function(){
	$("span#profile").css({
		opacity:"0.9",
		position:"absolute",
		display:"none"
	});
	$("span#profileMenu").mouseenter(function(){
		$("span#profile").fadeIn();
	}).mouseleave(function(){
		$("span#profile").fadeOut();
	}).mousemove(function(){
		$("span#profile").css({
			"top": "490px",
			"left": "280px"
		});
	});
});

$(function(){
	$("span#logout").css({
		opacity:"0.9",
		position:"absolute",
		display:"none"
	});
	$("span#logoutMenu").mouseenter(function(){
		$("span#logout").fadeIn();
	}).mouseleave(function(){
		$("span#logout").fadeOut();
	}).mousemove(function(){
		$("span#logout").css({
			"top": "490px",
			"left": "530px"
		});
	});
});




$(function(){
	$("span#login").css({
		opacity:"0.9",
		position:"absolute",
		display:"none"
	});
	$("span#loginMenu").mouseenter(function(){
		$("span#login").fadeIn();
	}).mouseleave(function(){
		$("span#login").fadeOut();
	}).mousemove(function(e){
		$("span#login").css({
			// "top":e.pageY+10+"px",
			// "left":e.pageX+10+"px"
			"top": "-10px",
			"left": "25px"
		});
	});
});

$(function(){
	$("span#resister").css({
		opacity:"0.9",
		position:"absolute",
		display:"none"
	});
	$("span#resisterMenu").mouseenter(function(){
		$("span#resister").fadeIn();
	}).mouseleave(function(){
		$("span#resister").fadeOut();
	}).mousemove(function(){
		$("span#resister").css({
			"top": "240px",
			"left": "25px"
		});
	});
});