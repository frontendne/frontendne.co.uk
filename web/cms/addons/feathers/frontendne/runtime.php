<?php

  PerchSystem::register_feather('frontendne');

  class PerchFeather_frontendne extends PerchFeather
  {
    public function get_css($opts, $index, $count)
    {
      $out = array();

      if (!$this->component_registered('style')) {
        $out[] = $this->_single_tag('link', array(
            'rel'=>'stylesheet',
            'href'=>$this->path.'/css/screen.css'
          ));
        $this->register_component('style');
      }

      if (!$this->component_registered('html5shiv')) {
        $out[] = $this->_script_tag(array(
            'src'=>$this->path.'/scripts/html5shiv.min.js'
          ));
        $this->register_component('html5shiv');
      }

      return implode("\n\t", $out)."\n";
    }

    public function get_javascript($opts, $index, $count)
    {
      $out = array();

      if (!$this->component_registered('jquery')) {
        $out[] = $this->_script_tag(array(
          'src'=>$this->path.'/scripts/main.js'
        ));
        $this->register_component('jquery');
      }

      return implode("\n\t", $out)."\n";
    }
  }

?>