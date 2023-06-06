<script lang="ts">
	import Button from './../Button.svelte';
	import IconHolder from './../IconHolder.svelte';
    import IoIosRadioButtonOff from 'svelte-icons/io/IoIosRadioButtonOff.svelte'
    import FaMinus from 'svelte-icons/fa/FaMinus.svelte'
    import FaTrash from 'svelte-icons/fa/FaTrash.svelte'

    export let deleteTextField: () => void;
    export let updateTextField: (event: any) => void;
</script>

<div class='container'>
    <input type="text" placeholder="Type hier..." on:keypress={(e) => updateTextField(e)} />
    <Button icon style="color:#ff00007d" onClick={() => deleteTextField()} >
        <FaTrash />
    </Button>
</div>

<style>
    .container{
        display: flex;
        flex-direction: row;
        gap: .5em;
        align-items: center;
        margin-bottom: 1em;
    }

    input{
        border: none;
        width: 100%;
        font-size: 1.5em;
        font-family: Arial, Helvetica, sans-serif;
    }

    input:focus{
        outline: none;
    }
</style>