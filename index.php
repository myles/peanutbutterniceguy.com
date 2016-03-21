<!DOCTYPE html>
<?php require('config.php'); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Peanut Butter Nice Guy</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <ul class="nav nav-pills pull-right">
                    <?php
                    foreach ( $devtools as $tool ) {
                        printf( '<li><a href="%1$s">%2$s</a></li>', $tool['url'], $tool['name'] );
                    }
                    ?>
                </ul>
                <h3 class="text-muted">Peanut Butter Nice Guy</h3>
            </div>
            
            <div class="row">
                <?php
    		    foreach ( $dir as $d ) {
    			    $dirsplit = explode('/', $d);
    			    $dirname = $dirsplit[count($dirsplit)-2];

    				printf( '<div class="col-md-4 %1$s">', $dirname );

    		        foreach( glob( $d ) as $file )  {

    		        	$project = basename($file);

    		        	if ( in_array( $project, $hiddensites ) ) continue;

    		            echo '<div>';

    		            $siteroot = sprintf( 'http://%1$s.%2$s.%3$s', $project, $dirname, $tld );

    		            // Display an icon for the site
    		            $icon_output = '<span class="no-img"></span>';
    		            foreach( $icons as $icon ) {

    		            	if ( file_exists( $file . '/' . $icon ) ) {
    		            		$icon_output = sprintf( '<img src="%1$s/%2$s">', $siteroot, $icon );
    		            		break;
    		            	} // if ( file_exists( $file . '/' . $icon ) )

    		            } // foreach( $icons as $icon )
    		            echo $icon_output;

    		            // Display a link to the site
    		            $displayname = $project;
    		            if ( array_key_exists( $project, $siteoptions ) ) {
    		            	if ( is_array( $siteoptions[$project] ) )
    		            		$displayname = array_key_exists( 'displayname', $siteoptions[$project] ) ? $siteoptions[$project]['displayname'] : $project;
    		            	else
    		            		$displayname = $siteoptions[$project];
    		            }
    		            printf( '<a class="site" href="%1$s">%2$s</a>', $siteroot, $displayname );


    					// Display an icon with a link to the admin area
    					$adminurl = '';
    					// We'll start by checking if the site looks like it's a WordPress site
    					if ( is_dir( $file . '/wp-admin' ) )
    						$adminurl = sprintf( 'http://%1$s/wp-admin', $siteroot );

    					// If the user has defined an adminurl for the project we'll use that instead
    		            if (isset($siteoptions[$project]) &&  is_array( $siteoptions[$project] ) && array_key_exists( 'adminurl', $siteoptions[$project] ) )
    		            	$adminurl = $siteoptions[$project]['adminurl'];

    		            // If there's an admin url then we'll show it - the icon will depend on whether it looks like WP or not
    		            if ( ! empty( $adminurl ) )
    			            printf( '<a class="%2$s icon" href="%1$s">Admin</a>', $adminurl, is_dir( $file . '/wp-admin' ) ? 'wp' : 'admin' );


    		            echo '</div>';

    				} // foreach( glob( $d ) as $file )

    		        echo '</div>';

    		   	} // foreach ( $dir as $d )
                ?>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="text-muted">Made by <a href="https://mylesb.ca/">Myles Braithwaite</a> with &heart; in Toronto.</p>
            </div>
        </footer>
    </body>
</html>
<html>

		    <content class="cf">
<?php
		    
?>
			</content>



		    <footer class="cf">
		    <p></p>
		    </footer>

	    </div>
    </body>
</html>
