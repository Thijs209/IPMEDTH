<script lang="ts">
    import { activeEvaluationTab, evaluationTabs } from "../../stores.js";
    //Layouts
    import Layout from "./../../Layouts/Layout.svelte";
    import EvaluatePopLayout from "./../../Layouts/EvaluatePopLayout.svelte";
    // Page contents
    import UserProfile from "../../Components/EvaluatePopComponents/UserProfile.svelte";
    import CreatePageHeader from "./../../Components/CreatePageHeader.svelte";
    import ProgressTabs from "./../../Components/EvaluatePopComponents/ProgressTabs.svelte";
    // Evaluation tabs
    import EvaluatePopProject from "./EvaluatePopProject.svelte";
    import EvaluatePopCoreQuadrants from "./EvaluatePopCoreQuadrants.svelte";
    import EvaluatePopButtons from "../../Components/EvaluatePopComponents/EvaluatePopButtons.svelte";
    import EvaluatePopGoals from "./EvaluatePopGoals.svelte";
    import EvaluatePopFinalize from "./EvaluatePopFinalize.svelte";
    import PopNotes from "../../Components/EvaluatePopComponents/PopNotes.svelte";
    let pages: string[] = ["Home", "POP Overzicht", "POP Review"];
</script>

<Layout>
    <article slot="main" class="main">
        <CreatePageHeader {pages} currentPage={2} setCurrentPage={() => {}} />
        <EvaluatePopLayout>
            <section slot="evaluate-pop-profile" class="evaluate-pop__profile">
                <UserProfile />
            </section>
            <div slot="evaluate-pop-tabs" class="evaluate-pop__tabs">
                <ProgressTabs />
            </div>
            <section slot="evaluate-pop-content" class="evaluate-pop__content">
                {#if $activeEvaluationTab.tab === $evaluationTabs.tabs[0]}
                    <EvaluatePopProject />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[1]}
                    <EvaluatePopCoreQuadrants />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[2]}
                    <EvaluatePopGoals />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[3]}
                    <EvaluatePopFinalize />
                {/if}
            </section>
            <section slot="evaluate-pop-notes" class="evaluate-pop__notes">
                <PopNotes />
            </section>
            <div slot="evaluate-pop-buttons" class="evaluate-pop__buttons">
                {#if $activeEvaluationTab != null && $activeEvaluationTab.tab !== $evaluationTabs.tabs[3]}
                    <EvaluatePopButtons finalize={false} />
                {:else}
                    <EvaluatePopButtons finalize={true} />
                {/if}
            </div>
        </EvaluatePopLayout>
    </article>
</Layout>

<style>
    .main {
        margin: 5em;
        margin-left: 5rem;
    }

    .evaluate-pop__profile {
        height: 100%;
        width: 100%;
    }

    .evaluate-pop__tabs {
        height: 100%;
        width: 100%;
    }

    .evaluate-pop__notes {
        height: 100%;
        width: 100%;
        max-width: 30rem;
        min-width: 100%;

        display: flex;
        flex-direction: column;
    }
</style>
