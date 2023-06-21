<script lang="ts">
    import { currentPopGoals } from "../../stores.js";
    import EvaluateGoal from "./EvaluateGoal.svelte";

    let goals: Array<{
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
    }>;
    goals = [];
    currentPopGoals.forEach((item) => {
        item.subscribe((value) => {
            goals.push(value);
        });
    });
</script>

<section class="goals">
    <h3>Doelen</h3>
    {#each goals as goal}
        <EvaluateGoal {goal} open={false} />
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
