import { shallowMount } from "@vue/test-utils";
import List from "../../resources/js/components/products/List.vue";
import axios from "axios";

// Mock axios
jest.mock("axios");

describe("List.vue", () => {
    let wrapper;

    beforeEach(() => {
        wrapper = shallowMount(List, {
            global: {
                mocks: {
                    axios,
                },
            },
        });
    });

    it("renders the component correctly", () => {
        expect(wrapper.exists()).toBe(true);
    });

    it("fetches products on mount", async () => {
        const mockProducts = [
            {
                id: 1,
                ma_san_pham: "SP001",
                ten_san_pham: "Sản phẩm 1",
                gia: 100,
                gia_khuyen_mai: 80,
                trang_thai: 1,
            },
            {
                id: 2,
                ma_san_pham: "SP002",
                ten_san_pham: "Sản phẩm 2",
                gia: 200,
                gia_khuyen_mai: 180,
                trang_thai: 0,
            },
        ];

        axios.get.mockResolvedValue({ data: mockProducts });

        await wrapper.vm.getProducts();

        expect(wrapper.vm.products).toEqual(mockProducts);
    });

    it("displays product data in table", async () => {
        wrapper.setData({
            products: [
                {
                    id: 1,
                    ma_san_pham: "SP001",
                    ten_san_pham: "Sản phẩm 1",
                    gia: 100,
                    gia_khuyen_mai: 80,
                    trang_thai: 1,
                },
            ],
        });

        await wrapper.vm.$nextTick();

        expect(wrapper.find("tbody").text()).toContain("SP001");
        expect(wrapper.find("tbody").text()).toContain("Sản phẩm 1");
        expect(wrapper.find("tbody").text()).toContain("100");
        expect(wrapper.find("tbody").text()).toContain("80");
        expect(wrapper.find("tbody").text()).toContain("Active");
    });

    it("calls deleteProduct when delete button is clicked", async () => {
        window.confirm = jest.fn().mockReturnValue(true);

        axios.delete.mockResolvedValue({});

        wrapper.setData({
            products: [
                {
                    id: 1,
                    ma_san_pham: "SP001",
                    ten_san_pham: "Sản phẩm 1",
                    gia: 100,
                    gia_khuyen_mai: 80,
                    trang_thai: 1,
                },
            ],
        });

        await wrapper.vm.$nextTick();

        const deleteButton = wrapper.find("button.btn-danger");
        await deleteButton.trigger("click");

        expect(axios.delete).toHaveBeenCalledWith("/api/product/1");
    });
});
