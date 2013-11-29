<?php


$mapping = array(
	'au_spotlight:title' => 'Edit footer sections',
	'au_spotlight:defaulthelp' =>'Enter text to be displayed in the three sections at the foot of each page',
	'au_spotlight:defaultloggedinhelp' =>'Enter text to be displayed in the three sections at the foot of each page for 
											logged-in users. Leave any field blank to show the default for all users',
	'au_spotlight:default'=>'Default footer text for all users',
	'au_spotlight:defaultloggedin'=>'Default footer text for logged in users',
	'au_spotlight:left' => 'Left footer section',
	'au_spotlight:middle' => 'Middle footer section',
	'au_spotlight:right' => 'Right footer section',
	'au_spotlight:contexttitle' => "Add footer sections for specific contexts.",
	'au_spotlight:context' => "Context",
	'au_spotlight:newcontext' => "Add a new context",	
	'au_spotlight:contexts'=>"Enter the contexts and footer text. Contexts depend on the 
								plugins that you have enabled but might commonly include things like
								 groups, profile, dashboard,pages, blog, bookmarks, etc.
								If you leave any footer text blank,
								the default footer for that section will be displayed. ",
	'au_spotlight:delete'=>	"To delete an existing context, simply delete the text for the context field - you do not
								need to delete the text in the footer fields as well. If the context
								field is left blank then the context and all the associate footers will be deleted
								when you save the form.",
	'au_spotlight:loggedinonly'=>"Only show to logged-in users",
	'au_spotlight:showcontext' => "If you need to work out what contexts are available, 
									check this box to show <em>only</em> admin users the context of every page when it is visited. 
									It will be displayed at the bottom of the left footer area when you
									are visiting a page - simply visit the page to which you wish to add a footer and note the context.
									Beware that some contexts may be re-used in different places (e.g. search, group): ",					
	
);

add_translation('en', $mapping);
