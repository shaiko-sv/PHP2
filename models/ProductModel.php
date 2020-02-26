<?php



class ProductModel extends Model {

    private $id;
    private $name;
    private $price;
    private $img;

    public function __construct($id)
    {
        $this->db = DB::connToDB();
        $res = $this->getProductByID($id);
        $this->setId($id);
        $this->setName($res['product_name']);
        $this->setPrice($res['price']);
        $this->setImg(IMAGES_FOLDER. $res['img']);
    }

    /**
     * @param mixed $id
     *
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    public function getProductByID($id){
        $sql = "SELECT * FROM products WHERE id_product = ". $id;
        $conn = $this->db;

        $query = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($query);
    }

    public function filter($value) {

    }
}