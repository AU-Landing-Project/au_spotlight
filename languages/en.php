<?php


$mapping = array(
	'au_spotlight:title' => 'Edit footer sections',
	'au_spotlight:help' =>'Enter text to be displayed in the three sections at the foot of each page',
	'au_spotlight:default'=>'Default footer text for all users',
	'au_spotlight:defaultloggedin'=>'Default footer text for logged in users (leave blank to show the default for all users)',
	'au_spotlight:left' => 'Left footer section',
	'au_spotlight:middle' => 'Middle footer section',
	'au_spotlight:right' => 'Right footer section',
	'au_spotlight:contexttitle' => "Add footer sections for specific contexts",
	'au_spotlight:numcontexts' => "Number of contexts to edit. You'll need to save the settings before they are available for editing. 
									It's OK to enter too many - blank forms will be ignored.",
	'au_spotlight:context' => "Context",
	'au_spotlight:contexts'=>"Enter the contexts and footer text. Contexts depend on the 
								plugins that you have enabled but might commonly include things like
								 groups, profile, dashboard,pages, blog, bookmarks, etc.
								If you leave any text blank,
								the default footer for that section will be displayed",
	'au_spotlight:loggedinonly'=>"Only show to logged-in users",
	'au_spotlight:candidatecontexts' => "These are some possible contexts culled from the pages that the system
										knows about. Note that not all 
										will work in any sensible way and this may not represent every context in
										the system, but it may help you to identify pages that might benefit from
										some footer text : ",
	'au_spotlight:showcontext' => "If you need to work out what contexts are available, 
									check this box to show <em>only</em> admin users the context of every page when it is visited. 
									It will be displayed at the bottom of the left footer area when you
									are visiting a page.
									Beware that some contexts may be re-used in different places (e.g. search): ",					
	
);

add_translation('en', $mapping);
