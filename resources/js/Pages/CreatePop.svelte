<script lang="ts">
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

    let currentPage = 0;
    function nextPage() {
        currentPage++;
    }
    function previousPage() {
        currentPage--;
    }
    function setCurrentPage(page: number) {
        currentPage = page;
    }
</script>


<div class="container">
    <CreatePopHeader currentPage={currentPage} pages={pages} setCurrentPage={setCurrentPage} />
    {#if currentPage == 0}
        <CreatePopIntro />
    {:else if currentPage == 1}
        <CreatePopProject />
    {:else if currentPage == 2}
        <CreateProjectCoreQuadrants />
    {:else if currentPage == 3}
        <CreatePopGoals setCurrentPage={setCurrentPage} />
    {:else if currentPage == 4}
        <h1>4</h1>
    {:else if currentPage == 5}
        <h1>5</h1>
    {:else if currentPage == 10}
        <CreateGoal setCurrentPage={setCurrentPage} />
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