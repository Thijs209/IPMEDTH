<script lang="ts">
    import CoreQuadrantArrow from "./../../Components/EvaluatePopComponents/CoreQuadrantArrow.svelte";
    import CoreQuadrant from "./../../Components/EvaluatePopComponents/CoreQuadrant.svelte";
    let kernkwadranten = {
        quality: "Kwaliteit",
        pitfall: "Valkuil",
        allergy: "Allergie",
        challenge: "Uitdaging",
    };

    export let coreQuadrants = {
        quality: "Doorzettings vermogen",
        pitfall: "Overbelasting",
        allergy: "Onzekerheid",
        challenge: "Rustmomenten gunnen",
    };
</script>

<section class="grid">
    <div data-type="Kwaliteit">
        <CoreQuadrant type={"Kwaliteit"} text={coreQuadrants.quality} />
    </div>
    <div class="coreQuadrantArrow--top">
        <CoreQuadrantArrow location={"top"} />
    </div>
    <div data-type="Valkuil">
        <CoreQuadrant type={"Valkuil"} text={coreQuadrants.pitfall} />
    </div>
    <div class="coreQuadrantArrow--right">
        <CoreQuadrantArrow location={"right"} />
    </div>
    <div data-type="Allergie">
        <CoreQuadrant type={"Allergie"} text={coreQuadrants.allergy} />
    </div>
    <div class="coreQuadrantArrow--bottom">
        <CoreQuadrantArrow location={"bottom"} />
    </div>
    <div data-type="Uitdaging">
        <CoreQuadrant type={"Uitdaging"} text={coreQuadrants.challenge} />
    </div>
    <div class="coreQuadrantArrow--left">
        <CoreQuadrantArrow location={"left"} />
    </div>
</section>

<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        grid-template-rows: repeat(3, minmax(0, 1fr));
        width: 100%;
        height: 100%;
        min-height: 100%;
        max-width: 100%;
        max-height: 100%;
        padding: 3rem 2rem;
    }

    .grid > div {
        width: 100%;
        max-height: 20rem;
        max-width: 13rem;
        height: 100%;
    }

    div[data-type="Kwaliteit"] {
        grid-column: 1 / span 2;
        grid-row: 1 / span 1;
    }

    .coreQuadrantArrow--top {
        align-items: center;
        text-align: start;
        grid-column: 3 / span 2;
        grid-row: 1 / span 1;
    }

    div[data-type="Valkuil"] {
        grid-column: 5 / span 2;
        grid-row: 1 / span 1;
    }
    .coreQuadrantArrow--right {
        grid-column: 5 / span 2;
        grid-row: 2 / span 1;
    }
    div[data-type="Uitdaging"] {
        grid-column: 5 / span 2;
        grid-row: 3 / span 1;
    }

    .coreQuadrantArrow--bottom {
        align-items: center;
        text-align: center;
        grid-column: 3 / span 2;
        grid-row: 3 / span 1;
    }

    div[data-type="Allergie"] {
        grid-column: 1 / span 2;
        grid-row: 3 / span 1;
    }

    .coreQuadrantArrow--left {
        grid-column: 1 / span 2;
        grid-row: 2 / span 1;
    }

    @media screen and (max-width: 40rem) {
        /* TODO alle items los in een kolom plaatsen voor reponsive design. */
    }
</style>
