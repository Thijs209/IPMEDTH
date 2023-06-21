<script>
	import CoreQuadrantInputRow from './CoreQuadrantInputRow.svelte';
	import CoreQuadrantField from './CoreQuadrantField.svelte';
    import Button from "../Button.svelte";
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'
    export let title;

    let inputFields = [{id: 0, text: ''}]; 

    function addTextField() {
        inputFields = [...inputFields, {id: inputFields.length, text: ''}];
    }

    function deleteTextField(index) {
        inputFields.splice(index, 1);
        inputFields = [...inputFields];
    }

    function updateTextField(event) {
        inputFields[inputFields.indexOf(event.target.value)] = event.target.value;
        inputFields = [...inputFields];
    }
</script>

<div class="container">
    <h4>{title}</h4>
    {#each inputFields as inputField (inputField.id)}
        <CoreQuadrantInputRow 
            deleteTextField={() => deleteTextField(inputField.id)} 
            updateTextField={(event) => updateTextField(event)}
        />
    {/each}
    <div class='center'>
        <Button icon onClick={() => addTextField()}>
            <FaPlus />
        </Button>
    </div>
</div>

<style>
    .container{
        margin-top: 2.5em;
        width: 100%;
        height: fit-content;
        box-shadow: 0 .2em .5em rgb(146, 146, 146);
        border-radius: 2em;
        padding: 2em;
    }

    h4{
        margin-bottom: 1em;
        font-size: 1.6em;
        text-align: center;
        border-bottom: 1px solid #00A667;
    }

    .center{
        margin: 0 auto;
        width: fit-content;
    }
</style>