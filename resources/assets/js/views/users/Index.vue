<template>
    <app-panel title="Usuários">

    </app-panel>
</template>

<script>
    import DataTable from 'vstx-data-table'

    export default {
        components: {
            'data-table': DataTable
        },
        data () {
            return {
                data: []
            }
        }
    }
</script>