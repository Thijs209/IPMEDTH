<script>
    import CoreQuadrantField from "./../Components/CreatePopComponents/CoreQuadrantField.svelte";
    import Button from "../Components/Button.svelte";


</script>

<p>Geef aan wat je in de komende periode gaat doen.</p>
<Button marginTop={true} style="background-color:black" text="Kernkwadrant 1" />
<div class="quadrantContainer">
    <CoreQuadrantField coreQuadrants={pop?.coreQuadrants} updateCoreQuadrants={updateCoreQuadrants} key='coreQuality' title='Kernkwaliteit' />
    <div class='arrowContainer'>
        <h3>Te veel van het goede</h3>
        <div class="arrow" />
    </div>
    <CoreQuadrantField coreQuadrants={pop?.coreQuadrants} updateCoreQuadrants={updateCoreQuadrants} key='pitfall' title='Valkuil' />
    <div class='arrowContainer vertical'>
        <h3>Negatief tegenovergestelde</h3>
        <div class="arrow bottom" />
    </div>
    <div />
    <div class="arrowContainer vertical">
        <h3>Positief tegenovergestelde</h3>
        <div class="arrow bottom" />
    </div>
    <CoreQuadrantField coreQuadrants={pop?.coreQuadrants} updateCoreQuadrants={updateCoreQuadrants} key='allergy' title='Allergie' />
    <div class='arrowContainer'>
        <h3>Te veel van het goede</h3>
        <div class="arrow reversed" />
    </div>
    <CoreQuadrantField coreQuadrants={pop?.coreQuadrants} updateCoreQuadrants={updateCoreQuadrants} key='challenge' title='Uitdaging' />
</div>

<style>
    .quadrantContainer {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }

    .arrowContainer {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        gap: 1em;
    }

    .vertical {
        transform: rotate(90deg);
        width: 15em;
        margin: auto;
    }

    .vertical h3 {
        font-size: 1.2em;
    }

    .arrow {
        position: relative;
        height: 0;
        width: 80%;
        border-bottom: 5px solid rgb(0, 0, 0);
    }

    .reversed {
        transform: rotate(180deg);
    }

    .bottom {
        width: 100%;
    }

    .arrow::after {
        content: "";
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid rgb(0, 0, 0);
        position: absolute;
        right: -10px;
        top: -7.5px;
    }
</style>
