<script lang="ts">
	import IconHolder from './../IconHolder.svelte';
    import MdChevronRight from 'svelte-icons/md/MdChevronRight.svelte'

    export let pages: String[];
    export let currentPage: number;
    export let setCurrentPage: (page: number) => void;
</script>

<div class="container">
    <h1>Persoonlijk Ontwikkelings Plan</h1>
    <div class='breadCrumbs'>
        {#each pages as page}
            <p 
                class:selectedPage={page == pages[currentPage]}
                on:click={() => setCurrentPage(pages.indexOf(page))}
            >
                {page}
            </p>
            {#if page != pages[pages.length - 1]}
                <IconHolder >
                    <MdChevronRight />
                </IconHolder>
            {/if}
        {/each}
    </div>
</div>

<style>
    .container{
        margin-bottom: 2em;
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

    .selectedPage{
        color: black;
    }
</style>