<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Chỉnh sửa sản phẩm</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" v-model="product.ten_san_pham">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" class="form-control" v-model="product.ma_san_pham">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" class="form-control" v-model="product.gia">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input type="number" class="form-control" v-model="product.gia_khuyen_mai">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" v-model="product.so_luong">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Ngày nhập</label>
                                    <input type="datetime-local" class="form-control" v-model="product.ngay_nhap">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control" v-model="product.mo_ta"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control" v-model="product.trang_thai">
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="0">Không hoạt động</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Sửa</button>
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
                ten_san_pham: "",
                ma_san_pham: "",
                gia: "",
                gia_khuyen_mai: "",
                so_luong: "",
                ngay_nhap: "",
                mo_ta: "",
                trang_thai: "",
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
                const { ten_san_pham, ma_san_pham, gia, gia_khuyen_mai, so_luong, ngay_nhap, mo_ta, trang_thai } = response.data

                this.product.ten_san_pham = ten_san_pham
                this.product.ma_san_pham = ma_san_pham
                this.product.gia = gia
                this.product.gia_khuyen_mai = gia_khuyen_mai
                this.product.so_luong = so_luong
                this.product.ngay_nhap = ngay_nhap
                this.product.mo_ta = mo_ta
                this.product.trang_thai = trang_thai
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
