<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Button{

	public function url($url, $title)
	{
		$button_url = array(
			'type' => 'web_url', 
			'url' => $url, 
			'title' => $title
		); 
		return $button_url;
	}

	public function url_webview($url, $title, $height)
	{
		$button_url = array(
			'type' => 'web_url', 
			'url' => $url, 
			'title' => $title,
			'messenger_extensions' => true,
			'webview_height_ratio' => $height
		); 
		return $button_url;
	}

	public function postback($title, $developer_defined_payload)
	{
		$button_postback = array(
			'type' => 'postback', 
			'title' => $title, 
			'payload' => $developer_defined_payload
		); 
		return $button_postback;
	}

	public function call_button($title, $phone_number)
	{
		$button_call_button = array(
			'type' => 'phone_number', 
			'title' => $title, 
			'payload' => $phone_number
		); 
		return $button_call_button;
	}

	public function quick_reply($content_type, $title, $payload, $image_url=null)
	{
		$quick_reply = array(
            'content_type' => $content_type,
            'title' => $title,
            'payload' => $payload,
            'image_url' => $image_url
        );
        return $quick_reply;
	}
}
?>