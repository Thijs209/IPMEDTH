<script lang="ts">
    import { evaluationTabs, activeEvaluationTab } from "./../../stores.js";

    import ProgressTab from "./ProgressTab.svelte";
    import IconHolder from "../IconHolder.svelte";
    import MdChevronRight from "svelte-icons/md/MdChevronRight.svelte";
</script>

<div class="container">
    {#each $evaluationTabs.tabs as tab}
        <ProgressTab name={tab} active={$activeEvaluationTab.tab === tab} />
        {#if tab != $evaluationTabs.tabs[$evaluationTabs.tabs.length - 1]}
            <div class="chevron">
                <IconHolder>
                    <MdChevronRight />
                </IconHolder>
            </div>
        {/if}
    {/each}
</div>

<style>
    .container {
        display: flex;
        flex-flow: row wrap;
        justify-content: start;
        align-items: center;
        width: 100%;
        height: 100%;
        max-height: 100%;

        gap: 1.5rem;
    }

    .chevron {
        margin: 0;
        padding: 0;
    }
</style>
