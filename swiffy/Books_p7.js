/**
 * @author Alisak Sanavongsay
 */
/* <![CDATA[ */
	$('head').append('<style type="text/css">#content .hidden {display:none} #instructions {display:none}</style>');
	function feedback(){
		var response = $('#responseText').val();
		$('#interactivity').html('<p>Your response was <span style="color:#F60;font-style:italic">' + response + '</span>. How did you do? Click the button below to check your answer.</p><p><input type="button" id="showButton" value="Show Answers" />\<script type="text/javascript"\>$(\'#showButton\').click(show);\</script\></p>');
	}
	function show(){
		$('#interactivity').html('<p>Great job! Click the forward arrow at the top to go to the next page.</p>')
		$('.hidden').fadeIn('slow');
	}
/* ]]> */
