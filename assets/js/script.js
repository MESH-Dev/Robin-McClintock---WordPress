jQuery(document).ready(function($){
	$("div#scrollableArea").smoothDivScroll({
		autoScrollingMode: "",
		setupComplete: function(eventObj, data) {
			$('.scrollableArea').width('20000000em');
			$('#scrollableArea').addClass('max');
			$scrollableWidth = [];
			$('.work-row').each(function(){
				$width = $(this).width();
				$scrollableWidth.push($width);
			});
			console.log($scrollableWidth);
			$sW = Math.max.apply(Math,$scrollableWidth);
			$('#scrollableArea').removeClass('max');
			$('.scrollableArea').width($sW);
			console.log(data);
		}
	});
});