<script lang="ts">
    export let type: string;
    export let text: string;

    console.log(text);
</script>

<div class="coreQuadrant">
    <div class="coreQuadrantText">
        <div data-type={type} class="type">{type}</div>
        <p class="text">{text}</p>
    </div>
</div>

<style>
    .coreQuadrant {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
        height: 100%;
        padding: 2rem;
        background-color: #fff;
        border-radius: 2rem;
        font-size: 1.3rem;
    }

    p {
        display: flex;
        width: 100%;
        max-width: 100%;
        height: 100;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 1.7rem;
    }
    .type {
        display: flex;
        justify-content: end;
        align-items: center;
        border-top-right-radius: 1rem;
        padding: 1rem;
        color: #eee;
        height: 3rem;
        width: 50%;
        position: absolute;
        top: 0;
        right: 0;
    }

    .type[data-type="Kwaliteit"] {
        background-color: #6fcf97;
    }
    .type[data-type="Kwaliteit"] + p {
        color: #00a667;
    }
    .type[data-type="Valkuil"] {
        background-color: #eb5757;
    }
    .type[data-type="Valkuil"] + p {
        color: #eb5757;
    }
    .type[data-type="Allergie"] {
        background-color: #f2c94c;
    }
    .type[data-type="Allergie"] + p {
        color: #ffc000;
    }
    .type[data-type="Uitdaging"] {
        background-color: #56ccf2;
    }
    .type[data-type="Uitdaging"] + p {
        color: #2d9cdb;
    }
</style>
