<script>
	import BigInput from './../BigInput.svelte';
    import Button from "../Button.svelte";
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'

    export let goal;
    export let updateGoal;

    let steps = [];
    console.log(steps);
    function updateSteps(key, value) {
        steps[key] = value;
        updateGoal('steps', steps);
    }

    if(goal.steps === undefined || goal.steps.length === 0) {
        updateSteps(0, {id: 1, value: ''});
        console.log(goal.steps)
    }

    function addStep(e) {
        e.preventDefault();
        steps = [...steps, {id: steps.length + 1, value: ''}];
        steps = steps;
        updateGoal('steps', steps);
        console.log(steps)
    }

    function updateStep(step, value) {
        updateSteps(step, {id: step+1, value: value});
    }
</script>

<div>
    <h4>Hoe ga ik dit doen?</h4>
    <div class="container">
        {#each goal.steps as step, i}
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