<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Message{
	
	public function text($message)
	{	
		return ['text' => $message];
	}

	public function attachment($type, $payload)
	{	
		$attachment = array(
			'attachment' => array(
				'type' => $type, 
				'payload' => $payload //Array
			) 
		);
		return $attachment;
	}

	public function quick_replies($text, $quick_replies)
	{
		$quick_replies = array(
			'text' => $text,
			'quick_replies' => $quick_replies
        );
        return $quick_replies;
	}

	public function quick_replies_attachment($quick_replies, $type, $payload)
	{
		$quick_replies_attachment = array(
			'quick_replies' => $quick_replies,
			'attachment' => array(
				'type' => $type, 
				'payload' => $payload //Array
			) 
		);
		return $quick_replies_attachment;
	}

}

