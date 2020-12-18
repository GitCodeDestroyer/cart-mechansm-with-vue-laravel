<template>
    <div>
        <h1>Home</h1>
        <div>
            <img :src="product.images.replace(/\'/gi, '').split(',')[0]" alt="">
            <h4>{{ product.title }}</h4>
            <p>{{ product.price }} so'm</p>
            <button v-show="product.canAddToCart" @click="addToCart(product.id, i)">Add to Cart</button>
            <button v-show="!product.canAddToCart" @click="removeFromCart(product.id, i)">Remove from Cart</button>
        </div>
        <div id="cart-menu" class="cart-items">
            <div class="left-menu">
                <button class="c-btn" @click="closeCartMenu()"><span class="pe-7s-angle-right"></span></button>
            </div>
            <div class="clearfix"></div>
            <div class="products">
                <p v-show="!cartProducts || Array.isArray(cartProducts) && cartProducts.length == 0" class="no-items">There are no items</p>
                <div v-for="(cartProduct, i) in cartProducts" :key="cartProduct.id" class="product">
                    <div class="image"><img :src="cartProduct.images.replace(/\'/gi, '').split(',')[0]" alt=""></div>
                    <div class="about">
                        <h4><a href="">{{ cartProduct.title }}</a></h4>
                        <p>
                            <span class="price">{{ cartProduct.price }} so'm</span>
                            <span  v-show="cartProduct.available" class="available">
                                <span style="float:left;margin:5px 5px 5px 10px" class="pe-7s-check"></span>
                                <span>Available</span>
                            </span>
                            <span  v-show="!cartProduct.available" class="available">
                                <span style="float:left;margin:5px 5px 5px 10px" class="pe-7s-close-circle"></span>
                                <span>Not Available</span>
                            </span>
                        </p>
                    </div>
                    <button v-show="!cartProduct.canAddToCart" @click="removeFromCart(cartProduct.id, i)" class="remove-cart-item"><span class="pe-7s-trash"></span></button>
                </div>
            </div>
            <div class="total">
                <h3>Total:
                    <span class="price">{{ total }} so'm</span>
                </h3>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: false,
                cartProducts: false,
                total: 0
            }
        },
        methods: {
            addToCart(product, i) {
                axios.post('/api/cart/add', {
                        id: product
                    })
                    .then(res => {
                        if (res.data == 1) {
                            this.total += this.products[i].price
                            this.cartProducts.push(this.products[i])
                            this.products[i].canAddToCart = false
                        }
                    })
            },
            removeFromCart(product, i) {
                axios.post('/api/cart/remove', {
                        id: product
                    })
                    .then(res => {
                        if (res.data == 1) {
                            for (const j in this.cartProducts) {
                                this.total -= this.products[i].price
                                this.cartProducts.splice(j, 1)
                            }
                            this.products[i].canAddToCart = true
                        }
                    })
            },
            closeCartMenu() {
                document.getElementById('cart-menu').classList.remove('active')
                document.body.classList.remove('cart-menu-opened')
            }
        },
        created() {
            axios.get(`/api/products/${id}`)
                .then(res => {
                    this.product = res.data
                })
            axios.get('/api/cart')
                .then(res => {
                    this.cartProducts = res.data
                    for (const i in this.cartProducts) {
                        this.total += this.cartProducts[i].price
                    }
                })
        }
    }
</script>
