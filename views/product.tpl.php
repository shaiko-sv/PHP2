<div class="product-item">
    <a href="/product?id="></a>
    <img src="<?php echo $pageData['img'];?>" alt="<?php echo $pageData['product_name'];?>"
    style="width: 300px">
    <div class="desc">
        <h3><?php echo $pageData['product_name'];?></h3>
        <p><?php echo $pageData['price'];?></p>
        <p><?php echo $pageData['description'];?></p>
        <button class="buy-btn"
                @click="$root.$refs.cart.addProduct(product)">Купить</button>
    </div>
</div>