<?php include("common.php"); ?>
<?php echo(our_header()); ?>
<?php echo(title_and_navigation(basename($_SERVER["SCRIPT_NAME"]))); ?>

<div id="content">
  <a href="graphics/ppr_main.png">
    <img src="graphics/ppr_main.png" width="250 px" class="floatRight">
  </a>
  <h2>PoProofRead homepage</h2>
  <p>PoProofRead is a simple application for fast and easy
    proofreading and commenting of po and podiff files. PoProofRead is
    free software released under
    the <a href="http://www.gnu.org/licenses/gpl.html">GNU GPL version
    3</a> license.</p>
  <p>In the work with software translations it quickly becomes
    apparent, that in order to achieve high quality it is an absolute
    necessity to proofread the translations. While it is possible to
    do proofreading entirely in a text editor, the need quickly arises
    for small convenience functions that the editors does not provide
    per default.</p>
  <p><b>Enter PoProofRead.</b> To make the proofreading process as
    efficient as possible PoProofRead implements the following
    functions:</p>
  <ul>
    <li>One key navigation though the proofreading</li>
    <li>Non-activated editing of the comments (i.e. as soon as you
    know that you wish to make a comment you just start typing)</li>
    <li>Save you proofreading work and resume at the same point next
    time</li>
    <li>Support for different character sets and bookmarks</li>
    <li>Export to clipboard functionality for quickly inserting the
    result e.g. in an email program
  </ul>
  <p>Even though PoProofRead was written with translations work in
    mind is should be useful for other kinds of proofreading. The only
    requirement for text that you want to work with is that it consist
    of blocks of text separated by blank lines e.g. like certain
    subtitle formats.</p>
</div>

<?php echo(footer()); ?>


