<?php 
if(!function_exists('load_view')){
  function view_loader($view, $vars=array(), $output = false){ 
    return layout($view, $vars, $output);
  }
  /*Funcion para cargar Vistas
	=====================================================*/
    function layout($view, $data)
    {
      $CI = &get_instance();
      $CI->load->view('layout/header',$data);
      $CI->load->view($view, $data);
      $CI->load->view('layout/footer');
    }
}
