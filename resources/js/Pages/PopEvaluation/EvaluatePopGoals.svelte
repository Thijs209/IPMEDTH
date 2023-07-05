<script lang="ts">
    import { currentPopGoals } from "../../stores.js";
    import EvaluateGoal from "./EvaluateGoal.svelte";

    export let pop;

    interface Goal {
        goalId: number;
        goalType: string;
        what: string;
        why: string;
        satisfied: string;
        support: string;
        deadline: string;
        feedback: string;
        goalSteps: {
            stepId: number;
            step: string;
            description: string;
        };
    }

    let currentGoalsStore = currentPopGoals;
    let goals: Array<Goal>;
    goals = pop.goals;
    if (pop.goals.length > 0) {
        currentGoalsStore = [...pop.goals];
    }
    // goals.forEach((item) => {
    //     currentGoalsStore = [...goals];
    // });

    if (window.location.href.indexOf("create-pop") > -1) {
        goals = pop?.goals;
    }
</script>

<section class="goals">
    <h3>Doelen</h3>
    {#each goals as goal}
        {#if goal.what !== null}
            <EvaluateGoal {goal} createdGoal={false} open={false} />
        {/if}
    {/each}
</section>

<style>
    .goals {
        display: grid;
        grid-template-columns: repeat(2 minmax(30rem, 1fr));
        grid-template-rows: auto;
        gap: 2rem;
        font-size: 1.5rem;
        gap: 1rem;
        height: 100%;
        width: 100%;
    }

    .goal .opened {
        display: flex;
        flex-flow: column wrap;
        gap: 2rem;
    }
</style>
