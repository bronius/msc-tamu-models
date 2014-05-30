<?php
$events = array();
include 'program-events-src.php';
?>
<html>
	<head>
		<title>Model for Program Events UI</title>
		<link rel="stylesheet" href="css/program-events.css" media="all" />
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/program-events.js"></script>
	</head>
	<body>
	<?php //var_dump($files); ?>
	<?php //var_dump($events); ?>
		<h1>Model for Program Events</h1>
		<div id="events-ui">
			<div id="thumbs">
<?php foreach($events as $index => $event) {
		$id = $index;
		$filename = $event['Image'];
				print "<a href=\"#event-$id\" name=\"thumb-$id\"><img src=\"images/160x103/$filename?$id\" /></a>\n";
}
?>
			</div>
			<div id="times">
<?php foreach($events as $index => $event) {
		$id = $index;
		$filename = $event['Image'];
		$datetime = $event['Start Date'] . (isset($event['Start Time']) ? ' ' . $event['Start Time'] . '<br/>' : '');
		$datetime .= isset($event['End Date']) ? 'until<br/>' . $event['End Date'] . '<br/>' . $event['End Time'] : '';
				print "<a href=\"#event-$id\" name=\"time-$id\">$datetime</a>\n";
}
?>
			</div>
			<div id="details">
<?php foreach($events as $index => $event) {
		$id = $index;
		$filename = $event['Image'];
		$eventname = $event['Event Name'];
		$organization = $event['Org Name'];
		$location = $event['Location'];
		$datetime = $event['Start Date'] . (isset($event['Start Time']) ? ' ' . $event['Start Time'] . '' : '');
		$datetime .= isset($event['End Date']) ? ' - ' . $event['End Date'] . ' ' . $event['End Time'] : '';
		?>
				<a href="#event-<?php echo $id; ?>" name="info-<?php echo $id; ?>">
					<img src="images/380x245/<?php echo $filename; ?>?<?php echo $id; ?>" />
					<div class="text">
						<?php echo $organization; ?>:<br/>
						<?php echo $datetime; ?><br/>
						<?php echo $eventname; ?><br/>
						<?php echo $location; ?>
					</div>
				</a>
		<?php
}
?>
			</div>
		</div>
	</body>
</html>
