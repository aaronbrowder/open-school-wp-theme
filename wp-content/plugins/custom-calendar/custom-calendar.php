<?php
/**
 * Plugin Name: Custom Calendar
 * Description: Displays upcoming events from public calendars
 * Version: 1.0.3
 */

require __DIR__ . '/google-api-php-client--PHP7.4/vendor/autoload.php';

add_action('wp_enqueue_scripts', 'custom_calendar_scripts');
function custom_calendar_scripts() {
   wp_enqueue_style('custom-calendar2', plugins_url('/custom-calendar-v4.css', __FILE__));
}

// [custom-calendar]
add_shortcode('custom-calendar', 'custom_calendar_shortcode_callback');
function custom_calendar_shortcode_callback($atts = [], $content = null) {
	return renderCalendar();
}

function createGoogleClient() {
	$client = new Google_Client();
	$client->setAuthConfig(__DIR__ . '/gcal-private-key.json');
	$client->setScopes(
	    "https://www.googleapis.com/auth/calendar.events.readonly"
	);
	return $client;
}

function renderCalendar() {
	$client = createGoogleClient();
	$calendarService = new Google_Service_Calendar($client);
    $myCalendarID = "5ag6e6loli9qolmdnm001eb5h4@group.calendar.google.com";

    $events = $calendarService->events
		->listEvents($myCalendarID, array(
		    'timeMin' => date(DATE_RFC3339),
		    'orderBy' => 'startTime',
		    'singleEvents' => true
			)
		)->getItems();

	$str = '';
	foreach ($events as $event) {
		$str .= renderEvent($event);
	}
	return $str;
}

function renderEvent($event) {
	$title = $event->getSummary();
	$description = $event->getDescription();
	$dateString = $event->getStart()->getDate();
	$dateTime = new DateTime($event->getStart()->getDateTime());
	$attachments = $event->getAttachments();
	return '<div class="cc-event">'
		. renderImage($attachments)
		. '<h3>' . $title . '</h3>'
		. (empty($dateString) 
			? '<div class="cc-date">' . $dateTime->format('l, F d, Y') . '</div>'
			: '<div class="cc-date">' . (new DateTime($dateString))->format('l, F d, Y') . '</div>')
		. (empty($dateString) 
			? ('<div class="cc-time">' . $dateTime->format('h:i A') . '</div>') 
			: '')
		. '<div class="cc-description">' . $description . '</div>'
		. '</div>';
}

function renderImage($attachments) {
	if (count($attachments) < 1) {
		return '';
	}
	$file = $attachments[0]->getFileUrl();
	$part = explode('https://drive.google.com/file/d/', $file)[1];
	$id = explode('/view', $part)[0];
	$imageFile = 'https://drive.google.com/uc?export=view&id=' . $id;
	return '<img src="' . $imageFile . '">';
}