<?php
/**
 * @package ZaZaChat Live Chat
 * @author ZaZaChat
 * @version 1.1.1
 */
/*
Plugin Name: ZaZaChat Live Chat
Plugin URI: http://www.zazachat.com
Description: live chat button plugin by ZaZaChat
Author: ZaZaChat
Version: 1.1.1
Author URI: http://www.zazachat.com
*/

 function zazachat_widget()
{
    $options=get_option('zazachat');
    $clientid=$options['zazachat_clientid'];
    $clientid = str_replace("z","",strtolower($clientid));
    $buttonid=$options['zazachat_buttonid'];    
    $title=$options['zazachat_title'];
    if($title)
    {
     echo "<h3>$title</h3>";
    }
$button=<<<EOT
<!--start http://www.zazachat.com  --> <div style="text-align: center;white-space: nowrap;"><div><script type="text/javascript">var lhnJsHost = (("https:" == document.location.protocol) ? "https://" : "http://"); document.write(unescape("%3Cscript src='" + lhnJsHost + "www.zazachat.com/livechatclient/scripts/zazamagic.aspx?div=&amp;zimg=$buttonid&amp;zazac=$clientid&amp;iv=1&amp;zzwindow=0&amp;d=0&amp;custom1=&amp;custom2=&amp;custom3=' type='text/javascript'%3E%3C/script%3E"));</script></div></div> <!--end http://www.zazachat.com -->
EOT;
    echo $button;
}
function zazachat_init()
{
register_sidebar_widget('ZaZaChat Live Chat', 'zazachat_widget');
register_widget_control('ZaZaChat Live Chat', 'zazachat_widgetcontrol');
}
add_action('init', 'zazachat_init');

function zazachat_widgetcontrol()
{
$options = get_option('zazachat');
if ( $_POST["zazachat_submit"] )
{
$options['zazachat_clientid'] = strip_tags( stripslashes($_POST["zazachat_clientid"] ) );
$options['zazachat_buttonid'] = strip_tags( stripslashes($_POST["zazachat_buttonid"] ) );
$options['zazachat_title'] = strip_tags( stripslashes($_POST["zazachat_title"] ) );
update_option('zazachat', $options);
}
$zazachat_clientid = $options['zazachat_clientid'];
$zazachat_buttonid = $options['zazachat_buttonid'];
$zazachat_title=$options['zazachat_title'];
include('zazachat-widget-control.php');
}
?>