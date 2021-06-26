<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">機体一覧</span>
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
                                <th class="text-center bg-info text-white d-md-table-cell">製造者名.</th>
                                <th class="text-center bg-info text-white d-md-table-cell">機体名称</th>
                                <th class="text-center bg-info text-white d-md-table-cell">製造番号等</th>
                                <th class="text-center bg-info text-white d-md-table-cell">所有者名</th>
                                <th class="text-center bg-info text-white d-md-table-cell">機体の種類</th>
                                <th class="text-center bg-info text-white d-md-table-cell">最大離陸重量(kg)</th>
                                <th class="text-center bg-info text-white d-md-table-cell">報告義務機体</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="aircraft in results" class="clickable" :key="aircraft.index" @click="onShow(aircraft.id)">
                                <td class="text-center align-middle">{{ aircraft.id }}</td>
                                <td class="text-center align-middle">{{ aircraft.manufacturer }}</td>
                                <td class="text-center align-middle">{{ aircraft.name }}</td>
                                <td class="text-center align-middle">{{ aircraft.serialNo }}</td>
                                <td class="text-center align-middle">{{ aircraft.owner }}</td>
                                <td class="text-center align-middle">{{ aircraft.type }}</td>
                                <td class="text-center align-middle">{{ aircraft.weight }}</td>
                                <td class="text-center align-middle">{{ aircraft.is_report }}</td>
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
            const response = await axios.get('/aircrafts')
            this.results = response.data.data
            this.isLoading = false
        },
        onCreate: function () {
            this.$router.push({ name: 'aircrafts.create' })
        },
        onShow: function (aircraft_id) {
            this.$router.push({ name: 'aircrafts.show', params: {aircraft_id: aircraft_id} })
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
