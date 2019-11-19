<?php
function blogCheckSlug($slug, $separator='-', $increment_number_at_end=FALSE) {    
    $last_char_is_number = is_numeric($slug[strlen($slug)-1]);
    $slug = $slug. ($last_char_is_number && $increment_number_at_end? '.':'');

    $i=0;
    $limit = 200; 
    while( get_instance()->db->where('blogSlug', $slug)->count_all_results('blog') != 0) {
        $slug = increment_string($slug, $separator);

        if($i > $limit) {
            return FALSE;
        }

        $i++;
    }

    if($last_char_is_number && $increment_number_at_end) $slug = str_replace('.','', $slug);

    return strtolower($slug);
}
?>