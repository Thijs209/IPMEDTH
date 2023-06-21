<script lang="ts">
    export let question: string;
    export let answer: string;

    
</script>

<section>
    <!-- TODO Moet dit een h3 of gewoon een bold p zijn vanuit semantische HTML/accessibility? -->
    <div>
        <h3>{question ? question : "ok"}</h3>
        <p>{answer ? answer : ""}</p>
    </div>
</section>

<style>
    section {
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        width: 95%;
        height: 100%;
        color: #000;
    }

    div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        width: 100%;
        height: 100%;
        min-height: 12rem;
        gap: 0.5rem;
    }

    h3 {
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 1.5rem;
    }

    p {
        display: flex;
        padding: 1rem;
        background-color: #ddd;
        font-family: "Montserrat", sans-serif;
        font-size: 1.5rem;
        font-weight: 500;
        width: 100%;
        min-height: 8rem;
        border-radius: 1rem;
    }
</style>
