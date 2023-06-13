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

    const pages = [
        'Intro',
        'Opdracht',
        'Kernkwadranten',
        'Doelen',
        'Afronden'
    ]

    let pop = {};
    function updatePop(key, value) {
        pop[key] = value;
        console.log(pop)
    }
    
    let goals = [];
    function updateGoals(key, value) {
        goals = value;
        updatePop('goals', goals);
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
        <CreatePopGoals pop={pop} setCurrentPage={setCurrentPage} updatePop={updatePop} />
    {:else if currentPage == 4}
        <h1>4</h1>
    {:else if currentPage == 5}
        <h1>5</h1>
    {:else if currentPage == 10}
        <CreateGoal pop={pop} setCurrentPage={setCurrentPage} updatePop={updatePop} />
    {/if}
    {#if currentPage != 10}
        <div class="buttons">
            <Button onClick={previousPage} text={'vorige'} />
            <Button onClick={nextPage} text={'Volgende'} />
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