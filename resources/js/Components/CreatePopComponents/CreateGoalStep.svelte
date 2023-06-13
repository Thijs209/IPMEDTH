<script>
	import BigInput from './../BigInput.svelte';
    import Button from "../Button.svelte";
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'
    import { pop } from './../../stores.js';
    import { goal } from './../../stores.js';

    if(!$goal.steps) {
        goal.update((goal) => {
            goal.steps = [{step: 0, value: ''}];
            return goal;
        });
    }

    function addStep(e) {
        e.preventDefault();
        goal.update((goal) => {
            goal.steps = [...goal.steps, {step: goal.steps.length + 1, value: ' '}];
            return goal;
        });
    }

    function updateStep(step, value) {
        goal.update((goal) => {
            goal.steps[step].value = value;
            return goal;
        });
    }
</script>

<div>
    <h4>Hoe ga ik dit doen?</h4>
    <div class="container">
        {#each $goal.steps as step, i}
            <div class="step">
                <BigInput key={i} onChange={updateStep} noMargin text={`Stap ${i+1}`} />
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