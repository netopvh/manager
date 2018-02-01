<template>
    <app-panel title="Usuários">
        <div>
            <vue-good-table
                    title="Demo Table"
                    :columns="columns"
                    :rows="rows"
                    :paginate="true"
                    :lineNumbers="true"
                    styleClass="table condensed table-bordered table-striped">
                <template slot="table-row" slot-scope="props">
                    <td>{{ props.row.name }}</td>
                    <td class="fancy">{{ props.row.age }}</td>
                    <td>{{ props.formattedRow.createdAt }}</td>
                    <td>{{ props.index }}</td>
                </template>
                <template slot="table-row-after" slot-scope="props">
                    <td>
                        <button @click="doSomething(props.index)">show</button>
                        <button @click="doSomething(props.index)">show</button>
                    </td>
                </template>
            </vue-good-table>
        </div>
    </app-panel>
</template>

<script>
    import Vue from 'vue'
    import VueGoodTable from 'vue-good-table'

    Vue.use(VueGoodTable);

    export default {
        data(){
            return {
                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                        filterable: true,
                    },
                    {
                        label: 'Age',
                        field: 'age',
                        type: 'number',
                        html: false,
                    },
                    {
                        label: 'Created On',
                        field: 'createdAt',
                        type: 'date',
                        inputFormat: 'YYYYMMDD',
                        outputFormat: 'DD/MM/YYYY',
                    },
                    {
                        label: 'Percent',
                        field: 'score',
                        type: 'percentage',
                        html: false,
                    },
                    {
                        label: 'Action',
                        html:true,
                        filterable: false,
                        sortable:false,
                    },

                ],
                rows: [
                    {id:1, name:"John",age:20,createdAt: '201-10-31',score: 0.03343},
                    {id:2, name:"Jane",age:24,createdAt: '2011-10-31',score: 0.03343},
                    {id:3, name:"Susan",age:16,createdAt: '2011-10-30',score: 0.03343},
                    {id:4, name:"Chris",age:55,createdAt: '2011-10-11',score: 0.03343},
                    {id:5, name:"Dan",age:40,createdAt: '2011-10-21',score: 0.03343},
                    {id:6, name:"John",age:20,createdAt: '2011-10-31',score: 0.03343},
                    {id:7, name:"Jane",age:24,createdAt: '2011-10-31'},
                    {id:8, name:"Susan",age:16,createdAt: '2013-10-31',score: 0.03343},
                    {id:9, name:"Chris",age:55,createdAt: '2012-10-31',score: 0.03343},
                    {id:10, name:"Dan",age:40,createdAt: '2011-10-31',score: 0.03343},
                    {id:11, name:"John",age:20,createdAt: '2011-10-31',score: 0.03343},
                    {id:12, name:"Jane",age:24,createdAt: '2011-07-31',score: 0.03343},
                    {id:13, name:"Susan",age:16,createdAt: '2017-02-28',score: 0.03343},
                    {id:14, name:"Chris",age:55,createdAt: '',score: 0.03343},
                    {id:15, name:"Dan",age:40,createdAt: '2011-10-31',score: 0.03343},
                    {id:19, name:"Chris",age:55,createdAt: '2011-10-31',score: 0.03343},
                    {id:20, name:"Dan",age:40,createdAt: '2011-10-31',score: 0.03343},
                ],
            };
        },
        methods:{
            doSomething(item){
                alert(item);
            }
        }
    }
</script>

<style scoped>

</style>