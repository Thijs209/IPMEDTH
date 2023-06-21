<script lang="ts">
    import { Link } from "@inertiajs/svelte";
    import { fade, fly } from "svelte/transition";
    export let text: string;
    export let open: boolean;
    export let href: string = "#";
    export let lightBackground: boolean = false;
</script>

<div>
    <Link {href}>
        <button class:lightBackground={lightBackground} class="navRow">
            <div class="iconHolder">
                <slot />
            </div>
            {#if lightBackground}
                {text}
            {/if}
            {#if open}
                <p transition:fade={{ duration: 300 }}>{text}</p>
            {/if}
        </button>
    </Link>
</div>

<style>
    button {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        border-radius: 1em;
        width: 100%;
        height: 4rem;
        background-color: transparent;
        border: none;
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
        text-decoration: none;
    }

    .lightBackground {
        background-color: #00a667;
    }

    .navRow {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: left;
        gap: 0.5em;
    }

    button:hover {
        cursor: pointer;
        transform: scale(1.05);
    }

    .iconHolder {
        width: 2em;
        height: 2em;
    }
</style>
