<script>
    import ShowGoal from "../Components/CreatePopComponents/ShowGoal.svelte";
    import EvaluateGoal from "./PopEvaluation/EvaluateGoal.svelte";
    import EvaluatePopCoreQuadrants from "./PopEvaluation/EvaluatePopCoreQuadrants.svelte";
    import EvaluatePopFinalize from "./PopEvaluation/EvaluatePopFinalize.svelte";
    import EvaluatePopGoals from "./PopEvaluation/EvaluatePopGoals.svelte";
    import EvaluatePopProject from "./PopEvaluation/EvaluatePopProject.svelte";

    export let pop;
    console.log(pop);
</script>

<div>
    <EvaluatePopProject pop={pop} />
    <EvaluatePopCoreQuadrants pop={pop} />
    {#each pop?.goals as goal}
        <EvaluateGoal createdGoal={goal} />
    {/each}
</div>