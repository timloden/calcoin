<?php

/* If user is subscriber role, send them to the dashboard on login
--------------------------------------------------------------------------------------*/

function my_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    global $user;

    if ( isset( $user->roles ) && is_array( $user->roles ) ) {

        if ( in_array( 'subscriber', $user->roles ) ) {
            // redirect them to the default place
            $data_login = get_page_by_title('Dashboard');

            return get_permalink($data_login->ID);
        } else {
            return admin_url();
        }
    } else {
        return $redirect_to;
    }
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
