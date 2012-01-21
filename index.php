<?php include("common.php"); ?>
<?php echo(our_header()); ?>
<?php echo(title_and_navigation(basename($_SERVER["SCRIPT_NAME"]))); ?>
      <div id="content">
	<h2>PyG3T and PoProofRead news</h2>
  
<?php
$pop_feed = "http://feeds.launchpad.net/poproofread/announcements.atom";
$pyg3t_feed = "http://feeds.launchpad.net/pyg3t/announcements.atom";
$feed = new BlogFeed($pop_feed);
$feed->BlogFeed($pyg3t_feed);
$feed->GenerateHtml(4);
?>
      </div>


    
<?php echo(footer()); ?>


