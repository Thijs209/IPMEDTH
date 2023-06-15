<script lang="ts">
    import { currentPopCoreQuadrants } from "./../../stores.js";
</script>

<article class="evaluate-pop__finalize">
    <header>
        <h1>Wil je deze POP cyclus afronden?</h1>
    </header>
    <div>
        <p>Ga het volgende eerst na:</p>
        <ul>
            <li>
                <p>
                    Heb je het evaluatiegesprek al gehad? De medewerker kan het
                    beste één (1) POP cyclus te gelijk doen.
                </p>
            </li>
        </ul>
    </div>
</article>

<style>
    article {
        height: 100%;
        width: 100%;
        margin-left: 2rem;
        background-color: white;
        min-height: 60vh;
        font-size: 1.5rem;
    }

    header {
        display: flex;
        border-radius: 1rem;
        padding: 2rem;
        background-color: var(--c-nav-bg);
        color: white;
        display: block;
    }

    div {
        margin-left: 2rem;
    }
    ul {
        margin-left: 4rem;
    }
</style>
