<template>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="text-bold">{{ title }}</span></div>
                <div class="panel-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        props: [
            'title'
        ]
    }
</script>
