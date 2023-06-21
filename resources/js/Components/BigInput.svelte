<script lang="ts">
    export let key: string;
    export let text: string;
    export let wide: boolean;
    export let small: boolean;
    export let noMargin: boolean;
    export let value: string;
    export let onChange: (key: String, value: String) => void;

    console.log(typeof onChange)
</script>

<div class:wide={wide} class:small={small} class="inputContainer" class:noMargin={noMargin}>
    <label for={text}>{text}</label>
    <textarea on:change={(e) => {onChange(key, e.currentTarget.value)}} value={value||''} name={text} id={text} placeholder="Type hier..."></textarea>
</div>

<style>
    label {
        font-size: 1.5rem;
        margin-top: 1.5rem;
        font-weight: 700;
        margin-bottom: 1em;
    }

    .inputContainer {
        margin-top: 2em;
        width: 30%;
        min-width: 40em;
    }

    textarea {
        width: 100%;
        height: 5em;
        border: 1px solid #00a667;
        border-radius: 0.5em;
        padding: 0.5em;
        font-size: 1.5em;
        font-family: Arial, Helvetica, sans-serif;
        resize: none;
    }

    textarea:focus{
        outline: 1.2px solid #00A667;
    }
</style>
