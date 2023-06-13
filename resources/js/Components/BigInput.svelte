<script lang="ts">
    export let key: string;
    export let text: string;
    export let onChange: (key: String, value: String) => void;
    export let wide: boolean = false;
    export let small: boolean = false;
    export let noMargin: boolean = false;
    export let value: string = '';
</script>

<div class:wide={wide} class:small={small} class="inputContainer" class:noMargin={noMargin}>
    <label for={text}>{text}</label>
    <textarea on:change={(e) => {onChange(key, e.currentTarget.value)}} value={value||''} name={text} id={text} placeholder="Type hier..."></textarea>
</div>

<style>
    label{
        font-size: 1.5em;
        margin-top: 1.5em;
        font-weight: 700;
        margin-bottom: 1em;
    }

    .inputContainer{
        margin-top: 2em;
        width: 30%;
        min-width: 40em;
    }
    
    textarea{
        width: 100%;
        height: 5em;
        border: 1px solid #00A667;
        border-radius: .5em;
        padding: .5em;
        font-size: 1.5em;
        font-family: Arial, Helvetica, sans-serif;
        resize: none;
    }

    textarea:focus{
        outline: 1.2px solid #00A667;
    }

    .wide{
        width: 80%;
    }

    .small{
        width: 10%;
    }

    .noMargin{
        margin: 0;
    }
</style>