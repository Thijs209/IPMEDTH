<script lang="ts">
    import { activeEvaluationTab } from "./../../stores.js";
    export let name: string = "";
    export let active: boolean;
    let handleClick: (event: MouseEvent) => void;
    handleClick = (event: MouseEvent) => {
        $activeEvaluationTab.tab = name;
    };
</script>

<button class:active on:click={handleClick}><p>{name}</p></button>

<style>
    button {
        background-color: black;
        border-radius: 4rem;
        height: 100%;
        font-size: 1.5rem;

        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 15rem;
        padding: 1rem;

        border: none;
    }

    button:hover {
        background-color: #333;
        cursor: pointer;
    }

    p {
        color: white;
        font-weight: bold;
    }

    p::first-letter {
        text-transform: uppercase;
    }

    .active {
        background-color: var(--c-attention);
    }

    .active:hover {
        background-color: var(--c-attention-hover);
    }

    .active > p {
        color: black;
    }
</style>
