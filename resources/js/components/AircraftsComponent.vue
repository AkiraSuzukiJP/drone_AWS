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
            // Route::get('lesson/selector', 'API\LessonController@index');
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
