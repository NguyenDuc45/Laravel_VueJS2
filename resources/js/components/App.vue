<script setup>
import Header from './blocks/header.vue'
import Sidebar from './blocks/sidebar.vue'
</script>

<template>
    <main>
        <div id="layout-wrapper">

            <!-- <Header /> -->

            <Sidebar />

            <div class="vertical-overlay"></div>

            <div class="main-content">
                <div class="page-content">
                    <div class="container mt-5">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>

    </main>
</template>

<script>
export default {}
</script>
