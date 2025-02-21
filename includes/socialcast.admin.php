<!-- INSTAGRAM SETTINGS -->
<div class="group c1" id="sc-option-instagramsettings">

    <h3 class="title"><?php _e('Instagram Settings', 'socialcast'); ?></h3>

    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row"><label for="sc_type_instagram"><?php _e('Type', 'socialcast'); ?></label></th>

                <td><select class="sc-input" name="sc_type_instagram" id="sc_type_instagram">
					<?php
					foreach($sc_type_instaArr as $key => $type) {
						if($sc_settings['sc_type_instagram'] != $type) $selected = '';
						else $selected = ' selected';
						echo "<option value='$type'$selected>$type</option>\n";
					} ?>
                </select>
                <br />
                <span class="description"><em><?php _e('Select type to show the instagramPopular', 'socialcast'); ?></em></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_piccount_instagram"><?php _e('Count Instagram', 'socialcast'); ?></label></th>
                <td>
                    <input class="regular-text" name="sc_piccount_instagram" id="sc_piccount_instagram" type="small-text" value="<?php if ( isset( $sc_settings['sc_piccount_instagram'] ) ) echo $sc_settings['sc_piccount_instagram'];?>"/>
                    <br/>
                    <span class="description"><label for="sc_piccount_instagram"><?php _e('Count of your Instagram image', 'socialcast'); ?></label></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Random Instagram', 'socialcast'); ?></th>

                <td>
                <label for="sc_random_instagram"><input type="checkbox" class="checkbox sc-input" name="sc_random_instagram" id="sc_random_instagram" <?php if ( $sc_settings['sc_random_instagram'] ) echo ' checked="yes"';?> />&nbsp;<?php _e('Random Instagram Image', 'socialcast'); ?></label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_tag_instagram"><?php _e('Tag Instagram', 'socialcast'); ?> (<?php _e('optional', 'socialcast'); ?>)</label></th>

                <td><input class="regular-text" name="sc_tag_instagram" id="sc_tag_instagram" type="text" value="<?php if ($sc_settings['sc_tag_instagram']!="") echo $sc_settings['sc_tag_instagram'];?>"/><br /><span class="description"><label for="sc_tag_instagram"><?php _e('Tag', 'socialcast'); ?> (<?php _e('Currently only one tag. Username is ignored.', 'socialcast'); ?>)</label></span></td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_address_instagram"><?php _e('Address', 'socialcast'); ?>/<?php _e('Coordinates Instagram', 'socialcast'); ?> (<?php _e('optional', 'socialcast'); ?>)</label></th>

                <td><input class="regular-text" name="sc_address_instagram" id="sc_address_instagram" type="text" value="<?php if ($sc_settings['sc_address_instagram']!="") echo $sc_settings['sc_address_instagram'];?>"/><br /><span class="description"><label for="sc_address_instagram"><?php _e('Entry Address', 'socialcast'); ?>/<?php _e('Coordinates instagram in here', 'socialcast'); ?>.</label></span></td>
            </tr>
        </tbody>
    </table>

</div><!--/#instagramsettings-->
<!-- END OF INSTAGRAM SETTINGS -->


<!-- FLICKR SETTINGS -->
<div class="group c1" id="sc-option-flickrsettings">
    <h3 class="title"><?php _e('Flickr Settings', 'socialcast'); ?></h3>

    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row"><label for="sc_api_flickr"><?php _e('Flickr API', 'socialcast'); ?></label></th>

                <td><input class="regular-text" name="sc_api_flickr" id="sc_api_flickr" type="text" value="<?php if ($sc_settings['sc_api_flickr']!="") echo $sc_settings['sc_api_flickr'];?>"/>
                <br />
                <span class="description"><label for="sc_api_flickr"><?php _e('Entry Flickr API', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_secret_flickr"><?php _e('Flickr Secret', 'socialcast'); ?></label></th>
                <td>
                    <input class="regular-text" name="sc_secret_flickr" id="sc_secret_flickr" type="text" value="<?php if ($sc_settings['sc_secret_flickr']!="") echo $sc_settings['sc_secret_flickr'];?>"/>
                    <br/>
                    <span class="description"><label for="sc_secret_flickr"><?php _e('Entry Flickr Secret', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_username_flickr"><?php _e('Flickr ID', 'socialcast'); ?></label></th>

                <td>
                    <input class="regular-text" name="sc_username_flickr" id="sc_username_flickr" type="text" value="<?php if ($sc_settings['sc_username_flickr']!="") echo $sc_settings['sc_username_flickr'];?>"/>
                    <br />
                    <span class="description"><label for="sc_username_flickr"><?php _e('Enter your Flickr ID', 'socialcast'); ?> (<a href="http://www.idgettr.com" target="_blank">idGettr</a>) <?php _e('in here', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_piccount_flickr"><?php _e('Count Flickr', 'socialcast'); ?></label></th>

                <td>
                <input class="regular-text" name="sc_piccount_flickr" id="sc_piccount_flickr" type="text" value="<?php if ($sc_settings['sc_piccount_flickr']!="") echo $sc_settings['sc_piccount_flickr'];?>"/>
                <br />
                <span class="description"><label for="sc_piccount_flickr"><?php _e('Enter the Flickr image limit', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

        </tbody>
    </table>

</div><!--/#flickrsettings-->
<!-- END OF FLICKR SETTINGS -->


<!-- PINTEREST SETTINGS -->
<div class="group c1" id="sc-option-pinterestsettings">
    <h3 class="title"><?php _e('Pinterest Settings', 'socialcast'); ?></h3>

    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row"><label for="sc_username_pinterest"><?php _e('Pinterest Username', 'socialcast'); ?></label></th>

                <td><input class="regular-text" name="sc_username_pinterest" id="sc_username_pinterest" type="text" value="<?php if ($sc_settings['sc_username_pinterest']!="") echo $sc_settings['sc_username_pinterest'];?>"/>
                <br />
                <span class="description"><label for="sc_username_pinterest"><?php _e('Enter your Pinterest username here', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_piccount_pinterest"><?php _e('Count Pinterest', 'socialcast'); ?></label></th>
                <td>
                    <input class="regular-text" name="sc_piccount_pinterest" id="sc_piccount_pinterest" type="text" value="<?php if ($sc_settings['sc_piccount_pinterest']!="") echo $sc_settings['sc_piccount_pinterest'];?>"/>
                    <br/>
                    <span class="description"><label for="sc_piccount_pinterest"><?php _e('Enter the image limit for pinterest', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_board_pinterest"><?php _e('Specific Board', 'socialcast'); ?> (<?php _e('optional', 'socialcast'); ?>):</label></th>

                <td>
                    <input class="regular-text" name="sc_board_pinterest" id="sc_board_pinterest" type="text" value="<?php if ($sc_settings['sc_board_pinterest']!="") echo $sc_settings['sc_board_pinterest'];?>"/>
                    <br />
                    <span class="description"><label for="sc_board_pinterest"><?php _e('Enter the specific board for y pinterest', 'socialcast'); ?></label></span>
                </td>
            </tr>

        </tbody>
    </table>

</div><!--/#pinterestsetting-->
<!-- END OF PINTEREST SETTINGS -->


<!-- PICASA SETTINGS -->
<div class="group c1" id="sc-option-picasasettings">
    <h3 class="title"><?php _e('Picasa Settings', 'socialcast'); ?></h3>

    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row"><label for="sc_username_picasa"><?php _e('Picasa Username', 'socialcast'); ?></label></th>

                <td><input class="regular-text" name="sc_username_picasa" id="sc_username_picasa" type="text" value="<?php if ($sc_settings['sc_username_picasa']!="") echo $sc_settings['sc_username_picasa'];?>"/>
                <br />
                <span class="description"><label for="sc_username_picasa"><?php _e('Enter your Picasa Username in here', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="sc_piccount_picasa"><?php _e('Count Picasa', 'socialcast'); ?></label></th>
                <td>
                    <input class="regular-text" name="sc_piccount_picasa" id="sc_piccount_picasa" type="text" value="<?php if ($sc_settings['sc_piccount_picasa']!="") echo $sc_settings['sc_piccount_picasa'];?>"/>
                    <br/>
                    <span class="description"><label for="sc_piccount_picasa"><?php _e('Enter the image limit for Picasa', 'socialcast'); ?>.</label></span>
                </td>
            </tr>

        </tbody>
    </table>
    
</div><!-- /#picasasettings -->
<!-- END OF PICASA SETTINGS -->
