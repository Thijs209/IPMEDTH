<script lang="ts">
    import { currentPopTaskQuestions, currentPopTask } from "./../../stores.js";
    import PopProjectField from "../../Components/EvaluatePopComponents/PopProjectField.svelte";

    interface Task {
        taskId: number;
        success: string;
        goal: string;
        results: string;
        manager: string;
        reportOthers: string;
    }

    let questions = { ...$currentPopTaskQuestions };
    let answers = { ...$currentPopTask };

    export let task: any;

    console.log(task.result);
</script>

<section>
    <PopProjectField question={questions.goal} answer={task.goal} />
    <PopProjectField question={questions.result} answer={task.results} />
    <PopProjectField question={questions.success} answer={task.success} />
    <PopProjectField question={questions.manager} answer={task.manager} />
    <PopProjectField
        question={questions.reportsOthers}
        answer={answers.reportsOthers}
    />
</section>

<style>
    section {
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        width: 100%;
        height: 100%;
        gap: 1rem;
    }
    .pop-project {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
</style>
