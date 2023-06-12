<script lang="ts">
    export let text: string;
    export let open: boolean;
</script>

<div>
    <button class="navRow">
        <div class="iconHolder">
            <slot />
        </div>
        {#if open}
            <p>{text}</p>
        {/if}
    </button>
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
    }

    .iconHolder {
        width: 2em;
        height: 2em;
    }
</style>
