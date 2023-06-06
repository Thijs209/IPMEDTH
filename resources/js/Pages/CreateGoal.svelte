<script>
	import SelectInput from './../Components/SelectInput.svelte';
	import CreateGoalStep from './../Components/CreatePopComponents/CreateGoalStep.svelte';
    import BigInput from '../Components/BigInput.svelte';
    import Button from '../Components/Button.svelte';
	import IconHolder from './../Components/IconHolder.svelte';
    import FaArrowLeft from 'svelte-icons/fa/FaArrowLeft.svelte'

    export let setCurrentPage;

    const options = [
        'persoonlijk',
        'profesionneel',
        'project',
        'team',
        'organisatie',
    ]
</script>

<div>
    <div class="header">
        <Button icon onClick={() => setCurrentPage(3)}>
            <FaArrowLeft />
        </Button>
        <h3>Doel 1</h3>
    </div>
    <form>
        <BigInput wide text="Wat wil ik leren?" />
        <BigInput wide text="Waarom wil ik dit leren?" />
        <div class="steps">
            <CreateGoalStep />
        </div>
        <BigInput wide text="Wanneer ben ik tevreden?" />
        <BigInput wide text="Welke ondersteuning heb ik nodig?" />
        <BigInput wide text="Wanneer wil ik dit resultaat bereiken?" />
        <BigInput wide text="Van wie wil ik feedback ontvangen?" />
        <SelectInput text='Soort doel' options={options} />
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
    }
</style>