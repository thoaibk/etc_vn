<style lang="sass" scoped>

</style>
<style>

    .draggable{
        max-width: 400px;
    }
    .draggable .list-group-item{
        cursor: all-scroll;
        padding-right: 77px;
    }
    .list-group-item+.list-group-item{
        border-top-width: 1px;
    }
    .sortable-ghost {
        opacity: 0.5;
        background: #c8ebfb;
    }

    .relative{
        position: relative;
    }
    .relative .stage-edit-btn{
        position: absolute;
        right: 42px;
        padding: 1px 5px;
    }
    .relative .stage-delete-btn{
        position: absolute;
        right: 10px;
        padding: 1px 5px;
    }
    .stage-btn svg{
        font-size: 94%!important;
    }

</style>

<template>
    <div>
        <div class="row">
            <div class="col-md-3">
<!--                <b-form-group v-if="categoryAvailable.length > 0" label="Danh mục">-->
<!--                    <b-form-checkbox-group-->
<!--                        v-model="categorySelected"-->
<!--                        :options="categoryAvailable"-->
<!--                        value-field="id"-->
<!--                        text-field="name"-->
<!--                        name="flavour-2a"-->
<!--                        stacked-->
<!--                    ></b-form-checkbox-group>-->
<!--                </b-form-group>-->
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cấu hình menu</h3>
                        <div class="card-tools">
                            <b-button variant="outline-primary" size="sm" @click="activeMenuSidebar">Thêm menu</b-button>
                        </div>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>

        <b-sidebar id="sidebar-right" title="Thêm menu" :visible="displayMenuSidebar" @hidden="menuSidebarOnHidden" width="480px" right shadow>
            <div class="px-3 py-2">

                <div class="mb-3">
                    <b-nav tabs fill>
                        <b-nav-item :active="menuType == 'category'" @click="tabClick('category')">Danh mục</b-nav-item>
                        <b-nav-item :active="menuType == 'custom'" @click="tabClick('custom')">Link tùy chọn</b-nav-item>
                    </b-nav>
                </div>


                <b-form-group
                        id="fieldset-1"
                        label="Tiêu đề"
                >
                    <b-form-input v-model="menuTitle" placeholder="Tiêu đề menu"></b-form-input>

                </b-form-group>

                <b-form-group
                        id="fieldset-1"
                        label="Menu cha"
                >
                    <b-form-select v-model="menuParentSelected" :options="menuParent"></b-form-select>
                </b-form-group>

                <template v-if="menuType=='category'">
                    <b-form-group
                            id="fieldset-1"
                            label="Danh mục"
                    >
                        <b-form-select
                                v-model="categorySelected"
                                :options="categoryAvailable"
                                value-field="id"
                                text-field="name"
                        ></b-form-select>
                    </b-form-group>
                </template>
                <template v-else-if="menuType=='custom'">
                    <b-form-group
                            id="fieldset-1"
                            label="Link tùy chọn"
                    >
                        <b-form-input v-model="custom_link" placeholder="Link tùy chọn"></b-form-input>
                    </b-form-group>
                </template>

                <b-form-group
                        id="fieldset-1"
                        label=""
                >
                    <b-button variant="primary">Thêm menu</b-button>
                </b-form-group>

            </div>
        </b-sidebar>
    </div>
</template>


<script>
    import draggable from 'vuedraggable';
    import Axios from 'axios';
    export default {
        name: 'MenuManagement',
        components: {
            draggable,
        },
        data(){
            return {

                displayMenuSidebar: false,


                categorySelected: null,
                categoryAvailable: [
                    { value: null, text: 'Please select an option' },
                    { value: 1, text: 'This is First option' },
                    { value: 2, text: 'Selected Option' },
                ],

                menuParentSelected: null,
                menuParent: [
                    { value: null, text: 'Menu gốc' },
                    { value: 1, text: 'Danh mục 1' },
                    { value: 1, text: 'Danh mục 2' },
                ],

                menuType: 'category',

                menuTitle: '',
                custom_link: ''
            }
        },
        created(){
            this.getMenuInput();
        },
        methods:{
            getMenuInput(){
                Axios.get('/backend/api/options/menu/input').then(res => {
                    this.categoryAvailable = res.data.categories;
                }).catch((err) => {
                    console.log(err);
                })
            },

            tabClick(tab){
                this.menuType = tab;
            },

            activeMenuSidebar(){
                this.displayMenuSidebar = true;
            },

            menuSidebarOnHidden(){
                this.displayMenuSidebar = false;
            },

            stageDragUpdate(){
                let menuIndex = [];
                for (let index in this.menus){
                    menuIndex.push({id: this.menus[index].id, index: index});
                }
                console.log(menuIndex);

                // let payload = {stages: JSON.stringify(stageIndex)};
                //
                // PipelineRepository.updateStageIndex(this.pipeLine.id, payload).then(res => {
                //     this.stages = res.data.stages;
                // }).catch(err => {
                //     ErrorHandle(err);
                // })
            }
        }
    }
</script>
