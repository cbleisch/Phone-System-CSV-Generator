<?php
	header('Content-Type: application/csv');
	header('Content-Disposition: attachment; filename="phones.csv";');
$post = $_POST;
// $action = $_POST['action'];
// $outboundcid = $_POST['outboundcid'];
$extension = $_POST['extension'];
$name = $_POST['name'];
$vm = $_POST['vm'];
$email = $_POST['email'];
$attach = $_POST['attach'];
// $devinfo_sendrpid = $_POST['devinfo_sendrpid'];
$count = count($extension);

if($count < 1) {
	echo 'no data supplied';
} else {
}

function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$emptyField = $action = $password = $outboundcid = $noanswer_dest = $noanswer_cid = $busy_dest = $busy_cid = $chanunavail_dest = $chanunavail_cid = $emergency_cid = $hardware = $devinfo_channel = $devinfo_notransfer = $devinfo_immediate = $devinfo_signalling = $devinfo_echocancel = $devinfo_echocancelwhenbrdiged = $devinfo_echotraining = $devinfo_busydetect = $devinfo_busycount = $devinfo_callprogress = $devinfo_callgroup = $devinfo_pickupgroup = $devinfo_disallow = $devinfo_allow = $devinfo_accountcode = $deviceid = $dictemail = $langcode = $pager = $options = $vmx_state = $vmx_unavail_enabled = $vmx_busy_enabled = $vmx_option_0_number = $vmx_option_1_system_default = $vmx_option_1_number = $vmx_option_2_number = $account = $ddial = $pre_ring = $strategy = $grptime = $grplist = $annmsg_id = $ringing = $grppre = $dring = $needsconf = $remotealert_id = $toolate_id = $postdest = $faxenabled = $faxemail = $devinfo_vmexten = $xactview_email = $xactview_cell = $jabber_host = $jabber_domain = $jabber_resource = $jabber_username = $jabber_password = $xactview_profilepassword = $xmpp_user = $xmpp_pass = '';

$csvFooter = $csvHeader = ['action', 'extension', 'name', 'cid_masquerade', 'sipname', 'outboundcid', 'ringtimer', 'callwaiting', 'call_screen', 'pinless', 'password', 'noanswer_dest', 'noanswer_cid', 'busy_dest', 'busy_cid', 'chanunavail_dest', 'chanunavail_cid', 'emergency_cid', 'tech', 'hardware', 'devinfo_channel', 'devinfo_secret', 'devinfo_notransfer', 'devinfo_dtmfmode', 'devinfo_canreinvite', 'devinfo_context', 'devinfo_immediate', 'devinfo_signalling', 'devinfo_echocancel', 'devinfo_echocancelwhenbrdiged', 'devinfo_echotraining', 'devinfo_busydetect', 'devinfo_busycount', 'devinfo_callprogress', 'devinfo_host', 'devinfo_type', 'devinfo_nat', 'devinfo_port', 'devinfo_qualify', 'devinfo_callgroup', 'devinfo_pickupgroup', 'devinfo_disallow', 'devinfo_allow', 'devinfo_dial', 'devinfo_accountcode', 'devinfo_mailbox', 'devinfo_deny', 'devinfo_permit', 'devicetype', 'deviceid', 'deviceuser', 'description', 'dictenabled', 'dictformat', 'dictemail', 'langcode', 'vm', 'vmpwd', 'email', 'pager', 'attach', 'saycid', 'envelope', 'delete', 'options', 'vmcontext', 'vmx_state', 'vmx_unavail_enabled', 'vmx_busy_enabled', 'vmx_play_instructions', 'vmx_option_0_sytem_default', 'vmx_option_0_number', 'vmx_option_1_system_default', 'vmx_option_1_number', 'vmx_option_2_number', 'account', 'ddial', 'pre_ring', 'strategy', 'grptime', 'grplist', 'annmsg_id', 'ringing', 'grppre', 'dring', 'needsconf', 'remotealert_id', 'toolate_id', 'postdest', 'faxenabled', 'faxemail', 'cfringtimer', 'concurrency_limit', 'answermode', 'qnostate', 'devinfo_trustrpid', 'devinfo_sendrpid', 'devinfo_qualifyfreq', 'devinfo_transport', 'devinfo_encryption', 'devinfo_vmexten', 'cc_agent_policy', 'cc_monitor_policy', 'recording_in_external', 'recording_out_external', 'recording_in_internal', 'recording_out_internal', 'recording_ondemand', 'recording_priority', 'add_xactview', 'xactview_autoanswer', 'xactview_email', 'xactview_cell', 'jabber_host', 'jabber_domain', 'jabber_resource', 'jabber_port', 'jabber_username', 'jabber_password', 'xactview_createprofile', 'xactview_profilepassword', 'xmpp_user', 'xmpp_pass'];

$fh = fopen("php://output", "w");
fputcsv($fh, $csvHeader);

for( $i = 0; $i <= $count; $i++ )
{
	//the data
	if( !empty($extension[$i]) && !empty($name[$i])) {
		$devinfo_secret = generateRandomString();
		$devinfo_dial = 'SIP/'.$extension[$i];
		$devinfo_mailbox = $extension[$i].'@device';
		$deviceuser = $extension[$i];
		$description = $name[$i];

		$data = [ $action, $extension[$i], $name[$i], $extension[$i], $extension[$i], $outboundcid, 0, 'enabled', 0, 'disabled', $password, $noanswer_dest, $noanswer_cid, $busy_dest, $busy_cid, $chanunavail_dest, $chanunavail_cid, $emergency_cid, 'sip', $hardware, $devinfo_channel, $devinfo_secret, $devinfo_notransfer, 'rfc2833', 'no', 'from-internal', $devinfo_immediate, $devinfo_signalling, $devinfo_echocancel, $devinfo_echocancelwhenbrdiged, $devinfo_echotraining, $devinfo_busydetect, $devinfo_busycount, $devinfo_callprogress, 'dynamic', 'friend', 'no', 5060, 'yes', $devinfo_callgroup, $devinfo_pickupgroup, $devinfo_disallow, $devinfo_allow, $devinfo_dial, $devinfo_accountcode, $devinfo_mailbox, '0.0.0.0/0.0.0.0', '0.0.0.0/0.0.0.0', 'fixed', $deviceid, $deviceuser, $description, 'disabled', 'ogg', $dictemail, $langcode, $vm[$i], '1234', $email[$i], $pager, 'attach='.$attach[$i], 'saycid=no', 'envelope=no', 'delete=no', $options, 'default', $vmx_state, $vmx_unavail_enabled, $vmx_busy_enabled, 'checked', 'checked', $vmx_option_0_number, $vmx_option_1_system_default, $vmx_option_1_number, $vmx_option_2_number, $account, $ddial, $pre_ring, $strategy, $grptime, $grplist, $annmsg_id, $ringing, $grppre, $dring, $needsconf, $remotealert_id, $toolate_id, $postdest, $faxenabled, $faxemail, 0, 0, 'disabled', 'userstate', 'yes', 'no', 60, 'udp', 'no', $devinfo_vmexten, 'generic', 'generic', 'dontcare', 'dontcare', 'dontcare', 'dontcare', 'disabled', 10, 0, 0, $xactview_email, $xactview_cell, $jabber_host, $jabber_domain, $jabber_resource, 5222, $jabber_username, $jabber_password, 0, $xactview_profilepassword, $xmpp_user, $xmpp_pass];
		fputcsv($fh, $data);
	}
}
// fputcsv($fh, $csvFooter);
fclose($fh);
?>