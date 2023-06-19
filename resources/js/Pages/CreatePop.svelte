<script>
	import CreatePopGoals from './CreatePopGoals.svelte';
	import CreatePopProject from './CreatePopProject.svelte';
	import CreatePopIntro from './CreatePopIntro.svelte';
	import ProgressBar from './../Components/CreatePopComponents/ProgressBar.svelte';
	import Button from './../Components/Button.svelte';
	import CreatePopHeader from '../Components/CreatePopComponents/CreatePopHeader.svelte';
    import SideBar from './../Components/SideBar.svelte';
    import CreateProjectCoreQuadrants from './CreateProjectCoreQuadrants.svelte';
    import { writable } from 'svelte/store';
    import CreateGoal from './CreateGoal.svelte';
    import { router } from '@inertiajs/svelte';

    function savePop() {
        router.post('/pop/store', pop)
    }

    const pages = [
        'Intro',
        'Opdracht',
        'Kernkwadranten',
        'Doelen',
        'Afronden'
    ]

    let pop = {'goals': []};
    function updatePop(key, value) {
        pop[key] = value;
        console.log(pop)
    }
    
    let goal = {};
    function updateGoal(key, value) {
        goal[key] = value;
        console.log(goal);
    }

    let currentPage = 0;
    function nextPage() {
        currentPage++;
    }
    function previousPage() {
        currentPage--;
    }
    function setCurrentPage(page) {
        currentPage = page;
    }
</script>


<div class="container">
    <CreatePopHeader currentPage={currentPage} pages={pages} setCurrentPage={setCurrentPage} />
    {#if currentPage == 0}
        <CreatePopIntro />
    {:else if currentPage == 1}
        <CreatePopProject pop={pop} updatePop={updatePop} />
    {:else if currentPage == 2}
        <CreateProjectCoreQuadrants pop={pop} updatePop={updatePop} />
    {:else if currentPage == 3}
        <CreatePopGoals pop={pop} goals={goal} updateGoal={updateGoal} setCurrentPage={setCurrentPage} />
    {:else if currentPage == 10}
        <CreateGoal updateGoal={updateGoal} goal={goal} pop={pop} setCurrentPage={setCurrentPage} updatePop={updatePop} />
    {/if}
    {#if currentPage != 10}
        <div class="buttons">
            <Button onClick={previousPage} text={'vorige'} />
            {#if currentPage == 4}
                <Button onClick={savePop} text={'Opslaan'} />
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

    .buttons{
        display: flex;
        justify-content: end;
        width: 100%;
        gap: 1em;
        margin-top: 4em;
    }
</style>