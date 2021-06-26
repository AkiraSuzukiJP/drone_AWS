<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header"操縦者一覧</span>
                        </div>
                        <div class="align-self-center mr-3">
                            <button type="button" class="btn btn-primary" @click="onCreate"><i class="fas fa-plus"></i> 新規作成</button>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>

                    <table class="table-custom" key="processes">
                        <thead>
                            <tr>
                                <th class="text-center bg-info text-white">ID</th>
                                <th class="text-center bg-info text-white d-md-table-cell">操縦者名.</th>
                                <th class="text-center bg-info text-white d-md-table-cell">所属名</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="pilot in results" class="clickable" :key="pilot.index" @click="onShow(pilot.id)">
                                <td class="text-center align-middle">{{ pilot.id }}</td>
                                <td class="text-center align-middle">{{ pilot.name }}</td>
                                <td class="text-center align-middle">{{ pilot.belong }}</td>
                            </tr>
                        </tbody>

                        <loading :active.sync="isLoading"></loading>
            
                    </table>

                </div>
            </div>
        </div>
    </div>
    <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>
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
            results: null,
            isLoading: false,
        }
    },
    mounted () {
        //
        this.getInit()
    },
    watch: {
        //
    },
    computed: {
        //
    },
    methods: {
        async getInit() {
            this.isLoading = true;
            // routes/api.phpにルーティングを設定する
            // Route::get('aircrafts', 'AircraftController@index');
            // ↑これがControllerとの紐づけ定義
            const response = await axios.get('/pilots')
            this.results = response.data.data
            this.isLoading = false
        },
        onCreate: function () {
            this.$router.push({ name: 'pilots.create' })
        },
        onShow: function (pilots_id) {
            this.$router.push({ name: 'pilots.show', params: {pilots_id: pilots_id} })
        },
        onBack() {
            this.$router.push({ name: 'menu' })
        }
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>
