<div class="products">
    <product
        v-for="product of products"
        :key="product.id_product"
        :product="product"
        :img="imgCatalog"></product>
</div>