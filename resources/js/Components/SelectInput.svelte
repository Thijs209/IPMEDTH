<script>
    export let options;
    export let onChange;
    export let text;
    export let key;
    export let center;
    export let wide;
</script>

<div class:wide={wide} class:center={center}>
    {#if text}
        <label for={key}>{text}</label><br>
    {/if}
    <select name={key} on:change={(e) => onChange(key, e.target.value)} id={key}>
        {#each options as option}
        <option value={option}>{option}</option>
        {/each}
    </select>
</div>
    
<style>
    .wide{
        width: 80%;
    }
    
    div{
        width: 30%;
    }
    
    .center{
        grid-column: span 2;
        margin: auto;
    }

    label{
        font-size: 1.5em;
        margin-top: 1.5em;
        font-weight: 700;
        margin-bottom: 1em;
    }

    select{
        margin: auto;
        width: 100%;
        height: 3em;
        border: 1px solid #00A667;
        border-radius: .5em;
        padding: .5em;
        font-size: 1.5em;
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;
        resize: none;
        background-color: white;
    }

    select:focus{
        outline: none
    }
</style>