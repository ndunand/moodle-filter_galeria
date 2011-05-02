<?php
    
defined('MOODLE_INTERNAL') || die();

class filter_galeria extends moodle_text_filter {
    
    function filter($text, array $options = array()) {
        
        
        static $used = false;
        
        if ($used === true) {
            // return $text; // mod_ND : 20110208
        }
        
        $search = '/make_galeria/';
        $matches = array();
        
        if (!preg_match($search, $text, $matches)) {
            return $text;
        }
        
        global $CFG;
        
        static $gal_id = 0;
        $gal_id++;
        
        $used = true;
        
        $html = '';
        
        if ($gal_id == 1) {
            $html .= '
<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
<link href="'.$CFG->wwwroot.'/filter/galeria/fancybox/jquery.fancybox-1.3.4.css" type="text/css" rel="stylesheet" />
<link href="'.$CFG->wwwroot.'/filter/galeria/styles.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="'.$CFG->wwwroot.'/filter/galeria/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript">
    $jq_galeria = jQuery.noConflict();
</script>';
        }
        
        $html .= '
<script type="text/javascript" src="'.$CFG->wwwroot.'/filter/galeria/javascript.js"></script>
';
        
        return preg_replace($search, $html, $text);
    }
    
}
        
?>