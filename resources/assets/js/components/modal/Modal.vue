<template>
    <div v-bind:id="name" class="modal fade" tabindex="-1" role="dialog" v-bind:aria-labelledby="name">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name']
    }
</script>