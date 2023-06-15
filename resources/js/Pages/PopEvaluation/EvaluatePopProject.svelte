<script lang="ts">
    import { currentPopTaskQuestions, currentPopTask } from "./../../stores.js";
    import PopProjectField from "../../Components/EvaluatePopComponents/PopProjectField.svelte";

    let questions = { ...$currentPopTaskQuestions };
    let answers = { ...$currentPopTask };
    
</script>

<section>
    <PopProjectField question={questions.goal} answer={answers.goal} />
    <PopProjectField question={questions.result} answer={answers.result} />
    <PopProjectField question={questions.succes} answer={answers.succes} />
    <PopProjectField question={questions.manager} answer={answers.manager} />
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
