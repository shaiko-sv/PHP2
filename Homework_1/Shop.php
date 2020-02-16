<?php


class Shop {
    private $name;
    private $url;

    public function __construct($name, $url)
    {
        $this->setName($name);
        $this->setUrl($url);
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function getCatalog($obj)
    {

    }
    public function getCart($obj)
    {

    }
}