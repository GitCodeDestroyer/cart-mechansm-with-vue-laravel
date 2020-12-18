(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{1:function(t,a,s){"use strict";function e(t,a,s,e,r,o,c,i){var n,d="function"==typeof t?t.options:t;if(a&&(d.render=a,d.staticRenderFns=s,d._compiled=!0),e&&(d.functional=!0),o&&(d._scopeId="data-v-"+o),c?(n=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(c)},d._ssrRegister=n):r&&(n=i?function(){r.call(this,(d.functional?this.parent:this).$root.$options.shadowRoot)}:r),n)if(d.functional){d._injectStyles=n;var l=d.render;d.render=function(t,a){return n.call(a),l(t,a)}}else{var u=d.beforeCreate;d.beforeCreate=u?[].concat(u,n):[n]}return{exports:t,options:d}}s.d(a,"a",(function(){return e}))},38:function(t,a,s){"use strict";s.r(a);var e={data:function(){return{products:!1,cartProducts:!1,total:0}},methods:{addToCart:function(t,a){var s=this;axios.post("/api/cart/add",{id:t}).then((function(t){1==t.data&&(s.total+=s.products[a].price,s.cartProducts.push(s.products[a]),s.products[a].canAddToCart=!1)}))},removeFromCart:function(t,a){var s=this;axios.post("/api/cart/remove",{id:t}).then((function(t){if(1==t.data){for(var e in s.cartProducts)s.cartProducts[e].id===s.products[a].id&&(s.total-=s.cartProducts[e].price,s.cartProducts.splice(e,1));s.products[a].canAddToCart=!0}}))},closeCartMenu:function(){document.getElementById("cart-menu").classList.remove("active"),document.body.classList.remove("cart-menu-opened")}},created:function(){var t=this;axios.get("/api/products").then((function(a){t.products=a.data})),axios.get("/api/cart").then((function(a){for(var s in t.cartProducts=a.data,t.cartProducts)t.total+=t.cartProducts[s].price}))}},r=s(1),o=Object(r.a)(e,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",[s("h1",[t._v("Home")]),t._v(" "),t._l(t.products,(function(a,e){return s("div",{key:a.id},[s("img",{attrs:{src:a.images.replace(/\'/gi,"").split(",")[0],alt:""}}),t._v(" "),s("h4",[t._v(t._s(a.title))]),t._v(" "),s("p",[t._v(t._s(a.price)+" so'm")]),t._v(" "),s("button",{directives:[{name:"show",rawName:"v-show",value:a.canAddToCart,expression:"product.canAddToCart"}],on:{click:function(s){return t.addToCart(a.id,e)}}},[t._v("Add to Cart")]),t._v(" "),s("button",{directives:[{name:"show",rawName:"v-show",value:!a.canAddToCart,expression:"!product.canAddToCart"}],on:{click:function(s){return t.removeFromCart(a.id,e)}}},[t._v("Remove from Cart")])])})),t._v(" "),s("div",{staticClass:"cart-items",attrs:{id:"cart-menu"}},[s("div",{staticClass:"left-menu"},[s("button",{staticClass:"c-btn",on:{click:function(a){return t.closeCartMenu()}}},[s("span",{staticClass:"pe-7s-angle-right"})])]),t._v(" "),s("div",{staticClass:"clearfix"}),t._v(" "),s("div",{staticClass:"products"},[s("p",{directives:[{name:"show",rawName:"v-show",value:!t.cartProducts||Array.isArray(t.cartProducts)&&0==t.cartProducts.length,expression:"!cartProducts || Array.isArray(cartProducts) && cartProducts.length == 0"}],staticClass:"no-items"},[t._v("There are no items")]),t._v(" "),t._l(t.cartProducts,(function(a,e){return s("div",{key:a.id,staticClass:"product"},[s("div",{staticClass:"image"},[s("img",{attrs:{src:a.images.replace(/\'/gi,"").split(",")[0],alt:""}})]),t._v(" "),s("div",{staticClass:"about"},[s("h4",[s("a",{attrs:{href:""}},[t._v(t._s(a.title))])]),t._v(" "),s("p",[s("span",{staticClass:"price"},[t._v(t._s(a.price)+" so'm")]),t._v(" "),s("span",{directives:[{name:"show",rawName:"v-show",value:a.available,expression:"cartProduct.available"}],staticClass:"available"},[s("span",{staticClass:"pe-7s-check",staticStyle:{float:"left",margin:"5px 5px 5px 10px"}}),t._v(" "),s("span",[t._v("Available")])]),t._v(" "),s("span",{directives:[{name:"show",rawName:"v-show",value:!a.available,expression:"!cartProduct.available"}],staticClass:"available"},[s("span",{staticClass:"pe-7s-close-circle",staticStyle:{float:"left",margin:"5px 5px 5px 10px"}}),t._v(" "),s("span",[t._v("Not Available")])])])]),t._v(" "),s("button",{directives:[{name:"show",rawName:"v-show",value:!a.canAddToCart,expression:"!cartProduct.canAddToCart"}],staticClass:"remove-cart-item",on:{click:function(s){return t.removeFromCart(a.id,e)}}},[s("span",{staticClass:"pe-7s-trash"})])])}))],2),t._v(" "),s("div",{staticClass:"total"},[s("h3",[t._v("Total:\n                "),s("span",{staticClass:"price"},[t._v(t._s(t.total)+" so'm")])])])])],2)}),[],!1,null,null,null);a.default=o.exports}}]);