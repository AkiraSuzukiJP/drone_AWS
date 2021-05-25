<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" key="admin">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">{{title}}</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    <form>
                        <div class="form-group required-label row">
                            <label for="manufacturer" class="col-sm-4 col-form-label text-md-right">製造者名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="manufacturer" v-model="aircraft.manufacturer"/>
                            </div>
                        </div>
                        <div class="form-group required-label row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">機体名称</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" v-model="aircraft.name"/>
                            </div>
                        </div>
                        <div class="form-group required-label row">
                            <label for="serialNo" class="col-sm-4 col-form-label text-md-right">製造番号等</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="serialNo" v-model="aircraft.serialNo"/>
                            </div>
                        </div>
                        <div class="form-group required-label row">
                            <label for="owner" class="col-sm-4 col-form-label text-md-right">所有者名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="owner" v-model="aircraft.owner"/>
                            </div>
                        </div>
                        <div class="form-group required-label row">
                            <label for="type" class="col-sm-4 col-form-label text-md-right">機体の種類</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="type" v-model="aircraft.type"/>
                            </div>
                        </div>
                        <div class="form-group required-label row">
                            <label for="weight" class="col-sm-4 col-form-label text-md-right">最大離陸重量(kg)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="weight" v-model="aircraft.weight"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_report" class="col-sm-4 col-form-label text-md-right">報告義務機体</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="is_report" v-model="aircraft.is_report"/>
                            </div>
                        </div>
                        
                        <div class="row-line">
                            <transition name="fade" mode="out-in">
                            <div class="alert alert-danger" role="alert" v-if="invalid">
                            {{errorMessage}}
                            </div>
                            </transition>
                        </div>
                    </form>
                    <div class="d-flex justify-content-start mt-4">
                        <div class="mr-auto">
                            <button type="button" class="btn btn-outline-danger" v-if="enable_delete" @click="onDelete">削除する</button>
                        </div>
                        <div class="mr-3">
                            <button type="button" class="btn btn-dark" @click="onBack">キャンセル</button>
                        </div>
                        <div v-if="mode!='create'">
                            <button type="button" class="btn btn-primary" @click="onStore">保存する</button>
                        </div>
                        <div v-else>
                            <button type="button" class="btn btn-primary" @click="onStore">登録する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>
</div>
</template>

<script>
export default {
    props: [
        'aircraft_id',
    ],
    data () {
        return {
            aircraft: {
                id: '',
                manufacturer: '',
                name: '',
                serialNo: '',
                owner: '',
                type: -1,
                weight: '',
                is_report: false,
            },        
            invalid: false,
            errorMessage: '',

            isLoading: false,
            fullPage: false,
        }
    },
    created () {
        this.getData()
    },
    watch: {
        // 
    },
    computed: {
        //own: function () {
        //    return this.$store.state.user
        //},
        title: function () {
            return this.mode == 'create' ? '新規作成' : '編集'
        },
        mode: function () {
            return this.aircraft_id ? 'update' : 'create'
        },
        enable_delete: function () {
            if (this.mode == 'create') {
                return false
            }
            return this.own.aircraft_id != this.aircraft_id
        },
    },
    methods: {
        getData: function () {
            this.isLoading = true;
            const api = axios.create()
            if (this.mode == "create") {
                this.isLoading = false
            } else {
                axios.all([
                    api.get('/api/customer/'+this.aircraft_id),
                    // api.get('/api/factory/selector'),
                    // api.get('/api/department/selector'),
                ]).then(axios.spread((res1, res2, res3) => {
                    this.aircraft = res1.data
                    this.isLoading = false
                }))
            }
        },
        onStore: function () {
            this.invalid = false

            
            if (!this.aircraft.manufacturer) {
                this.errorMessage = '製造者名を入力してください。'
                this.invalid = true
                return
            }
            if (!this.aircraft.name) {
                this.errorMessage = '機体名称を入力してください。'
                this.invalid = true
                return
            }
            if (!this.aircraft.serialNo) {
                this.errorMessage = '製造番号等を入力してください。'
                this.invalid = true
                return
            }
            if (!this.aircraft.owner) {
                this.errorMessage = '所有者名を入力してください。'
                this.invalid = true
                return
            }
            if (this.aircraft.type == -1) {
                this.errorMessage = '機体の種類を入力してください。'
                this.invalid = true
                return
            }
            if (!this.aircraft.weight) {
                this.errorMessage = '最大離陸重量(kg)を入力してください。'
                this.invalid = true
                return
            }
            if (!this.aircraft.is_report) {
                this.aircraft.is_report = false
            }

            let _this = this
            if (this.mode == 'create') {
                axios.post('/api/aircrafts', {
                    customer: this.aircraft,
                })
                .then(function (resp) {
                    if (resp.data.result) {
                        alert('登録しました。')
                        _this.$router.go(-1)
                    } else {
                        _this.errorMessage = resp.data.errorMessage
                        _this.invalid = true
                    }
                })
                .catch(function (resp) {
                    console.log(resp)
                });
            } else {
                axios.put('/api/aircrafts/'+this.aircraft.id, {
                    customer: this.aircraft,
                })
                .then(function (resp) {
                    if (resp.data.result) {
                        alert('更新しました。')
                        _this.$router.go(-1)
                    } else {
                        _this.errorMessage = resp.data.errorMessage
                        _this.invalid = true
                    }
                })
                .catch(function (resp) {
                    console.log(resp)
                });
            }
        },
        onBack: function () {
            this.$router.go(-1)
        },
        onDelete: function () {
            if (!confirm('削除してもよろしいですか？')) {
                return
            }
            let _this = this
            axios.delete('/api/aircrafts/'+this.aircraft.id)
            .then(function (resp) {
                alert('削除しました。')
                _this.$router.go(-1)
            })
            .catch(function (resp) {
                console.log(resp)
            })
            .finally(function () {
                //
            })
        },

    },
    components: {
        // Loading
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
.row-line {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    padding-bottom: 1rem;
}
.form-content {
    width: 12rem;
    padding-left: 1rem;
    padding-right: 1rem;
    display: inline-block;
}
.form-content-lg {
    width: 15rem;
    padding-left: 1rem;
    padding-right: 1rem;
    display: inline-block;
}
.required-label label:after {
    display: inline-block;
    margin-left: 5px;
    padding: 2px 4px;
    border-radius: 3px;
    background-color: #ec5d53;
    color: #fff;
    content: "必須";
    font-size: 9px;
    line-height: 10px;
}
</style>
