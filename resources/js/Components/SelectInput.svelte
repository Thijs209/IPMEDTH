<script>

    export let options;
    export let onChange;
    export let text;
</script>

<select name={text} id={text}>
    {#each options as option}
    <option value={option}>{option}</option>
    {/each}
</select>
    
<style>
    select{
        grid-column: span 2;
        margin: auto;
        width: 30%;
        height: 3em;
        border: 1px solid #00A667;
        border-radius: .5em;
        padding: .5em;
        font-size: 1.5em;
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;
        resize: none;
    }

    select:focus{
        outline: none
    }
</style>