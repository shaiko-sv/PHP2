<?php


class CatalogModel extends Model {

    public function getAllProducts() {

        $result = [];
        $sql = "SELECT * FROM products";
        $conn = $this->db;

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $result[$row['id_product']] = $row;
        }
        return $result;

    }

    public function addFromCSV($data) {
        $sql = "INSERT INTO products(name, price) VALUES($data[0], $data[1])";
        $conn = $this->db;

        $query = mysqli_query($conn, $sql);
    }

//    private $template;
//    private $productList = [];
//    private $productListComplete = [];
//    private $filtered;
//
//    public function __construct($url)
//    {
//        $this->setUrl($url);
//        $this->setProductList($this->url);
//    }
//
//    /**
//     * @param mixed $url
//     */
//    public function setUrl($url)
//    {
//        $this->url = $url;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUrl()
//    {
//        return $this->url;
//    }
//
//    /**
//     * @param array $productList
//     */
//    public function setProductList($productList)
//    {
//        $this->productList = $productList;
//    }
//
//    /**
//     * @return array
//     */
//    public function getProductList()
//    {
//        return $this->productList;
//    }
//
//    /**
//     * @param array $productListComplete
//     */
//    public function setProductListComplete($productListComplete)
//    {
//        $this->productListComplete = $productListComplete;
//    }
//
//    /**
//     * @return array
//     */
//    public function getProductListComplete()
//    {
//        return $this->productListComplete;
//    }
//
//    /**
//     * @param mixed $filtered
//     */
//    public function setFiltered($filtered)
//    {
//        $this->filtered = $filtered;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getFiltered()
//    {
//        return $this->filtered;
//    }
//
//    public function filter($value) {
//
//    }

}