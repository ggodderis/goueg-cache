<?php

class class_google_options {

    public function __construct(){

        add_action('admin_init', array(&$this,'google_register_settings') );
        add_action('admin_menu', array(&$this,'google_admin_settings') );

    }

    public function google_admin_settings () {

        add_options_page('Google reviews options', 'Google reviews options', 'manage_options', 'google-settings', array(&$this,'google_render_options_page'));
    
    }

    public function google_register_settings () {

        register_setting('google_settings_group', 'google_settings');

    }

    public function google_render_options_page () {

        global $google_settings;

        // print_r($google_settings['place_id']);
        // print_r($google_settings['api_key']);
        
        echo '<div class="wrap">
                <h2>Réglages des options google reviews</h2>

                <form method="post" action="options.php">';

                settings_fields('google_settings_group');

        echo '<table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" valign="top">
                            API KEY
                        </th>
                        <td>
                            <input id="google_settings[api_key]" name="google_settings[api_key]" type="text" class="regular-text" value="'.$google_settings['api_key'].'"/>
                            <label class="description" for="google_settings[api_key]">Renseigner la clé API</label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" valign="top">
                            PLACE ID
                        </th>
                        <td>
                            <input id="google_settings[place_id]" name="google_settings[place_id]" type="text" class="regular-text" value="'.$google_settings['place_id'].'"/>
                            <label class="description" for="google_settings[place_id]">Renseigner le placeID</label>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p class="submit">
				<input type="submit" class="button-primary" value="Valider" />
			</p>';

        echo    '</form>
            </div>';
    }


}