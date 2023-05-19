<script lang="ts">
    export let text: string;
</script>

<style>
    button{
        color: white;
        padding: .5em 1em;
        border: 1px solid #00A667;
        background-color: #00A667;
        border-radius: .5em;
        font-size: 1.1em;
        position: absolute;
        bottom: 2em;
        right: 2em;
    }
</style>

<button>
    {text}
</button>