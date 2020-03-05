Vue.component('cart', {
    data() {
        return {
            cartUrl: `cart/loadCart?id_cart=1`,
            imgCart: `https://placehold.it/30x30`,
            imgCatalog: "img/",
            showCart: false,
            cartItems: [],
        }
    },
    methods: {
        addProduct(product){
            this.$parent.getJson(`/cart/addToCart?id_product=${product.id_product}`)
                .then(data => {
                    if (data.result) {
                        let find = this.cartItems.find(el => el.id_product === product.id_product);
                        if (find) {
                            find.quantity++;
                        } else {
                            let prod = Object.assign({quantity: 1}, product);
                            this.cartItems.push(prod);
                        }
                    }
                })},

        remove(cartItem){
            this.$parent.getJson(`/cart/removeFromCart?id_product=${cartItem.id_product}`)
                .then(data => {
                    if (data.result) {
                        let find = this.cartItems.find(el => el.id_product === cartItem.id_product);
                        if(find.quantity > 1){
                            find.quantity--;
                        } else {
                            this.cartItems.splice(this.cartItems.indexOf(find), 1);
                        }
                    }
                })},
    },
    mounted() {
        this.$parent.getJson(this.cartUrl)
            .then(data => {
                for (let el of data.contents) {
                    this.cartItems.push(el);
                }
            });
    },
    template: `<div>
                    <button
                        @click="showCart = !showCart"
                        class="btn-cart"
                        type="button">Корзина</button>
                    <div class="cart-block" v-show="showCart">
                    <p v-if="cartItems.length === 0">Добавьте товар...</p>
                    <cart-item
                        v-for="cartItem of cartItems"
                        :key="cartItem.id_product"
                        :cart-item="cartItem"
                        :img="imgCart"
                        @remove="remove">
                    </cart-item>
                    <a v-if="cartItems.length !== 0" href="/order?cart_id=1">
                        <button class="buy-btn">Заказать</button>
                    </a>
                    </div>
                </div>`,
});

Vue.component('cart-item', {
    props: ['cartItem', 'img'],
    template: `<div class="cart-item">
                    <div class="product-bio">
                        <img :src="img" :alt="cartItem.product_name">
                        <div class="product-desc">
                            <p class="product-title">{{ cartItem.product_name }}</p>
                            <p class="product-quantity">Quantity: {{ cartItem.quantity }}</p>
                            <p class="product-single-price">{{cartItem.price}} each</p>
                        </div>
                    </div>
                    <div class="right-block">
                        <p class="product-price">{{+cartItem.quantity*cartItem.price}}</p>
                        <button class="del-btn" @click="$emit('remove', cartItem)">&times;</button>
                    </div>
                </div>`,
});