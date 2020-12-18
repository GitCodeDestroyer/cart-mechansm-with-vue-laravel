let Home = () => import('./components/Home'),
    AddProduct = () => import('./components/AddProduct'),
    ViewProduct = () => import('./components/ViewProduct')

export const router = {
    mode: 'history',
    routes: [{
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/add-product',
            component: AddProduct,
            name: 'add-new-product'
        },
        {
            path: '/products/:id',
            component: ViewProduct,
            name: 'view-product'
        }
    ]
}
