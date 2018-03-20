<template>
    <span>
        <button class="btn btn-xs btn-primary" @click.stop.prevent="update(rowData,index)"><i class="icon-pencil"></i></button>
        <button class="btn btn-xs btn-danger" @click.stop.prevent="deleteRow(rowData,index)"><i class="icon-trash"></i></button>
    </span>
</template>

<script>
    export default {
        name: 'user-actions',
        props: {
            rowData: {
                type: Object
            },
            field: {
                type: String
            },
            index: {
                type: Number
            }
        },
        methods: {
            update(){
                let params = {type: 'edit', index: this.index, rowData: this.rowData};
                this.$emit('on-custom-comp', params);
            },

            deleteRow(){
                let params = {type: 'delete', index: this.index};
                this.$emit('on-custom-comp', params);

            }
        }
    }
</script>

<style>
    .custom-actions button.ui.button {
        padding: 8px 8px;
    }

    .custom-actions button.ui.button > i.icon {
        margin: auto !important;
    }
</style>