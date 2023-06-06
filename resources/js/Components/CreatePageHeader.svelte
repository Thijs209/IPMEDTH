<script lang="ts">
    import IconHolder from "./IconHolder.svelte";
    import MdChevronRight from "svelte-icons/md/MdChevronRight.svelte";

    export let setCurrentPage: (page: number) => void;
    export let pages: String[];
    export let currentPage: number;
    export let pageHeading: String = "Persoonlijk Ontwikkelingsplan";
    console.log(pages);
</script>

<div class="container">
    <h1>{pageHeading}</h1>
    <div class="breadCrumbs">
        {#each pages as page}
            <!-- svelte-ignore a11y-click-events-have-key-events -->
            <p
                class:selectedPage={page == pages[currentPage]}
                on:click={() => setCurrentPage(pages.indexOf(page))}
            >
                {page}
            </p>
            {#if page != pages[pages.length - 1]}
                <IconHolder>
                    <MdChevronRight />
                </IconHolder>
            {/if}
        {/each}
    </div>
</div>

<style>
    .container {
        margin-bottom: 2em;
    }

    .breadCrumbs {
        display: flex;
        flex-flow: row wrap;
        gap: 0.5em;
        align-items: center;
    }

    h1 {
        display: flex;
        height: auto;
        width: 100%;
        margin-bottom: 1rem;
    }

    p {
        font-weight: 600;
        color: #808080;
    }

    p:hover {
        cursor: pointer;
        color: #6b6b6b;
    }

    .selectedPage {
        color: black;
    }
</style>
