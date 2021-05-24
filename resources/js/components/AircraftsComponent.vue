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
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    
                    // ここにデータを表示
                    <h3>登録機体</h3>
                    <p>-results-----------------</p>
                    {{results}}
                    <p>-------------------------</p>
                    <div v-for="aircraft in results" :key="aircraft.index">
                        <p>=========================</p>
                        <p>ID：{{ aircraft.id }}</p>
                        <p>製造者名：{{ aircraft.manufacturer }}</p>
                        <p>機体名称：{{ aircraft.name }}</p>
                        <p>製造番号等：{{ aircraft.serialNo }}</p>
                        <p>所有者名：{{ aircraft.owner }}</p>
                        <p>機体の種類：{{ aircraft.type }}</p>
                        <p>最大離陸重量(kg)：{{ aircraft.weight }}</p>
                        <p>報告義務機体フラグ：{{ aircraft.is_report }}</p>
                        <p>=========================</p>
                    </div>
                </div>
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
            results: null,
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
            // routes/api.phpにルーティングを設定する
            // Route::get('aircrafts', 'AircraftController@index');
            // ↑これがControllerとの紐づけ定義
            const {data} = await axios.get('/aircrafts')
            this.results = data
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
