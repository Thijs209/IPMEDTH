<script>
	import Button from './../Components/Button.svelte';
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'
    import { pop } from './../stores.js';
    import CreatPopGoal from '../Components/CreatePopComponents/CreatPopGoal.svelte';

    export let setCurrentPage;

    function addGoal(name) {
        console.log(name);
        $pop.goals = [...$pop.goals, {name: name}];
        console.log($pop.goals);
    }
</script>

<div class="container">
    <div class="goalsContainer">
        <h3>Doelen:</h3>
        {#if $pop.goals.length === 0}
            <h3 class="disabledText">Voeg een doel toe</h3>
        {:else}
            {#each $pop.goals as goal}
                <CreatPopGoal title={goal.name} />
            {/each}
        {/if}
        <Button marginTop onClick={() => setCurrentPage(10)} icon>
            <FaPlus />
        </Button>
    </div>
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

    .goalsContainer{
        
    }
</style>