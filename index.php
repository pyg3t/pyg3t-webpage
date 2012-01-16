<?php include("common.php"); ?>
<?php echo(our_header()); ?>
<?php echo(title_and_navigation()); ?>

      <div id="content">
	<h2>PyG3T and PoProofRead news</h2>
  
      <?php
      $feed = new BlogFeed('http://feeds.launchpad.net/poproofread/announcements.atom');
      $feed->BlogFeed('http://feeds.launchpad.net/poproofread/announcements.atom');
      $feed->GenerateHtml(4);
      ?>
      </div>
    
<?php echo(footer()); ?>


