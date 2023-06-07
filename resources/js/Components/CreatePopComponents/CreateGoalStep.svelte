<script>
	import BigInput from './../BigInput.svelte';
    import Button from "../Button.svelte";
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'
    import { pop } from './../../stores.js';

    let steps = [
        'stap 1',
    ];

    function addStep(e) {
        e.preventDefault();
        steps = [...steps, `stap ${steps.length + 1}`];
    }
</script>

<div>
    <h4>Hoe ga ik dit doen?</h4>
    <div class="container">
        {#each steps as step}
            <div class="step">
                <BigInput noMargin text={step} />
            </div>
        {/each}
        <Button onClick={(e) => addStep(e)} icon>
            <FaPlus />
        </Button>
    </div>
</div>

<style>
    .container{
        display: flex;
        flex-wrap: wrap;
        gap: 1em;
        align-items: center;
        height: fit-content;
    }

    h4{
        font-size: 1.5em;
        font-weight: 700;
    }
</style>