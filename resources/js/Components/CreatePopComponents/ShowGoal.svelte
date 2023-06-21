<script>
    import Button from "../Button.svelte";
    import StepCard from "./StepCard.svelte";
    import FaPencilAlt from 'svelte-icons/fa/FaPencilAlt.svelte'

    export let goal;
</script>

<div class="container">
    <h1>{goal.title}</h1>
    <div class="infoCard">
        <h3>Wat:</h3>
        <p>{goal.what}</p>
    </div>
    <div class="infoCard">
        <h3>Waarom:</h3>
        <p>{goal.why}</p>
    </div>
    <div class="steps">
        <h3>Hoe:</h3>
        <div class="stepContainer">
            {#each goal.steps as step}
            <StepCard step={step} />
            {/each}
        </div>
    </div>
    <div class="infoCard">
        <h3>Wanneer ben ik tevreden:</h3>
        <p>{goal.satisfied}</p>
    </div>
    <div class="infoCard">
        <h3>Welke ondersteuning heb ik nodig:</h3>
        <p>{goal.support}</p>
    </div>
    <div class="infoCard">
        <h3>Voor wanneer wil ik dit halen:</h3>
        <p>{goal.when}</p>
    </div>
    <div class="infoCard">
        <h3>Van wie wil ik feedback?</h3>
        <p>{goal.feedback}</p>
    </div>
    <div class="buttons">
        <Button text='bewerken' />
        <Button text='reflecteren' />
    </div>
</div>

<style>
    .buttons{
        margin: auto;
        grid-column: span 2;
        display: flex;
        gap: 2em;
    }
    
    h1{
        grid-column: span 2;
        margin: auto;
        text-decoration: underline;
    }

    .container{
        color: white;
        display: grid;
        justify-items: left;
        gap: 1em;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        width: 80%;
        background-color: #0d403d;
        padding: 3em;
        border-radius: 1em;
        margin-left: 2em;
    }

    .stepContainer{
        display: flex;
        flex-wrap: wrap;
        gap: 1em;
    }

    .steps{
        grid-column: span 2;
    }

    .infoCard{
        margin: .5em 0;
    }

    p{
        font-weight: 500;
        font-size: 1.5em;
    }
</style>