<script>
    import ShowGoal from "../Components/CreatePopComponents/ShowGoal.svelte";
    import EvaluateGoal from "./PopEvaluation/EvaluateGoal.svelte";
    import EvaluatePopCoreQuadrants from "./PopEvaluation/EvaluatePopCoreQuadrants.svelte";
    import EvaluatePopFinalize from "./PopEvaluation/EvaluatePopFinalize.svelte";
    import EvaluatePopGoals from "./PopEvaluation/EvaluatePopGoals.svelte";
    import EvaluatePopProject from "./PopEvaluation/EvaluatePopProject.svelte";
    import Layout from "../Layouts/Layout.svelte";

    export let pop;
    console.log(pop);
</script>

{#if pop.noSideBar == false}
    <Layout>
        <div class="container" slot="main">
            <EvaluatePopProject {pop} />
            <EvaluatePopCoreQuadrants {pop} />
            {#each pop?.goals as goal}
                <EvaluateGoal createdGoal={goal} />
            {/each}
        </div>
    </Layout>
{:else}
    <EvaluatePopProject {pop} />
    <EvaluatePopCoreQuadrants {pop} />
    {#each pop?.goals as goal}
        <EvaluateGoal createdGoal={goal} />
    {/each}
{/if}

<style>
    .container {
        padding: 2em 3em;
    }
</style>
