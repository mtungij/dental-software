

<?php

function is_active_link($link_segment)
{
    if (is_array($link_segment)) {
        foreach ($link_segment as $segment) {
            if (request()->is($segment . '*')) {
                return 'active';
            }
        }
        return '';
    }

    // if it's a string
    return request()->is($link_segment . '*') ? 'active' : '';
}
