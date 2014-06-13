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
	<?php 
		$location = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		if ($location) {
			print "<div class=\"back-button\"><a href=\"$location\">Back</a></div>";
		} else {
			print "Nowhere to go back to, so no back button .. ";
		}
	?>
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
		$datetime = $event['Start Date'] . (isset($event['Start Time']) ? '<br/>' . $event['Start Time'] . '<br/>' : '');
		// $datetime .= isset($event['End Date']) ? 'until<br/>' . $event['End Date'] . '<br/>' . $event['End Time'] : '';
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
		$description = $event['Description'];
		$location = $event['Location'];
		$datetime = $event['Start Date'] . (isset($event['Start Time']) ? ' ' . $event['Start Time'] . '' : '');
		// $datetime .= isset($event['End Date']) ? ' - ' . $event['End Date'] . ' ' . $event['End Time'] : '';
		?>
				<a href="#event-<?php echo $id; ?>" name="info-<?php echo $id; ?>">
					<img src="images/380x245/<?php echo $filename; ?>?<?php echo $id; ?>" />
					<div class="text">
						<h2><?php echo $eventname; ?></h2>
						<?php echo $datetime; ?><br/>
						<?php echo $location; ?><br/>
						<div class="description">
							<?php echo $description; ?>
							<p class="organization"><?php echo ($organization) ? "Presented by $organization" : ""; ?></p>
						</div>
					</div>
				</a>
		<?php
}
?>
			</div>
		</div>
	</body>
</html>
