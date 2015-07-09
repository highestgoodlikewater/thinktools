<?php
function debug($var){
    echo '<pre/>';
    var_dump($var);
    die();
}

function tb($d) {//控件
    echo '<div id="i_line"><div id="i_title">' . $d['t'] . '</div><div id="i_tt">';
    switch ($d['ac']) {
        case 'i':
            echo '<input name="' . $d['id'] . '" id="' . $d['id'] . '" value="' . $d['value'] . '" type="' . $d['type'] . '" ' . $d['script'] . ' style="' . $d['style'] . '" maxlength="' . $d['m'] . '" class="i_input"/>';
            break; //input
        case 'h':
            if ($d['href']) {
                $href = 'href="' . $d['href'] . '" target="_blank"';
            } else {
                $html = '';
            }
            echo '<a ' . $d['script'] . ' style="' . $d['style'] . '" class="i_html" ' . $href . '>' . $d['value'] . '</a>';
            break; //html
        case't':
            echo '<textarea name="' . $d['id'] . '" id="' . $d['id'] . '" class="i_textarea"  style="' . $d['style'] . '" ' . $d['script'] . ' width="95%">' . $d['value'] . '</textarea>';
            break; //textarea
    }
    if ($d['h']) {
        echo '<div id="i_help">' . $d['h'] . '</div>';
    }
    echo '</div></div>';
}

function bt($d) {//按钮
    echo '<input name="' . $d['id'] . '" id="' . $d['id'] . '" value="' . $d['value'] . '" type="' . $d['type'] . '" ' . $d['script'] . ' style="' . $d['style'] . '" class="i_bt"/>';
}