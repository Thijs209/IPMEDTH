<script>
	import SelectInput from './../Components/SelectInput.svelte';
	import CreateGoalStep from './../Components/CreatePopComponents/CreateGoalStep.svelte';
    import BigInput from '../Components/BigInput.svelte';
    import Button from '../Components/Button.svelte';
	import IconHolder from './../Components/IconHolder.svelte';
    import FaArrowLeft from 'svelte-icons/fa/FaArrowLeft.svelte'
    import Datepicker from '../Components/Datepicker.svelte';

    export let setCurrentPage;
    // export const goal = writable({
    //     id: 0,
    //     title: '',
    //     what: '',
    //     why: '',
    //     show: false,
    //     how: [{
    //         step: '',
    //         value: '',
    //     }],
    //     satisfied: '',
    //     support: '',
    //     when: '',
    //     feedback: '',
    //     type: '',
    // });

    let goal = {};
    function updateGoal(key, value) {
        goal[key] = value;
        updateGoals('goals', goal);
    }

    let datePicker = true;
    function changeDatePicker(e) {
        e.preventDefault()
        datePicker = !datePicker;
    }

    const people = [
        'jan',
        'piet',
        'joris',
        'korneel',
    ]

    const options = [
        'persoonlijk',
        'profesionneel',
        'project',
        'team',
        'organisatie',
    ]

    function saveGoal(e){
        e.preventDefault();
        pop.update((pop) => {
            pop.goals = [...pop.goals, $goal];
            return pop;
        });
        console.log($pop.goals)
        setCurrentPage(3);
    }
</script>

<div>
    <div class="header">
        <Button icon onClick={() => setCurrentPage(3)}>
            <FaArrowLeft />
        </Button>
        <h3>{$pop.goals[1].name}</h3>
    </div>
    <form>
        <BigInput key='what' onChange={updateGoal} wide text="Wat wil ik leren?" />
        <BigInput key="why" onChange={updateGoal} wide text="Waarom wil ik dit leren?" />
        <div class="steps">
            <CreateGoalStep onChange={updateGoal} />
        </div>
        <BigInput key="satisfied" onChange={updateGoal} wide text="Wanneer ben ik tevreden?" />
        <BigInput key='support' onChange={updateGoal} wide text="Welke ondersteuning heb ik nodig?" />
        <div>
            <button class="button" on:click={(e) => changeDatePicker(e)} class:checked={datePicker}>Datum</button>
            <button class="button" on:click={(e) => changeDatePicker(e)} class:checked={!datePicker}>Moment</button>
            {#if datePicker}
                <Datepicker onChange={updateGoal} key='when' marginTop text="Wanneer wil ik dit resultaat bereiken" />
            {:else}
                <BigInput key='when' onChange={updateGoal} wide text="Wanneer wil ik dit resultaat bereiken?" />
            {/if}
        </div>
        <SelectInput wide text="Van wie wil ik feedback ontvangen?" onChange={updateGoal} key="feedback" options={people} />
        <SelectInput onChange={updateGoal} key='type' center options={options} />
        <Button style='margin: auto; grid-column: span 2' onClick={saveGoal} text="Opslaan" />
    </form>
</div>

<style>
    .header{
        display: flex;
        align-items: center;
        gap: 1em;
    }

    .steps{
        grid-column: span 2;
        width: 100%;
    }

    form{
        display: grid;
        justify-items: left;
        gap: 1em;
        grid-template-columns: 1fr 1fr;
        align-items: center;
    }

    button{
        padding: .5em 1em;
        border: none;
        background-color: #ccc;
        border-radius: 5px;
        font-size: 1.5em;
        font-weight: 600;
    }

    .checked{
        background-color: green;
        color: white;
    }
</style>