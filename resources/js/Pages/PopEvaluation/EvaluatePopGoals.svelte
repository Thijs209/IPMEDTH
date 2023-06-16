<script lang="ts">
    import { currentPopGoals } from "../../stores.js";

    type Goal = {
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
        }[];
    }[];
    let goals: Goal[];
    currentPopGoals.forEach((goal) => {
        goal.subscribe((value) => {
            goals.push(value);
        });
        goals = goals;
    });
</script>

<article>
    {#each goals as goal}
        <p>{goal.what}</p>
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
