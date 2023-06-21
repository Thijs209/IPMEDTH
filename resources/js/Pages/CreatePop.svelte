<script>
	import CreateGoal from './CreateGoal.svelte';
	import VerifyPop from './VerifyPop.svelte';
	import CreatePopIntro from './CreatePopIntro.svelte';
	import CreatePageHeader from './../Components/CreatePageHeader.svelte';
	import CreatePopGoals from './CreatePopGoals.svelte';
	import CreatePopProject from './CreatePopProject.svelte';
    import CreateProjectCoreQuadrants from './CreateProjectCoreQuadrants.svelte';
    import { writable } from 'svelte/store';
    import Button from '../Components/Button.svelte';


    const pages = [
        'Intro',
        'Opdracht',
        'Kernkwadranten',
        'Doelen',
        'Afronden'
    ];

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
    };
    function previousPage() {
        currentPage--;
    }
    function setCurrentPage(page) {
        currentPage = page;
    };
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
        <CreatePopGoals pop={pop} goals={goal} updateGoal={updateGoal} setCurrentPage={setCurrentPage} />
    {:else if currentPage == 4}
        <VerifyPop pop={pop} setCurrentPage={setCurrentPage} />
    {:else if currentPage == 10}
        <CreateGoal updateGoal={updateGoal} goal={goal} pop={pop} setCurrentPage={setCurrentPage} updatePop={updatePop} />
    {/if}
    <div class="buttons">
        <Button onClick={previousPage} text={'vorige'} />
        <Button onClick={nextPage} text={'Volgende'} />
    </div>
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
