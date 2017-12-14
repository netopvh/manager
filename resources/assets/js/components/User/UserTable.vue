<template>
    <div>
        <server-datasource
                source="/api/users"
                :columns="columns"
                :actions="actions"></server-datasource>
    </div>
</template>

<script>
    import { ServerDatasource } from 'vue-datasource'
    export default {
        components: {
            ServerDatasource
        },
        data () {
            return {
                columns: [
                    {
                        name: '#',
                        key: 'id'
                    },
                    {
                        name: 'Nome',
                        key: 'name'
                    },
                    {
                        name: 'Email',
                        key: 'email'
                    }
                ],
                actions: [
                    {
                        text: 'Click me',
                        icon: 'icon-pencil5',
                        class: 'btn-primary',
                        show(selectedRow) { // Event to define a condition to display the button with the selected row
                            return true
                        },
                        event(e, row) { // Event handler callback. Gets event instace and selected row
                            console.log('Click row: ', row); // If no row is selected, row will be NULL
                        }
                    }
                ]
            }
        }
    }
</script>
<style>

</style>