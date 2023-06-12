<script lang="ts">
    import CoreQuadrant from "./../../Components/EvaluatePopComponents/CoreQuadrant.svelte";
    let kernkwadranten = {
        quality: "Kwaliteit",
        pitfall: "Valkuil",
        allergy: "Allergie",
        challenge: "Uitdaging",
    };

    export let coreQuadrants = {
        quality: "Sterk verantwoordelijkheids gevoel.",
        pitfall: "Overbelasting",
        allergy: "Snelle opgevers.",
        challenge: "Rustmomenten vinden.",
    };
</script>

<div class="grid">
    <div data-type="Kwaliteit">
        <CoreQuadrant type={"Kwaliteit"} text={coreQuadrants.quality} />
    </div>
    <div>
        <div class="arrow arrow--positiefTegenovergestelde" data-direction="right"></div>
    </div>
    <div data-type="Valkuil">
        <CoreQuadrant type={"Valkuil"} text={coreQuadrants.pitfall} />
    </div>
    <div data-type="Allergie">
        <CoreQuadrant type={"Allergie"} text={coreQuadrants.allergy} />
    </div>
    <div data-type="Uitdaging">
        <CoreQuadrant type={"Uitdaging"} text={coreQuadrants.challenge} />
    </div>
</div>

<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        grid-template-rows: repeat(6, minmax(0, 1fr));
        gap: 1rem;
        padding: 4rem;
        min-height: 40rem;
        max-height: 100%;
        height: 100%;
        width: 100%;
    }

    .grid > div {
        width: 100%;
        max-width: 20rem;
        height: 100%;
    }

    div[data-type="Kwaliteit"] {
        grid-column: 1 / span 2;
        grid-row: 1 / span 1;
    }

    div[data-type="Valkuil"] {
        grid-column: 4 / span 2;
        grid-row: 1 / span 1;
    }

    div[data-type="Allergie"] {
        grid-column: 1 / span 2;
        grid-row: 4 / span 1;
    }

    div[data-type="Uitdaging"] {
        grid-column: 4 / span 2;
        grid-row: 4 / span 1;
    }
</style>
