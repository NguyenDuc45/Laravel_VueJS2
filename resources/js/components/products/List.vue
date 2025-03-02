<template>
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm</h4>
                        <router-link :to='{ name: "productCreate" }' class="btn btn-soft-success material-shadow-none">
                            <i class="ri-add-circle-line align-middle me-1"></i>
                            Thêm sản phẩm</router-link>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá sản phẩm</th>
                                            <th scope="col">Giá khuyến mãi</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="products.length > 0">
                                        <tr v-for="(product, key) in products" :key="key">
                                            <td>{{ product.ma_san_pham }}</td>
                                            <td>{{ product.ten_san_pham }}</td>
                                            <td>{{ product.gia }}</td>
                                            <td>{{ product.gia_khuyen_mai }}</td>
                                            <td v-if="product.trang_thai == 0">
                                                <span
                                                    class="badge bg-danger-subtle text-danger text-uppercase">Unactive</span>
                                            </td>
                                            <td v-if="product.trang_thai == 1">
                                                <span
                                                    class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                            </td>
                                            <td>
                                                <router-link :to='{ name: "productShow", params: { id: product.id } }'
                                                    class="btn btn-sm btn-primary">Xem</router-link>
                                                <router-link :to='{ name: "productEdit", params: { id: product.id } }'
                                                    class="btn btn-sm btn-success">Sửa</router-link>
                                                <button type="button" @click="deleteProduct(product.id)"
                                                    class="btn btn-sm btn-danger">Xóa</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "products",
    data() {
        return {
            products: []
        }
    },
    mounted() {
        this.getProducts()
    },
    methods: {
        async getProducts() {
            await this.axios.get('/api/product').then(response => {
                this.products = response.data
            }).catch(error => {
                console.log(error)
                this.products = []
            })
        },
        deleteProduct(id) {
            if (confirm("Bạn muốn xóa sản phẩm này không?")) {
                this.axios.delete(`/api/product/${id}`).then(response => {
                    this.getProducts()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>
