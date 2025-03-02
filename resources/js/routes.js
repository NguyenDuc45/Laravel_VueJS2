import ProductList from "./components/products/List.vue";
import ProductShow from "./components/products/Show.vue";
import ProductCreate from "./components/products/Create.vue";
import ProductEdit from "./components/products/Edit.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: ProductList,
    },
    {
        name: "productList",
        path: "/product",
        component: ProductList,
    },
    {
        name: "productShow",
        path: "/product/:id/show",
        component: ProductShow,
    },
    {
        name: "productCreate",
        path: "/product/create",
        component: ProductCreate,
    },
    {
        name: "productEdit",
        path: "/product/:id/edit",
        component: ProductEdit,
    },
];
