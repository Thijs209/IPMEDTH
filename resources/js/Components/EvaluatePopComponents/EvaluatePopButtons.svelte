<script lang="ts">
    // TODO functie schrijven om de data op te slaan in de database bij het klikken op de opslaan knop
    export let finalize;
</script>

<div class="evaluate-pop__buttons">
    <button on:click={router.get("/evaluation-overview" )} class="button">
        <p>Opslaan</p>
    </button>
    <button on:click={router.get("/evaluation-overview" )} class="button">
        <p>Opslaan</p>
    </button>
</div>

<style>
    .evaluate-pop__buttons {
        display: flex;
        flex-flow: row nowrap;
        gap: 2rem;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 100%;
    }
    button {
        background-color: var(--c-primary-button);
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 1.7rem;
        min-height: 6rem;
        min-width: 15rem;
        height: 100%;
        width: 45%;
        max-height: 10rem;
        max-width: 20rem;
        border: none;
        color: #eee;
        border-radius: 1rem;
    }

    .button--close {
        background-color: var(--c-secondary-button);
    }

    .button--close:hover {
        background-color: var(--c-secondary-button-hover);
    }

    button:hover {
        background-color: var(--c-primary-button-hover);
        cursor: pointer;
    }
</style>
