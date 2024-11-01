<?php
/**
 * Creates a form in the "Add Media" screen under the new "SocialCast" tab. This form lets you insert the gallery shortcode with
 * the right arguments for native WP galleries, Flickr, Picasa, SmugMug and 500px.
 *
 * @package SocialCast
 * @subpackage UI
 */

$selected_tab = isset($_GET['socialcast-tab']) ? esc_attr($_GET['socialcast-tab']) : 'instagram';
if (!in_array($selected_tab, array('instagram', 'flickr', 'picasa', 'pinterest', 'facebook'))) {
	$selected_tab = 'instagram';
}

if (isset($_POST['socialcast-submit'])) {
	$shortcode =  stripslashes($_POST['socialcast-shortcode']);
	return media_send_to_editor($shortcode);
}
else if (isset($_POST['socialcast-cancel'])) {
	return media_send_to_editor('');
}
?>
<script type="text/javascript">
	$j = jQuery.noConflict();

	function socialcastAdminHtmlEncode(value){
		return $j('<div/>').text(value).html();
	}

	$j(document).ready(function() {
        
		$j('#socialcast-shortcode-form input[type="text"], #socialcast-shortcode-form select').change(function(event) {
			var comboValues = $j('#socialcast-shortcode-form').serializeArray();
			var newValues = new Array();
			var len = comboValues.length;
            
            if(len > 0){
    			for (var i=0; i<len; i++) {
    				var individual = comboValues[i];
    				if (individual['name'].trim() != 'socialcast-shortcode' && individual['name'].trim() != 'socialcast-submit' &&
    						individual['name'].trim() != 'socialcast-cancel' && individual['value'].trim() != '') {
    					newValues.push(individual['name'] + "='" + socialcastAdminHtmlEncode(decodeURIComponent(individual['value'].trim())) + "'");
    				}
    			}
    
    			var shortcode = "[gallery type='<?php echo $selected_tab; ?>' ";
    			len = newValues.length;
    			for (var i=0; i<len; i++) {
    				shortcode += newValues[i] + ' ';
    			}
    			shortcode += ']';
            
			$j('#socialcast-preview').text(shortcode);
			$j('#socialcast-shortcode').val(shortcode);
            
            }
		});
		$j('#socialcast-shortcode-form select').change();
        
		if ( !$j('#socialcast-shortcode-form select').length ){
		  var shortcode = "[gallery type='<?php echo $selected_tab; ?>']";
		  $j('#socialcast-preview').text(shortcode);
		  $j('#socialcast-shortcode').val(shortcode);
        }
        
	});
</script>
<style type="text/css">
#socialcast-shortcode-form p.prelude, #socialcast-shortcode-form .button-panel{ clear: both; }
#socialcast-shortcode-form div.preview{ float: left; clear: both; }
</style>
<?php

/* Facebook Gallery Selection */

			$session_key= get_option('fb-session-key');
			$session_sec= get_option('fb-session-secret');
			if(($session_key!='')&&($session_sec!='')){
			require_once('includes/facebook-platform/facebook.php');
			global $appapikey,$appsecret;
			$facebook = new Facebook($appapikey, $appsecret, null, true);
			$uid = get_option('fb-session-uid');
			$facebook->api_client->session_key = $session_key;
			$facebook->api_client->secret      = $session_sec;
			$albums = $facebook->api_client->photos_getAlbums($uid, null);
            $fbalbum = array();
			if( is_array($albums) ){
					foreach($albums as $album){
					//echo '<option '.$selected.' value="'.$album['aid'].'">'.$album['name'].'</option>';
                    
                    $fbalbum[$album['aid']] = $album['name'];
                    
					}
                }}

$fields = array(
	'instagram' => array(
		'name' => __('Instagram', 'socialcast'),
		'prelude' => __('You have to define your Instagram API Key under SocialCast &rarr; Instagram Settings', 'socialcast'),
		'fields' => array(),
	),
	'flickr' => array(
		'name' => __('Flickr', 'socialcast'),
		'prelude' => __('You can define your Flickr API Key under SocialCast Settings', 'socialcast'),
		'fields' => array(),
	),
	'picasa' => array(
		'name' => __('Picasa', 'socialcast'),
        'prelude' => __('You can define your Picasa Username under SocialCast Settings', 'socialcast'),
		'fields' => array(),
	),
	'pinterest' => array(
		'name' => __('Pinterest', 'socialcast'),
		'prelude' => __('You can define your Pinterest Username under SocialCast Settings', 'socialcast'),
		'fields' => array(),
	),
	'facebook' => array(
		'name' => __('Facebook', 'socialcast'),
		'prelude' => __('You can define your Facebook API Key under SocialCast &rarr; FB Album Settings', 'socialcast'),
		'fields' => array(
        
    		array(
    			'id' => 'gallery',
    			'name' => __('Select Album', 'socialcast'),
    			'type' => 'select',
    			'options' => $fbalbum,
    			'req' => true,
                'hint' => __('Select your Facebook photo album to use in gallery.', 'socialcast')
    		),
        
        ),
	),

);

$tab_list = '';
$tab_fields = '';
$field_list = array();
$prelude = '';
foreach ($fields as $tab => $field_group) {
	$tab_list .= "<li><a href='".esc_url(add_query_arg(array('socialcast-tab' => $tab)))."' class='".($tab == $selected_tab ? 'current' : '')."'>".esc_attr($field_group['name'])."</a> | </li>";
	if ($tab == $selected_tab) {
		$field_list = $field_group['fields'];
		$prelude = isset($field_group['prelude']) ? $field_group['prelude'] : '';
	}
}

echo "<form id='socialcast-shortcode-form' method='post' action=''>";
echo "<ul class='subsubsub'>";
if (strlen($tab_list) > 8) {
	$tab_list = substr($tab_list, 0, -8);
}
echo $tab_list;
echo "</ul>";

if (!empty($prelude)) {
	echo "<p class='prelude'>"; print_r($prelude); echo "</p>";
}

echo "<table class='socialcast-form'>";
echo "<tr>";"</tr>";
foreach ($field_list as $field) {
	echo "<tr>";
	echo "<th scope='row'>{$field['name']} ".(isset($field['req']) && $field['req'] ? '(*)' : '')." </th>";
	switch ($field['type']) {
		case 'text':
			echo "<td><input type='text' name='{$field['id']}' value='".(isset($field['std']) ? $field['std'] : '')."'/></td>";
			continue;
		case 'select':
			echo "<td><select name='{$field['id']}'>";
			foreach ($field['options'] as $option_name => $option_value) {
				echo "<option value='$option_name'>$option_value</option>";
			}
			echo "</select></td>";
			continue;
		case 'raw':
			echo "<td>".$field['std']."</td>";
			continue;
	}
	echo "<td class='hint'>".(isset($field['hint']) ? $field['hint'] : '')."</td>";
	echo "</tr>";
}
echo "</table>";

echo "<div class='preview'>";
echo "<script type='text/javascript'></script>";
echo "<h4>".__('Shortcode preview', 'socialcast')."</h4>";
echo "<pre class='html' id='socialcast-preview' name='socialcast-preview'></pre>";
echo "<input type='hidden' id='socialcast-shortcode' name='socialcast-shortcode' />";
echo "</div>";

echo "<div class='button-panel'>";
echo get_submit_button(__('Insert into post', 'socialcast'), 'primary', 'socialcast-submit', false);
echo get_submit_button(__('Cancel', 'socialcast'), 'delete', 'socialcast-cancel', false);
echo "</div>";
echo "</form>";
?>