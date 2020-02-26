<div>
    <button class="btn-cart" type="button" @click='showCart = !showCart'>Корзина</button>
    <div class="cart-block" v-show="showCart">
        <p v-if="!cartItems.length">Cart is empty</p>
        <cart-item
            v-for="item of cartItems"
            :key="item.id_product"
            :cart-item="item"
            :img="imgCart"
            @remove="remove"></cart-item>
    </div>
</div>