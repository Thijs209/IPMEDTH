<script lang="ts">
    import { currentPopGoals } from "../../stores.js";

    let goal;
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
    console.log(goals);
</script>

<article>
    {#each goals as goal}
        <p>{goal.goalId}</p>
    {/each}
</article>

<style>
    .goals {
        display: flex;
        flex-flow: row wrap;
        gap: 2rem;
        font-size: 1.5rem;
    }

    .goal .opened {
        display: flex;
        flex-flow: column wrap;
        gap: 2rem;
    }
</style>
