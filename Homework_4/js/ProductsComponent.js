Vue.component('products', {
    data() {
        return {
            //catalogUrl: `/catalog/ajaxRequest?id=`,
            catalogUrl: `/engine/ajaxfile.php?id=`,
            products: [],
            allProducts: [],
            imgCatalog: "img/",
            filtered: [],
            offset: 0,
            rowCount: 8,
        }
    },
    methods: {
        filter(value){
            if(!value) {
                this.products = [...this.allProducts];
            } else {
                this.products = [];
                let regexp = new RegExp(value, 'i');
                this.filtered = this.allProducts.filter(el => regexp.test(el.product_name));
                this.allProducts.forEach(el => {
                    if(this.filtered.includes(el)){
                        this.products.push(el)
                    }
                })
            }
        },
        showMoreProducts(){
            this.offset += this.rowCount;
            this.$parent.getJson(`../engine/ajaxfile.php?
                table=products&
                offset=${this.offset}&
                rowCount=${this.rowCount}`)
                .then(data => {
                    for(let el of data){
                        this.products.push(el);
                        this.allProducts.push(el);
                    }
                })
        },
        openDescription(id){
            this.$parent.getJson(`/catalog/ajaxRequest?table=products&id_product=${id}`)
                .then(data => {
                    console.log(data);
                })
        },
    },
    mounted() {
        this.$parent.getJson(`../engine/ajaxfile.php?table=products&limit=${this.rowCount}`)
            .then(data => {
                for(let el of data){
                    this.products.push(el);
                    this.allProducts.push(el);
                }
            })
        // this.$parent.JQueryAXAJ("../engine/ajaxfile.php", "products")
        //     .then(data => {
        //         console.log(data);
        //         for(let el of data){
        //             this.products.push(el);
        //             this.allProducts.push(el);
        //         }
        //     })
    },
    template: `<div class="wrapper">
<div class="products">
            <product
            v-for="product of products"
            :key="product.id_product"
            :id="product.id_product"
            :product="product"
            :img="imgCatalog+product.img"
            :url="catalogUrl"></product>
        </div>
<button class="more-btn"
                            @click="showMoreProducts()">Показать ещё...</button>
        </div>`,
});

Vue.component('product', {
    props: ['product', 'img','url','id'],
    template: `<div class="product-item">
                <a :href="url+id">
                <img :src="img" :alt="product.product_name">
                </a>
                <div class="desc">
                    <h3>{{ product.product_name }}</h3>
                    <p>{{ product.price }}</p>
                    <button class="buy-btn"
                            @click="$root.$refs.cart.addProduct(product)">Купить</button>
                </div>
            </div>`,
})