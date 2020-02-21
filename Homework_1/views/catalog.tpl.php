<div class="products">

    <?php
        foreach ($pageData['products'] as $key => $value) {
            $product = new ProductController($value['id_product']);
            $product->view->render($product->getPageTpl(), $product->getPageData());
        }
        ?>
<!--    <product-->
<!--        v-for="product of products"-->
<!--        :key="product.id_product"-->
<!--        :product="product"-->
<!--        :img="imgCatalog"></product>-->
</div>