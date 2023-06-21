<script>
    import Button from '../Components/Button.svelte';
    import CreatePageHeader from '../Components/CreatePageHeader.svelte';
    import CreateGoal from './CreateGoal.svelte';
	import CreatePopGoals from './CreatePopGoals.svelte';
    import CreatePopIntro from './CreatePopIntro.svelte';
	import CreatePopProject from './CreatePopProject.svelte';
    import CreateProjectCoreQuadrants from './CreateProjectCoreQuadrants.svelte';
    import { writable } from 'svelte/store';
    import VerifyPop from './VerifyPop.svelte';
    import { text } from '@sveltejs/kit';
    import { router } from '@inertiajs/svelte'

    const pages = [
        'Intro',
        'Opdracht',
        'Kernkwadranten',
        'Doelen',
        'Afronden'
    ];

    let pop = {'goals': [], 'user_id':1
    };
    function updatePop(key, value) {
        pop[key] = value;
        console.log(pop)
    }

    function addGoal(goal) {
        if(pop.goals[goal.id-1] === undefined) {
            updatePop('goals', [...pop.goals, goal]);
        } else {
            pop.goals[goal.id-1] = goal;
            updatePop('goals', pop.goals);
        }
    }
    
    let currentPage = 0;
    function nextPage() {
        currentPage++;
    };
    function previousPage() {
        currentPage--;
    }
    function setCurrentPage(page) {
        currentPage = page;
    };

    function savePop() {
        router.post('/post-pop', pop)
    }

    let openGoal = null;
    function setOpenGoal(goal) {
        openGoal = goal;
    }
</script>

<div class="container">
    <CreatePageHeader {currentPage} {pages} {setCurrentPage} />
    {#if currentPage == 0}
        <CreatePopIntro />
    {:else if currentPage == 1}
        <CreatePopProject pop={pop} updatePop={updatePop} />
    {:else if currentPage == 2}
        <CreateProjectCoreQuadrants pop={pop} updatePop={updatePop} />
    {:else if currentPage == 3}
        <CreatePopGoals openGoal={openGoal} setOpenGoal={setOpenGoal} pop={pop} setCurrentPage={setCurrentPage} />
    {:else if currentPage == 4}
        {console.log(pop)}
        <VerifyPop pop={pop} />
    {:else if currentPage == 10}
        <CreateGoal addGoal={addGoal} openGoal={openGoal} pop={pop} setCurrentPage={setCurrentPage} updatePop={updatePop} />
    {/if}
    {#if currentPage != 10}
        <div class="buttons">
            <Button onClick={previousPage} text={'vorige'} />
            {#if currentPage == 4}
                <Button onClick={savePop} text='Opslaan' />
            {:else}
                <Button onClick={nextPage} text={'Volgende'} />
            {/if}
        </div>
    {/if}
</div>

<style>
    .container {
        padding: 2em 4em;
    }

    .buttons {
        display: flex;
        justify-content: end;
        width: 100%;
        gap: 1em;
        margin-top: 4em;
    }
</style>
