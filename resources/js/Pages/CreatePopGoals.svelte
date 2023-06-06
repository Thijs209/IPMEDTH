<script>
	import IconHolder from './../Components/IconHolder.svelte';
	import Button from './../Components/Button.svelte';
    import FaPlus from 'svelte-icons/fa/FaPlus.svelte'
    import { pop } from './../stores.js';

    const goals = [
        'doel 1',
        'doel 2',
        'doel 3',
    ]

    function addGoal(name) {
        pop.update(p => {
            p.goals.push(name);
            return p;
        })
    }
    console.log(pop.goals);
</script>

<div>
    {#if pop.goals.length == 0}
        <h4>Voeg een doel toe</h4>
        {#each pop.goals as goal}
            <h4>{goal}</h4>
        {/each}
    {/if}
    <Button onClick={addGoal} icon>
        <FaPlus />
    </Button>
</div>