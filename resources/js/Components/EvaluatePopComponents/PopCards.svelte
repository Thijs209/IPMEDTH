<script lang="ts">
    import PopCard from "./PopCard.svelte";
    export let pops: Array<{
        name: string;
        startDate: string;
        endDate: string;
        status: number;
    }>;
</script>

<section class="pop-cards">
    {#each pops as pop}
        <PopCard {pop} />
    {/each}
</section>

<style>
    .pop-cards {
        display: flex;
        flex-flow: row wrap;
        gap: 2rem;
        width: 100%;
        height: auto;
        max-height: 50%;
        background-color: pink;
        margin-top: 5rem;
        padding: 1rem;
    }
</style>
