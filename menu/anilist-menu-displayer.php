<?php

function anilist_display_settings()
{

?>

    <div class="wrap">

        <h2>AniList API Settings</h2>

        <form method="post" action="options.php">

            <?php settings_fields('anilist_group_options'); ?>
            <?php do_settings_sections(__FILE__); ?>
            <?php submit_button();?>

        </form>
    </div>


<?php

}

function anilist_init_register_settings() {


    register_setting('anilist_group_options','anilist_options');

    //////////////////////////User Section //////////////////////////////////
    add_settings_section('anilist_user_section', // Unique ID
        'User', // Name for this section
        'anilist_user_section_display', // Function to call
        __FILE__ // Page
    );

    add_settings_field('anilist_username',// Unique ID
        'AniList Username', // Name for this field
        'anilist_username_field', //Function to call
        __FILE__, // Page
        'anilist_user_section' // Section to belong to
    );

    //////////////////////////Client Section //////////////////////////////////
    add_settings_section('anilist_client_section', // Unique ID
        'Client Information', // Name for this section
        'anilist_client_section_display', // Function to call
        __FILE__ // Page
    );

    add_settings_field('anilist_client_id',// Unique ID
        'Client Id', // Name for this field
        'anilist_client_id_field', //Function to call
        __FILE__, // Page
        'anilist_client_section' // Section to belong to
    );


    add_settings_field('anilist_client_secret',// Unique ID
        'Client Secret', // Name for this field
        'anilist_client_secret_field', //Function to call
        __FILE__, // Page
        'anilist_client_section' // Section to belong to
    );


    //////////////////////////Token Section //////////////////////////////////
    add_settings_section('anilist_tokens_section', // Unique ID
        'Tokens', // Name for this section
        'anilist_tokens_section_display', // Function to call
        __FILE__ // Page
    );

    add_settings_field('anilist_token',// Unique ID
        'Token', // Name for this field
        'anilist_token_field', //Function to call
        __FILE__, // Page
        'anilist_tokens_section' // Section to belong to
    );


    add_settings_field('anilist_refresh_token',// Unique ID
        'Refresh Token', // Name for this field
        'anilist_refresh_token_field', //Function to call
        __FILE__, // Page
        'anilist_tokens_section' // Section to belong to
    );


}

$options = get_option('anilist_options');

function anilist_user_section_display() {

    echo '<p>Enter your user information here ! </p>';

}

function anilist_username_field() {

    global $options;
    echo "<input id='anilist_username_input' name='anilist_options[anilist_username]' type='text' value='" . $options['anilist_username'] . "' />";

}

function anilist_client_section_display() {

    echo '<p>Enter your client information here ! </p>';
}

function anilist_client_id_field() {

    global $options;
    echo "<input id='anilist_client_id_input' name='anilist_options[anilist_client_id]' type='text' value='" . $options['anilist_client_id'] . "' />";
}

function anilist_client_secret_field() {

    global $options;
    echo "<input id='anilist_client_secret_input' name='anilist_options[anilist_client_secret]' type='text' value='" . $options['anilist_client_secret'] . "' />";
}

function anilist_tokens_section_display() {

    echo '<p>Enter your tokens information here ! </p>';

}

function anilist_token_field() {

    global $options;
    echo "<input id='anilist_token_input' name='anilist_options[anilist_token]' type='text' value='" . $options['anilist_token'] . "' disabled />";

}

function anilist_refresh_token_field() {

    global $options;
    echo "<input id='anilist_refresh_token_input' name='anilist_options[anilist_refresh_token]' type='text' value='" . $options['anilist_refresh_token'] . "' />";

}

?>
