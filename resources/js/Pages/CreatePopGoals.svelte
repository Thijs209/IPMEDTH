<script>
	import ShowGoal from './../Components/CreatePopComponents/ShowGoal.svelte';
	import Button from './../Components/Button.svelte';
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'
    import CreatePopGoal from '../Components/CreatePopComponents/CreatePopGoal.svelte';
    import InputPopUp from '../Components/InputPopUp.svelte';

    export let setCurrentPage;
    export let pop;
    export let openGoal;
    export let setOpenGoal;

    function addGoal(){
        setOpenGoal(null);
        setCurrentPage(10);
    }
</script>

<div class="container">
    <div class="goalsContainer">
        <h3>Doelen:</h3>
        {#if pop.goals?.length === 0 || pop.goals === undefined}
            <h3 class="disabledText">Voeg een doel toe</h3>
        {:else}
            {#each pop.goals as goal}
                <CreatePopGoal onClick={() => setOpenGoal(goal)} title={goal.what} />
            {/each}
        {/if}
        <Button marginTop onClick={() => addGoal()} icon>
            <FaPlus />
        </Button>
    </div>
    {#if openGoal !== null}
        <ShowGoal setCurrentPage={setCurrentPage} goal={openGoal} />
    {/if}
</div>

<style>
    .disabledText{
        color: #ccc;
        margin-top: .5em;
    }

    .container{
        display: grid;
        grid-template-columns: 1fr 2fr;
    }
</style>