<script>
	import ShowGoal from './../Components/CreatePopComponents/ShowGoal.svelte';
	import Button from './../Components/Button.svelte';
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'
    import { pop } from './../stores.js';
    import CreatePopGoal from '../Components/CreatePopComponents/CreatePopGoal.svelte';
    import InputPopUp from '../Components/InputPopUp.svelte';

    export let setCurrentPage;

    let text;
    let openGoal = null;

    function updateText(key, value) {
        text = value;
    }

    let overlayOpen = false;

    function changeOverlayOpen() {
        overlayOpen = !overlayOpen;
    }

    function addGoal() {
        pop.update((pop) => {
            pop.goals = [...pop.goals, {name: text}];
            return pop;
        });
        changeOverlayOpen();
        setCurrentPage(10);
    }
</script>

<div class="container">
    <div class="goalsContainer">
        <h3>Doelen:</h3>
        {#if $pop.goals.length === 0}
            <h3 class="disabledText">Voeg een doel toe</h3>
        {:else}
            {#each $pop.goals as goal}
                <CreatePopGoal onClick={() => openGoal = goal.id} title={goal.name} />
            {/each}
        {/if}
        <Button marginTop onClick={changeOverlayOpen} icon>
            <FaPlus />
        </Button>
        {#if overlayOpen}
            <InputPopUp text={text} updateText={updateText} addGoal={addGoal} changeOverlayOpen={changeOverlayOpen} label='Doel naam' />
        {/if}
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