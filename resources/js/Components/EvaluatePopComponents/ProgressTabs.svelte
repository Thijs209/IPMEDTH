<script lang="ts">
    import { evaluationTabs, activeEvaluationTab } from "./../../stores.js";

    import ProgressTab from "./ProgressTab.svelte";
    import IconHolder from "../IconHolder.svelte";
    import MdChevronRight from "svelte-icons/md/MdChevronRight.svelte";
</script>

<div class="container">
    {#each $evaluationTabs.tabs as tab}
        <ProgressTab
            name={tab}
            active={$activeEvaluationTab.tab === tab}
        />
        {#if tab != $evaluationTabs.tabs[$evaluationTabs.tabs.length - 1]}
            <IconHolder>
                <MdChevronRight />
            </IconHolder>
        {/if}
    {/each}
</div>

<style>
    .container {
        align-self: center;
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 100%;
        gap: 1rem;
        padding: 0 2em;
    }
</style>
