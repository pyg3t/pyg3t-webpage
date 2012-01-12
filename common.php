<?php

$tab = "  ";

/* A utility function to print a line at a specific level of indentation */
function p($level, $string){
  global $tab;
  echo(str_repeat($tab, $level) . $string);
}

/* Print out the header */
function our_header(){
  p(0, "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"" .  
    "\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n");
  p(0, "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en-US\">\n");
  p(1, "<head>\n");
  p(2, "<title>Homepage for PyG3T and PoProofRead</title>\n");
  p(2, "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" />\n");
  p(1, "</head>\n");
  p(1, "<body>\n");
}

/* Print out the title and the navigation bar */
function title_and_navigation(){
  global $tab;
  /* The menu is generated from $menu variable. A node that contains more menu
     content is represented by an array and a node that is a link is represented
     by an associative array where the key is the name and value is the target */
  $menu = array(array("Home" => "index.php"),
		array("Pyg3t" => "pyg3t_home.php"),
		array(array("Install" => "pyg3t_install.php")),
		array("PoProofRead" => "ppr_home.php"),
		array(array("Install" => "ppr_install.php")),
		array("Donate" => "donate.php")
		);

  
  echo("    <div id=\"container\">\n" .
       "      <div id=\"top\">\n" .
       "        <h1>Homepage for PyG3T and PoProofRead</h1>\n" .
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
	echo(str_repeat($tab, $level+1) . "<li><a href=\"" . $value . "\">" . $key . "</a></li>\n");
      }
    }
  }
}

function footer(){
  echo("      <!-- HERE ENDS THE CODE FOR THIS PAGE -->\n" . 
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
