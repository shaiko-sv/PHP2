<?php

class View {

    public function render($tpl, $pageData) {
        include VIEW_PATH. $tpl;
    }

    public function preRender($tpl, $pageData) {
        echo $tpl;
    }
}
