<!-- Suggested LocalSettings.php to work with Echo and Push Notifications -->

# PushNotifications ##########################################

wfLoadExtension( 'Echo' );
wfLoadExtension( 'Thanks' );

$wgEchoNotifiers['push'] = [ 'EchoPush\\PushNotifier', 'notifyWithPush' ];
$wgDefaultNotifyTypeAvailability['push'] = true;
$wgNotifyTypeAvailabilityByCategory['system']['push'] = false;
$wgNotifyTypeAvailabilityByCategory['system-noemail']['push'] = false;
$wgNotifyTypeAvailabilityByCategory['edit-thank']['push'] = true;
$wgNotifyTypeAvailabilityByCategory['edit-thank']['web'] = false;
$wgNotifyTypeAvailabilityByCategory['edit-thank']['email'] = false;
$wgEchoPushServiceBaseUrl = 'http://172.17.0.1:8900/v1/message';