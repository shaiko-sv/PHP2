<?php



class ProductModel extends Model {

    private $id;
    private $name;
    private $price;
    private $img;
    private $description;

    public function __construct()
    {
//        $this->db = DB::connToDB();
//        $res = $this->getProductByID($id);
//        $this->setId($id);
//        $this->setName($res['product_name']);
//        $this->setPrice($res['price']);
//        $this->setImg(IMAGES_FOLDER. $res['img']);
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

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function getProductByID($id)
    {
        $sql = "SELECT * FROM products WHERE id_product = ". $id;
        $this->db = DB::connToDB();
        $conn = $this->db;

        $query = mysqli_query($conn, $sql);

        $res = mysqli_fetch_assoc($query);

        $this->setId($id);
        $this->setName($res['product_name']);
        $this->setPrice($res['price']);
        $this->setImg(IMAGES_FOLDER. $res['img']);
        $this->setDescription($res['description']);
    }

    public function filter($value)
    {

    }
}