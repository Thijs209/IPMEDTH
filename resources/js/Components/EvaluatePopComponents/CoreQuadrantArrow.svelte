<script lang="ts">
    export let location: string;
    let text: string;

    if (location === "left" || location == "right") {
        text = "Positief tegen overgestelde";
    } else {
        text = "Te veel van het goede"; // Allergie -> Uitdaging, Kwaliteit -> valkuil
    }
</script>

<div class="svg-container {'svg-container--' + location}">
    <p>{text}</p>
    <svg
        class={"location--" + location}
        width="200%"
        height="200%"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            d="M23.0677 11.9929L18.818 7.75739L17.4061 9.17398L19.2415 11.0032L0.932469 11.0012L0.932251 13.0012L19.2369 13.0032L17.4155 14.8308L18.8321 16.2426L23.0677 11.9929Z"
            fill={location === "left" || location === "right"
                ? "var(--positiveArrow)"
                : "var(--negativeArrow)"}
        />
    </svg>
</div>

<style>
    :root {
        --positiveArrow: #6fcf97;
        --negativeArrow: #eb5757;
    }

    p {
        display: flex;
        align-items: start;
        justify-content: center;
        height: 25%;
        width: 100%;
        font-size: 1.5rem;
    }
    .svg-container {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    svg {
        width: 100%;
        height: 50%;
    }

    .svg-container--left,
    .svg-container--right {
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 1rem;
    }

    .svg-container--left > p,
    .svg-container--right > p {
        width: 50%;
        height: 100%;
        align-items: center;
        word-wrap: break-word;
        text-align: right;
    }

    .svg-container--left > svg,
    .svg-container--right > svg {
        width: 50%;
        height: 100%;
    }

    .location--left,
    .location--right {
        transform: rotate(-90deg);
    }
</style>
