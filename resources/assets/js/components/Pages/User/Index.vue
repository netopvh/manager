<template>
    <app-panel title="Usuarios">
        
    </app-panel>
</template>

<script>

    import { ServerDatasource } from 'vue-datasource'

    export default {
        components: {
            ServerDatasource
        },
        data() {
            return {
                items: [
                    {
                        name: 'Angelo Neto'
                    },
                    {
                        name: 'Fabio Santos'
                    },
                    {
                        name: 'Jorge Azevedo'
                    },
                ],
                total: 100,
                columns: [
                    {
                        name: 'Nome',
                        key: 'name',
                        order: false
                    }
                ],
                actions: [
                    {
                        text: 'Click me', // Button label
                        icon: 'glyphicon glyphicon-check', // Button icon
                        class: 'btn-primary', // Button class (background color)
                        show(selectedRow) { // Event to define a condition to display the button with the selected row
                            return true
                        },
                        event(e, row) { // Event handler callback. Gets event instace and selected row
                            console.log('Click row: ', row); // If no row is selected, row will be NULL
                        }
                    }
                ]
            }

        },
        computed: {
            totalItems: function () {
                return this.items.length;
            }
        }
    }
</script>