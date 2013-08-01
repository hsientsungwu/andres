<?php

if ($_SERVER['DOCUMENT_ROOT'] == "") $_SERVER['DOCUMENT_ROOT'] = '/home/hwu1986/public_html/goadrina/htdocs/';

require($_SERVER['DOCUMENT_ROOT'] . '/config.php');

global $fb, $db;

$token = getAccessTokenForAdminUser();
$fb->setAccessToken($token);

$postIds = $db->fetchAll("SELECT entityId FROM facebook_entity WHERE entityType = ? AND category = ?", array(FacebookEntityType::POST, AdrinaCategory::FACEBOOKADS));

$totalCount = count($postIds);
$successCount = 0;

foreach ($postIds as $postId) {
	$postInfo = $fb->api('/' . $postId['entityId'], 'GET');

	if (count($postInfo)) {

		$data = array(
			'message' => ':)'
		);

		try {
			$newCommentData = $fb->api('/'. $postId['entityId'] . "/comments", 'POST', $data);

			if (isset($newCommentData['id'])) {
				sleep(3);
				$result = $fb->api($newCommentData['id'], 'DELETE');
				$successCount++;
			}
		} catch (FacebookApiException $e) {
			var_dump($e->getResult());

			$content['message'] = $e->getResult();
			$content['type'] = "Facebook Post Ads: {$postId['entityId']}";

			log_errors($content);
		}
	}
}

$emailContent['subject'] = "[Go Adrina!] Facebook Post Ads Cron Result";
$emailContent['message'] = "Total Post Ads: {$totalCount} and Total SUCCESS: {$successCount}";
send_email($emailContent, 'admin');

echo $emailContent['message'];

