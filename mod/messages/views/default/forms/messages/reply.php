<?php
/**
 * Reply form
 *
 * @uses $vars['message']
 */

// fix for RE: RE: RE: that builds on replies
$reply_title = $vars['message']->title;
if (strncmp($reply_title, "RE:", 3) != 0) {
	$reply_title = "RE: " . $reply_title;
}

echo elgg_view('input/hidden', array(
	'internalname' => 'recipient_guid',
	'value' => $vars['message']->fromId,
));
?>

<div>
	<label><?php echo elgg_echo("messages:title"); ?>: <br /></label>
	<?php echo elgg_view('input/text', array(
		'internalname' => 'subject',
		'value' => $reply_title,
	));
	?>
</div>
<div>
	<label><?php echo elgg_echo("messages:message"); ?>:</label>
	<?php echo elgg_view("input/longtext", array(
		'internalname' => 'body',
		'value' => '',
	));
	?>
</div>
<div>
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('messages:send'))); ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$("#messages-show-reply").click(function() {
		$('#messages-reply-form').slideToggle('medium');
	});
});
	
</script>