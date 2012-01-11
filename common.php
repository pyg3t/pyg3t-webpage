<?php

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
echo("    <div id=\"container\">\n" .
     "      <div id=\"top\">\n" .
	 "        <h1>Homepage for pyg3t and PoProofRead</h1>\n" .
     "      </div>\n" .
     "      <div id=\"leftnav\">\n" .
	 "        <p>Navigation</p>\n".
     "      </div>\n");
}

function footer(){
    echo("      <div id=\"footer\">\n" . 
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
