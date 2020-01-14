<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Gallery{

    public function galeria($title, $subtitle=null, $image_url, $buttons)
    {
        $gallery = array(
            'title' => $title,
            'image_url' => $image_url,
            'subtitle' => $subtitle,
            'buttons' => $buttons
        );
        return $gallery;
    }
	
	public function element($title, $subtitle, $image_url, $buttons)
    {
        $gallery = array(
            'title' => $title,
            'subtitle' => $subtitle,
            'image_url' => $image_url,
            'buttons' => $buttons
        );
        return $gallery;
    }

	public function element_url($title, $subtitle, $image_url, $url)
	{
		$element = array(
            'title' => $title,
            'image_url' => $image_url,
            'subtitle' => $subtitle,
            'default_action' => array(
                   'type' => 'web_url',
                    'url' => $url,
                   
                    'webview_height_ratio' => 'tall',
                            
            )
            
        );
        return $element;
	}
}
?>