<template>
    <div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th v-for="column in columns">{{ column }}</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td v-for="i in item">{{ i }}</td>
                <td>
                    <a href="">Editar</a> | <a href="">Remover</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['columns','items']
    }
</script>
