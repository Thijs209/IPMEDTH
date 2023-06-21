<script>
	import SelectInput from './../Components/SelectInput.svelte';
	import CreateGoalStep from './../Components/CreatePopComponents/CreateGoalStep.svelte';
    import BigInput from '../Components/BigInput.svelte';
    import Button from '../Components/Button.svelte';
	import IconHolder from './../Components/IconHolder.svelte';
    import FaArrowLeft from 'svelte-icons/fa/FaArrowLeft.svelte'
    import Datepicker from '../Components/Datepicker.svelte';

    export let setCurrentPage;
    export let pop;
    export let updatePop;
    export let addGoal;
    export let openGoal;

    
    let goal = openGoal||{datePicker: true, 'goalType': 'persoonlijk', 'feedback':'niemand' };
    function updateGoal(key, value) {
        goal[key] = value;
    }
    
    function changeDatePicker(e) {
        e.preventDefault()
        updateGoal('datePicker', !goal.datePicker)
    }

    const people = [
        'niemand',
        'jan',
        'piet',
        'joris',
        'korneel',
    ]

    const options = [
        "persoonlijk",
        "professioneel",
        "organisatie",
        "training",
        "functie",
        "gezondheid",
    ]

    function saveGoal(e){
        e.preventDefault();
        if(goal.id === undefined) {
            goal.id = pop.goals.length + 1;
        }
        addGoal(goal);
        setCurrentPage(3);
    }
    console.log(goal)
</script>

<div>
    <div class="header">
        <Button icon onClick={() => setCurrentPage(3)}>
            <FaArrowLeft />
        </Button>
    </div>
    <form>
        <BigInput key='what' value={goal?.what||''} onChange={updateGoal} wide text="Wat wil ik leren?" />
        <BigInput key="why" value={goal?.why||''} onChange={updateGoal} wide text="Waarom wil ik dit leren?" />
        <div class="steps">
            <CreateGoalStep goal={goal} updateGoal={updateGoal} onChange={updateGoal} />
        </div>
        <BigInput value={goal?.satisfied||''} key="satisfied" onChange={updateGoal} wide text="Wanneer ben ik tevreden?" />
        <BigInput value={goal?.support||''} key='support' onChange={updateGoal} wide text="Welke ondersteuning heb ik nodig?" />
        <div>
            <button class="button" on:click={(e) => changeDatePicker(e)} class:checked={goal.datePicker}>Datum</button>
            <button class="button" on:click={(e) => changeDatePicker(e)} class:checked={!goal.  datePicker}>Moment</button>
            {#if goal.datePicker}
                <Datepicker value={goal?.deadline||''} onChange={updateGoal} key='deadline' marginTop text="Wanneer wil ik dit resultaat bereiken" />
            {:else}
                <BigInput value={goal?.deadline||''} key='deadline' onChange={updateGoal} wide text="Wanneer wil ik dit resultaat bereiken?" />
            {/if}
        </div>
        <SelectInput value={goal?.feedback} text="Van wie wil ik feedback ontvangen?" onChange={updateGoal} key="feedback" options={people} />
        <SelectInput value={goal?.goalType} onChange={updateGoal} key='goalType' center options={options} />
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