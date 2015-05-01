<?php
	session_start();
	header("Content-type: application/x-javascript");
?>
<!--
	$(document).ready( function() {
		$('textarea.comment2').focus(function () {
			if($(this).val() == "Comment") $(this).val("");
		});
		
		$('.nerdyLink').click(function(){
			$.post("/vote2.php",{nerdy: "1", dateTime: $(this).children('.dateDiv').html()});
			$(this).fadeOut("fast", function() {
				$(this).before('Nerdy.');
			});
			$(this).next('.nerdyValue').html(parseInt($(this).next('.nerdyValue').html()) + 1);
		});
		
		$('.failLink').click(function(){
			$.post("/vote2.php",{fail: "1", dateTime: $(this).children('.dateDiv').html()});
			$(this).fadeOut("fast", function() {
				$(this).before('Fail.');
			});
			$(this).next('.failValue').html(parseInt($(this).next('.failValue').html()) + 1);
		});
		
		$('.formSubmit').live("click", function() {
			var aids = this;
			$(this).parents().siblings('.loadDiv').slideDown("slow", function() {
				$(this).next('.expandMe').children('.expandComments').slideUp();
				$(this).next('.expandMe').children('.commentForm').slideUp();
			});
			$.post("/comment.php", {storyDate: $(this).parents().siblings('.loadDiv').next('.expandMe').children('.commentForm').children('input[name=dateTime]').val(), comment: $(this).parents().siblings('.loadDiv').next('.expandMe').children('.commentForm').children('textarea').val(), name: '<?php echo $_SESSION[user]; ?>'},
				function(data) {
					$(aids).parents().siblings('.loadDiv').slideUp("slow", function() {
						$(this).next('.expandMe').children('.expandComments').html("<br />" + data);
						$(this).next('.expandMe').children('.expandComments').slideDown();
					});
			});
		});
		
		$('.commentDelete').live("click", function() {
			var aids = this;
			$(this).parents().siblings('.loadDiv').slideDown("slow", function() {
				$(this).next('.expandMe').children('.expandComments').slideUp();
			});
			$.post("/delete.php", {storyDate: $(this).parents().siblings('.loadDiv').next('.expandMe').children('.commentForm').children('input[name=dateTime]').val(), postDate: $(this).children('.postDate').html(), name: '<?php echo $_SESSION[user]; ?>'},
				function(data){
					$(aids).parents().siblings('.loadDiv').slideUp("slow", function() {
						$(this).next('.expandMe').children('.expandComments').html("<br />" + data);
						$(this).next('.expandMe').children('.expandComments').slideDown();
						$(this).next('.expandMe').children('.commentForm').slideDown();
					});
				}
			);
		});
		
		$('.plus').live("click", function() {
			$(this).parent().fadeOut("fast", function() {
				$(this).parents().children('.hiddenImage').fadeIn();
			});
			$(this).parent().siblings('.voteMinus').fadeOut("fast");
			$(this).parent().siblings('.voteCount').html(parseInt($(this).parent().siblings('.voteCount').html()) + 1);
			$.post("/vote3.php", {storyDate: $(this).parents().siblings('.hideStoryDate').html(), postDate: $(this).parents().siblings('.hidePostDate').html(), positive: true}, function(data) { console.log(data); });
		});
		
		$('.minus').live("click", function() {
			$(this).parent().fadeOut("fast", function() {
				$(this).parents().children('.hiddenImage').fadeIn();
			});
			$(this).parent().siblings('.votePlus').fadeOut("fast");
			$(this).parent().siblings('.voteCount').html(parseInt($(this).parent().siblings('.voteCount').html()) - 1);
			$.post("/vote3.php", {storyDate: $(this).parents().siblings('.hideStoryDate').html(), postDate: $(this).parents().siblings('.hidePostDate').html(), negative: true}, function(data) { console.log(data); });
		});
		
		$('.subscribe').click(function(){
			$.post("/subscribe.php",{subscribe: 1, user: '<?php echo $_SESSION[user]; ?>', dateTime: $(this).children('.dateDiv').html()});
			$(this).fadeOut("fast", function() {
				$(this).before('Subscribed');
			});
		});
		
		$('.unsubscribe').click(function(){
			$.post("/subscribe.php",{unsubscribe: 1, user: '<?php echo $_SESSION[user]; ?>', dateTime: $(this).children('.dateDiv').html()});
			$(this).fadeOut("fast", function() {
				$(this).before('Unsubscribed');
			});
		});
	});
-->