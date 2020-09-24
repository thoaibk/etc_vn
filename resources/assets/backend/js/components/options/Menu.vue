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
                <b-form-group v-if="categoryAvailable.length > 0" label="Danh mục">
                    <b-form-checkbox-group
                        v-model="categorySelected"
                        :options="categoryAvailable"
                        value-field="id"
                        text-field="name"
                        name="flavour-2a"
                        stacked
                    ></b-form-checkbox-group>
                </b-form-group>
            </div>
            <div class="col-md-9">
                <draggable class="draggable list-group" tag="ul" v-model="menus" @update="stageDragUpdate">
                    <li v-for="(menu, index ) in menus" :key="menu.id" class="relative list-group-item text-sm">
                        {{ menu.label }}
                    </li>
                </draggable>
            </div>
        </div>
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

                categorySelected: [],
                categoryAvailable: [],

                menus: [
                    {
                        id: 12,
                        label: 'Điện công nghiệp'
                    },
                    {
                        id: 14,
                        label: 'Máy bay'
                    },
                    {
                        id: 15,
                        label: 'Tầu điện'
                    }
                ]
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
