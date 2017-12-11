<template>
    <div>
        <code>query: {{ query }}</code>
        <datatable v-bind="$data" ></datatable>
    </div>
</template>

<script>
    export default {
        data: () => ({
            columns: [
                { title: 'User ID', field: 'uid', sortable: true },
                { title: 'Username', field: 'name' },
                { title: 'Age', field: 'age', sortable: true },
                { title: 'Email', field: 'email' },
                { title: 'Country', field: 'country' }
            ],
            data: [],
            total: 0,
            query: {}
        }),
        watch: {
            query: {
                handler (query) {

                },
                deep: true
            }
        }
    }
</script>

<style>

</style>