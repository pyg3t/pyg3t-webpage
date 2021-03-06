<?php

/* BOILER PLATE CODE GENERATION FOR ALL THE PAGES */

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
function title_and_navigation($current_page){
  global $tab;
  /* The menu is generated from $menu variable. A node that contains more menu
     content is represented by an array and a node that is a link is represented
     by an associative array where the key is the name and value is the target */
  $menu = array(array("Home" => "index.php"),
		array("Pyg3t" => "pyg3t_home.php"),
		array(array("Install" => "pyg3t_install.php")),
		array("PoProofRead" => "ppr_home.php"),
		array(array("Install" => "ppr_install.php"),
		      array("Documentation" => "ppr_documentation/html"),
		      array("Development" => "ppr_development.php"),
		      array("FAQ" => "ppr_faq.php")),
		array("Donate" => "donate.php")
		);

  
  p(2, "<div id=\"container\">\n");
  p(3, "<div id=\"top\">\n");
  p(4, "<h1>Homepage for PyG3T and PoProofRead</h1>\n");
  p(3, "</div>\n");
  p(3, "<div id=\"navigation\">\n");
  p(4, "<ul>\n");
  menu(array($menu), 4, 0, $current_page);
  p(4, "</ul>\n");
  p(3, "</div>\n");
  p(3, "<!-- HERE BEGINS THE CODE FOR THIS PAGE -->\n");
}

function menu($menu, $indentlevel, $level, $current_page){
  global $tab;
  foreach($menu as $index=>$el){
    if (gettype($el[0]) == "array"){
      menu($el, $indentlevel, $level+1, $current_page);
    } else {
      foreach($el as $key=>$value){
	$classes="level$level";
	if ($value==$current_page){
	  $classes.=" currentpage";
	} else {
	  $classes.="";
	}
	if ($index == count($menu)-1 && $level == 1){
	  $classes.=" last";
	} else {
	  $classes.="";
	}

	$classstring = "class=\"$classes\"";

	echo(str_repeat($tab, $indentlevel) .
	     "<li $classstring><a href=\"$value\">$key</a></li>\n");
      }
    }
  }
}

function footer(){
  p(3, "<!-- HERE ENDS THE CODE FOR THIS PAGE -->\n");
  p(3, "<div id=\"footer\">\n");
  p(4, "<address>\n");
  p(5, "<a href=\"mailto:k.nielsen81@gmail.com\">Kenneth Nielsen</a>\n");
  p(5, "<a href=\"mailto:asklarsen@gmail.com\">Ask Hjorth Larsen</a>\n");
  p(4, "</address>\n");
  p(3, "</div>\n");
  p(2, "</div>\n");
  p(1, "</body>\n");
  p(0, "</html>");
}

/* FEED PARSER FOR THE NEWS FEED FROM LAUNCHPAD */

class BlogPost
{
  var $date;
  var $ts;
  var $link;
  var $title;
  var $text;
  var $author;
  var $author_link;
}

class BlogFeed
{
  var $posts = array();
  
  function BlogFeed($file_uri)
  {
    $xml_source = file_get_contents($file_uri);
    $x = simplexml_load_string($xml_source);
    
    if(count($x) == 0){
      return;
    }

    foreach($x->entry as $item)
      {
	$post = new BlogPost();
	$post->date = (string) $item->published;
	$post->ts = strtotime($item->published);
	$post->link = (string) $item->link->attributes()->href;
	$post->title = (string) $item->title;
	$post->text = (string) $item->content;
	$post->author = (string) $item->author->name;
	$post->author_link = (string) $item->author->uri;
	
	$this->posts[] = $post;
      }
  }

  function GenerateHtml($level){
    global $tab;

    $this->posts = $this->SortByDate($this->posts);

    echo("\n");
    foreach($this->posts as $entry){
      p($level, "<div id=\"news_item\">\n");
      p($level+1, "<h3>" . $entry->title . "</h3>\n");
      p($level+1, "<h4>\n");
      p($level+2, "<a href=\"" . $entry->link . "\">Posted</a> by \n");
      p($level+2, "<a href=\"" . $entry->author_link . "\">" . $entry->author .
	"</a> on " . strftime("%G-%m-%d", $entry->ts) . "\n");
      p($level+1, "</h4>\n");
      $text = explode("\n", $entry->text);
      $text = $this->Listefy($text);

      foreach($text as $line){
	if(substr($line, 0, 3) == "<p>"){
	  p($level+1, wordwrap($line, 80, "\n" . str_repeat($tab, $level+1)));
	  p($level+1, "\n");
	} else {
	  p($level+1, $line . "\n");
	}
      }

      p($level,   "</div>\n");
    }
  }

  function SortByDate($posts){
    $ret = Array();
    $tmp = Array();
    foreach($posts as $post){
      $tmp[$post->ts] = $post;
    }
    arsort($tmp);
    foreach($tmp as $post){
      $ret[] = $post;
    }
    return $ret;
  }

  function Listefy($text){
    global $tab;
    $out = Array();
    $list = False;
    $before_list = 0;

    foreach($text as $line){
      if(substr($line, 0, 8) == "&nbsp;* "){
	if (!$list){
	  $list = True;
	  $before_list = count($out)-1;
	  $out[] = "<ul>";
	}
	/* If there is an ending paragraph in a list */
	if (substr($line, -4) == "</p>"){
	  if (substr($out[$before_list], -6) == "<br />"){
	    $out[$before_list] = substr($out[$before_list], 0, -6);
	  }
	  $out[$before_list] .= "</p>";
	  $line = substr($line, 0, -4);
	}
	$out[] = $tab . "<li>" . str_replace('<br />', '', substr($line, 8)) . "</li>";
      } else {
	if ($list){
	  $out[] = "</ul>";
	  $list = False;
	} else {
	  $out[] = $line;
	}
      }
    }
    return $out;
  }
}


?>
