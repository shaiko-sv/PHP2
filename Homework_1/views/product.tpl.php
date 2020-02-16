<div class="product-item">
    <img src="<?php echo $pageData['img'];?>" alt="<?php echo $pageData['product_name'];?>">
    <div class="desc">
        <h3><?php echo $pageData['product_name'];?></h3>
        <p><?php echo $pageData['price'];?></p>
        <button class="buy-btn"
                @click="$root.$refs.cart.addProduct(product)">Купить</button>
    </div>
</div>