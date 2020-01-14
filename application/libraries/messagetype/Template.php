<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Template{
    /*@param Array $button*/
	public function button($text, $button)
	{
		$template_button = array(
			'template_type' => 'button', 
			'text' => $text,
			'buttons' => $button  
		);
		return $template_button;
	}

    /*@param Matriz $elements*/
	public function generic($elements)
	{
        $template_generic = array(
            'template_type' => 'generic',
            'elements' => $elements

        );
        return $template_generic;
	}

    /*@param Void $element_style -> Sus parametros aceptados son: compact y large*/
	/*@param Matriz $elements*/
    public function lista($element_style = null, $elements, $button = null)
    {
        $template_list = array(
            'template_type' => 'list',
            'top_element_style' => $element_style,
            'buttons' => $button,
            'elements' => $elements
        );
        return $template_list;
    }

}
?>