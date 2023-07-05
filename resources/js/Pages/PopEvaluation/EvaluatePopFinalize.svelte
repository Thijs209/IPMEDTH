<script lang="ts">
    import { currentPopCoreQuadrants } from "./../../stores.js";
</script>

<h2 class="heading">Pop Afsluiten</h2>
<article class="evaluate-pop__finalize">
    <header class="finalize__header">
        <h3>Checklist:</h3>
    </header>
    <section class="finalize__body">
        <p>Ga het volgende eerst na:</p>
        <ul>
            <li>
                Heb je het evaluatiegesprek al gehad? De medewerker kan het
                beste één (1) POP cyclus te gelijk doen.
            </li>
        </ul>
    </section>
</article>

<style> 
    .heading {
        display: flex;
        width: 100%;
        height: 4rem;
    }
    article {
        height: 100%;
        width: 100%;
        /* margin-left: 2rem; */

        background-color: white;
        min-height: 60vh;
        font-size: 1.5rem;
        border-radius: 1rem;
    }

    .finalize__header {
        display: flex;
        border-radius: 1rem;
        padding: 2rem;
        background-color: var(--c-nav-bg);
        color: white;
        display: block;
    }

    .finalize__body {
        padding: 2rem;
    }

    div {
        margin-left: 2rem;
    }
    ul {
        margin-left: 4rem;
    }
</style>
