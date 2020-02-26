<?php


class ErrorController extends Controller {
    private $text;

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}