<script lang="ts">
    import IconHolder from "./IconHolder.svelte";
    import MdChevronRight from "svelte-icons/md/MdChevronRight.svelte";

    export let setCurrentPage: (page: number) => void;
    export let pages: string[];
    export let currentPage: number;
    export let pageHeading: string = "Persoonlijk Ontwikkelingsplan";
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
        display: flex;
        flex-flow: column nowrap;
        gap: 1em;
        margin-bottom: 2em;
        width: 100%;
        height: 100%;
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
    }

    p {
        font-weight: 600;
        color: #808080;
        font-size: 1.6rem;
    }

    p:hover {
        cursor: pointer;
        color: black;
    }

    .selectedPage {
        color: black;
        position: relative;
    }

    .selectedPage::after {
        content: "";
        background-color: var(--c-attention);
        position: absolute;
        top: 2rem;
        right: 46%;
        height: 8px;
        width: 8px;
        z-index: 2;
        border-radius: 20rem;
        opacity: 0.4;
    }
</style>
