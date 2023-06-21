<script lang="ts">
    import PopCard from "./PopCard.svelte";

    interface Pop {
        userId: number;
        popId: number;
        userFinished: boolean;
        userFinishedAt: any;
        evaluatedBy: number;
        evaluationFinished: boolean;
        evaluationFinishedAt: any;
        tasks: any[];
        core_quadrants: any[];
        goals: any[];
        evaluation_notes: any[];
        user: any;
    }

    export let pops: Pop[];
</script>

<section class="pop-cards">
    {#each pops as pop}
        <PopCard {pop} />
    {/each}
</section>

<style>
    .pop-cards {
        font-size: 1.6rem;
        display: flex;
        flex-flow: row wrap;
        gap: 2rem;
        width: 100%;
        height: auto;
        max-height: 50%;
        margin-top: 5rem;
        padding: 1rem;
    }
</style>
