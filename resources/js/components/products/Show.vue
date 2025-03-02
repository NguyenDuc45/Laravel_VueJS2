<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Product</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="product.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="product.description">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "update-product",
    data() {
        return {
            product: {
                title: "",
                description: "",
                _method: "patch"
            }
        }
    },
    mounted() {
        this.showProduct()
    },
    methods: {
        async showProduct() {
            await this.axios.get(`/api/product/${this.$route.params.id}`).then(response => {
                const { title, description } = response.data
                this.product.title = title
                this.product.description = description
            }).catch(error => {
                console.log(error)
            })
        },
        async update() {
            await this.axios.post(`/api/product/${this.$route.params.id}`, this.product).then(response => {
                this.$router.push({ name: "productList" })
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>
