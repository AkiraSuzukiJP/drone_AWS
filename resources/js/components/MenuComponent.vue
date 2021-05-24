<template>
<div class="container">
	<div class="card text-center">
        <div class="card-body">
            <h3 class="title-margin mt-3 mb-5">メニュー</h3>
            <div class="d-flex flex-wrap justify-content-center mb-2">
                <router-link :to="{ name: 'aircrafts' }" class="btn btn-primary btn-menu mr-3 mb-3">機体一覧</router-link>
                <router-link :to="{ name: 'pilots' }" class="btn btn-primary btn-menu mr-3 mb-3">操縦者一覧</router-link>
                <router-link :to="{ name: 'inspectors' }" class="btn btn-primary btn-menu mr-3 mb-3">点検者一覧</router-link>
                <router-link :to="{ name: 'inspection_rrecords' }" class="btn btn-primary btn-menu mr-3 mb-3">点検記録一覧</router-link>
                <router-link :to="{ name: 'flight_records' }" class="btn btn-primary btn-menu mr-3 mb-3">飛行記録一覧</router-link>
                <router-link :to="{ name: 'setting' }" class="btn btn-secondary btn-menu mr-3 mb-3">設定管理</router-link>
            </div>
        </div>
	</div>
</div>
</template>

<script>
export default {
    props: {
        //
    },
    data () {
        return {
            //
        }
    },
    mounted () {
        //
    },
    watch: {
        //
    },
    computed: {
        // own() {
        //     return this.$store.state.user
        // },
    },
    methods: {
        //
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
.btn-menu {
    height: 6rem;
    width: 9rem;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
