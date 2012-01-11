<?php

$tab = "  ";

function our_header(){
  echo("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n" .
       "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en-US\">\n" .
       "  <head>\n" .
       "    <title>Homepage for pyg3t and PoProofRead</title>\n" .
       "    <link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" />\n" .
       "  </head>\n" .
       "  <body>\n"
       );
}

function title_and_navigation(){
  global $tab;
  $menu = array(array("Home" => "index-php"),
		array("Pyg3t" => "pyg3t_front.php"),
		array(array("History" => "pyg3t-history.php"),
		      array("News" => "pyg3t-news-php")
		      ),
		array("PoProofRead" => "ppr_front.php"),
		array(array("History" => "ppr-history.php"),
		      array("News" => "ppr-news-php")
		      ),
		array("Last item" => "nonexisting.php")
		);

  
  echo("    <div id=\"container\">\n" .
       "      <div id=\"top\">\n" .
       "        <h1>Homepage for pyg3t and PoProofRead</h1>\n" .
       "      </div>\n" .
       "      <div id=\"leftnav\">\n");
  menu(array($menu), 4);
  echo("      </div>\n" . 
       "      <!-- HERE BEGINS THE CODE FOR THIS PAGE -->\n");
}

function menu($menu, $level){
  global $tab;
  foreach($menu as $el){
    if (gettype($el[0]) == "array"){
      echo(str_repeat($tab, $level) . "<ul>\n");
      menu($el, $level);
      echo(str_repeat($tab, $level) . "</ul>\n");
      } else {
      foreach($el as $key=>$value){
	echo(str_repeat($tab, $level+1) . "<li>" . $key . "</li>\n");
      }
    }
  }
}

function footer(){
  echo("      <!-- HERE ENDS THE CODE FOR THIS PAGE -->" . 
       "      <div id=\"footer\">\n" . 
       "        <address>\n" .
       "          <a href=\"mailto:k.nielsen81@gmail.com\">Kenneth Nielsen</a>\n" .
       "          <a href=\"mailto:asklarsen@gmail.com\">Ask Hjorth Larsen</a>\n" .
       "        </address>\n" .
       "      </div>\n" .
       "    </div>\n" .
       "  </body>\n" .
       "</html>");
}

?>
