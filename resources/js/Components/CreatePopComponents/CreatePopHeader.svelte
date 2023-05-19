<script>
	import IconHolder from './../IconHolder.svelte';
    import MdChevronRight from 'svelte-icons/md/MdChevronRight.svelte'

    const breadCrumbs = [
        'Intro',
        'Opdracht',
        'Kernkwadranten',
        'Doelen',
        'Leerdoelen',
        'Afronden'
    ]

    let selectedCrumb = 'Intro';
</script>

<style>
    .container {
        padding: .5em 1em;
    }

    .breadCrumbs{
        display: flex;
        flex-direction: row;
        gap: .5em;
        align-items: center;
    }

    p {
        font-weight: 600;
        color: gray;
    }

    p:hover{
        cursor: pointer;
    }

    .selectedCrumb{
        color: black;
    }
</style>

<div class="container">
    <h1>Persoonlijk Ontwikkelings Plan</h1>
    <div class='breadCrumbs'>
        {#each breadCrumbs as crumb}
            <p 
                class:selectedCrumb={crumb == selectedCrumb}
                on:click={() => selectedCrumb = crumb}
            >
                {crumb}
            </p>
            <IconHolder >
                <MdChevronRight />
            </IconHolder>
        {/each}
    </div>
</div>